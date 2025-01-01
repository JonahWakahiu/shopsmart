<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.customers.index');
    }

    public function getCustomers(Request $request)
    {
        $rowsPerPage = $request->query('rowsPerPage', 10);
        $q = $request->query('q', null);

        $customers = User::whereNot('email', $request->user()->email)->withCount('orders')
            ->with(['latestOrder:id,created_at,user_id'])
            ->when($q, function ($query) use ($q) {
                $query->where('name', 'like', "%$q%")
                    ->orWhere('email', 'like', "%$q%")
                    ->orWhere('phone_number', 'like', "%$q%")
                    ->orWhere('city', 'like', "%$q%");
            })
            ->paginate(perPage: $rowsPerPage);

        return response()->json($customers);
    }

    public function getCustomerOrders(Request $request, User $customer)
    {

        $rowsPerPage = $request->query('rowsPerPage', 10);
        $q = (string) $request->query('q', '');

        $customerOrders = $customer->orders()->when($q, function ($query) use ($q) {
            $query->where('order_number', 'like', "%$q%");
        })->with(['latestStatus', 'payment'])->paginate($rowsPerPage);

        return response()->json($customerOrders);
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

    }

    /**
     * Display the specified resource.
     */
    public function show(User $customer)
    {
        $customer->loadCount('orders')->load(['orders' => ['latestStatus', 'payment']]);
        return view('admin.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.customers.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    public function updatedUserRoles(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name',
        ]);

        try {
            $user->syncRoles($request->roles);

            return response()->json(['success' => true, 'message' => ucfirst($user->name) . ' roles updated successfully'], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()], 500);
        }
    }

    public function updateUserStatus(Request $request, User $user)
    {
        $request->validate([
            'status' => 'required',
        ]);
        try {
            $user->status = $request->status;
            $user->save();

            return response()->json(['success' => true, 'message' => ucfirst($user->name) . ' status updated successfully'], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $customer)
    {
        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully!']);
    }
}
