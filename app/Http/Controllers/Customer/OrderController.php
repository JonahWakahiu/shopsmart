<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
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
        $productIds = [];

        foreach ($products as $product) {
            $productIds[] = $product->id;
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


        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel', [], true),
        ]);

        $order = new Order();
        $order->user_id = $request->user()->id;
        $order->save();

        foreach ($products as $product) {
            $order->products()->attach($product->id, [
                'quantity' => $product->userSelectedQuantity,
                'variation_id' => $product->variation_id ?? '',
            ]);
        }

        $payment = new Payment([
            'status' => 'pending',
            'transaction_id' => $checkout_session->id,
        ]);
        $order->payment()->save($payment);


        return redirect($checkout_session->url);
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

            $customer = $session->customer_details;
            $order = Order::whereHas('payment', function (Builder $query) use ($session) {
                $query->where('transaction_id', $session->id);
            })->with('payment')->first();

            if (!$order) {
                throw new NotFoundHttpException();
            }

            if ($order->payment->status != 'completed') {
                $order->payment()->update([
                    'status' => 'completed',
                    'amount' => $session->amount_total,
                    'payment_method' => $paymentMethodDetails->type,
                ]);
            }

            $customerName = $customer->name;
            $orderNumber = $order->order_number;

            return view('customer.checkout-success', compact('customerName', 'orderNumber'));
        } catch (\Exception $e) {
            throw new NotFoundHttpException();
        }
    }

    public function cancel()
    {
        return view('customer.checkout-cancel');
    }

    public function webhook()
    {

    }

}
