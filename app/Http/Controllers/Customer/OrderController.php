<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if (!$user->hasRole('customer')) {
            return redirect()->route('admin.orders.index');
        }

        return view('customer.orders');
    }
    public function cart()
    {

        return view('customer.cart');
    }

    public function getOrders(Request $request)
    {
        $user = $request->user();

        $ongoingOrders = $user->orders()->WhereHas('latestStatus', function (Builder $query) {
            $query->whereNot('status', 'cancelled');
        })->with('firstProduct', 'latestStatus')->paginate(10);

        $cancelledOrders = $user->orders()->WhereHas('latestStatus', function (Builder $query) {
            $query->where('status', 'cancelled');
        })->with('firstProduct', 'latestStatus')->paginate(10);

        return response()->json(['ongoingOrders' => $ongoingOrders, 'cancelledOrders' => $cancelledOrders]);
    }

    public function getOrderDetails(Request $request, Order $order)
    {
        Gate::authorize('view', $order);
        $order->load('products.oldestImage', 'statuses', 'latestStatus')->loadCount('products');

        return view('customer.order-details', compact('order'));
    }

    public function getOrderStatusHistory(Order $order)
    {
        $order->load('statuses', 'latestStatus');

        return view('customer.order-status-history', compact('order'));
    }

    public function checkout(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $products = json_decode($request->products);

        $lineItems = [];

        foreach ($products as $product) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                        'images' => [$product->oldest_image],
                    ],
                    'unit_amount' => ($product->price - $product->discount) * 100,
                ],
                'quantity' => $product->userSelectedQuantity,
            ];
        }

        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel', [], true),
        ]);


        try {
            DB::beginTransaction();

            $order = new Order();
            $order->user_id = $request->user()->id;
            $order->save();

            if (!$products) {
                return response('', 500);
            }

            foreach ($products as $product) {
                $order->products()->attach($product->id, [
                    'quantity' => $product->userSelectedQuantity,
                    'variation_id' => $product->variation_id ?? null,
                ]);
            }

            $payment = new Payment([
                'status' => 'pending',
                'transaction_id' => $session->id,
            ]);
            $order->payment()->save($payment);

            DB::commit();

            return redirect($session->url);

        } catch (\Throwable $th) {
            DB::rollback();

            return response()->json(['success' => false, 'message' => 'Something went wrong!'], 500);
        }
    }

    public function success(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $sessionId = $request->get('session_id');

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);

            if (!$session) {
                throw new NotFoundHttpException();
            }

            $paymentIntent = \Stripe\PaymentIntent::retrieve($session->payment_intent);
            $paymentMethodDetails = \Stripe\PaymentMethod::retrieve($paymentIntent->payment_method);

            $customerName = $session->customer_details->name;
            $customerEmail = $session->customer_details->email;

            $payment = Payment::where('transaction_id', $session->id)->first();
            if ($payment->status != 'completed') {
                $payment->update([
                    'status' => 'completed',
                    'amount' => $session->amount_total,
                    'payment_method' => 'card',
                ]);

                Mail::to($customerEmail)->queue(new OrderCreated($customerName, $payment->order));
            }

            $orderNumber = $payment->order->order_number;

            return view('customer.checkout-success', compact('customerName', 'orderNumber'));
        } catch (\Exception $e) {
            throw new NotFoundHttpException();
        }
    }

    public function cancel()
    {
        return view('customer.checkout-cancel');
    }

    public function webhook(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        $payload = @file_get_contents('php://input');
        $event = null;

        try {
            $event = \Stripe\Event::constructFrom(
                json_decode($payload, true)
            );
        } catch (\UnexpectedValueException $e) {
            return response('', 400);
        }
        if ($endpoint_secret) {

            $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
            try {
                $event = \Stripe\Webhook::constructEvent(
                    $payload,
                    $sig_header,
                    $endpoint_secret
                );
            } catch (\Stripe\Exception\SignatureVerificationException $e) {
                return response('', 400);
            }
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;

                $payment = Payment::where('transaction_id', $session->id)->first();

                if ($payment->status != 'completed') {
                    $payment->update([
                        'status' => 'completed',
                        'amount' => $session->amount_total,
                        'payment_method' => 'card',
                    ]);

                    Mail::to($payment->order->user)->send(new OrderCreated($payment->order->user->name, $payment->order));

                }

                break;

            default:
                // Unexpected event type
                error_log('Received unknown event type');
        }

        return response('', 200);
    }

}
