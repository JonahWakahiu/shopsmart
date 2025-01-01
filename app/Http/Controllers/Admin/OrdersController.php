<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatusHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.orders.index');
    }

    public function getOrders(Request $request)
    {
        $rowsPerPage = $request->query('rowsPerPage', 10);
        $q = (string) $request->query('q', '');

        // filter
        $filterByFulfillmentStatus = $request->query('filterByFulfillmentStatus');
        $filterByPaymentStatus = $request->query('filterByPaymentStatus');

        $orders = Order::
            when($q, function ($query) use ($q) {
                $query->where('order_number', 'like', "%$q%");
            })
            ->when($filterByFulfillmentStatus, function ($query) use ($filterByFulfillmentStatus) {
                $query->whereHas('latestStatus', function ($query) use ($filterByFulfillmentStatus) {
                    $query->where('status', 'like', "%$filterByFulfillmentStatus%");
                });
            })
            ->when($filterByPaymentStatus, function ($query) use ($filterByPaymentStatus) {
                $query->whereHas('payment', function ($query) use ($filterByPaymentStatus) {
                    $query->where('status', 'like', "%$filterByPaymentStatus%");
                });
            })
            ->with('user', 'products', 'payment', 'latestStatus')
            ->paginate($rowsPerPage);

        return response()->json($orders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        Gate::authorize('view', $order);

        $order->load([
            'user' => function ($query) {
                $query->withCount('orders');
            },
            'payment',
            'products.oldestImage',
            'statuses.changedBy',
            'latestStatus'
        ]);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'statuses' => 'required',
        ]);

        $orderStatuses = ['pending', 'approved', 'processing', 'shipped', 'delivered', 'completed', 'cancelled'];

        // Ensure statuses are in the correct order
        $lastIndex = -1;
        foreach ($validated['statuses'] as $status) {
            $currentIndex = array_search($status, $orderStatuses);
            if ($currentIndex === false || $currentIndex < $lastIndex) {
                return response()->json(['error' => 'Statuses must be in the correct order.'], 422);
            }
            $lastIndex = $currentIndex;
        }

        // Sync the statuses relationship
        $order->statuses()
            ->whereNotIn('status', $validated['statuses'])
            ->delete();

        foreach ($validated['statuses'] as $status) {
            $order->statuses()->updateOrCreate(['status' => $status], ['changed_by' => $request->user()->id]);
        }

        $order->load('statuses.changedBy', 'latestStatus');

        return response()->json(['message' => 'Statuses updated successfully.', 'order' => $order]);
    }


    public function updatePaymentStatus(Request $request, Order $order)
    {
        $validated = $request->validate(['status' => 'required']);

        $order->payment()->update([
            'status' => $validated['status'],
        ]);

        $order->load('payment');

        return response()->json(['message' => 'Order Payment Status updated successfully!', 'order' => $order]);
    }

    public function cancelOrder(Request $request, Order $order)
    {
        $order->statuses()->updateOrCreate(
            ['status' => 'cancelled',],
            ['changed_by' => $request->user()->id]
        );
        $order->load('statuses.changedBy', 'latestStatus');

        return response()->json(['message' => 'Order cancelled successfully!', 'order' => $order]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);

    }
}
