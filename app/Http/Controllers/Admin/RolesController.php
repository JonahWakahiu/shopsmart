<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.roles.index');
    }

    public function getRoles(Request $request)
    {
        $searchUser = $request->query('searchUser', '');
        $rowsPerPage = $request->query('rowsPerPage', '');


        $filterByRole = $request->query('filterByRole', '');
        $filterByStatus = $request->query('filterByStatus', '');
        $roles = Role::withCount('users')
            ->with('users:id,avatar', 'permissions')
            ->get();

        $permissions = Permission::all()->groupBy('group');

        $users = User::with('roles')
            ->when($searchUser, function ($query) use ($searchUser) {
                $query->where('name', 'like', "%$searchUser%")
                    ->orWhere('email', 'like', "%$searchUser%");
            })
            ->when($filterByStatus, function ($query) use ($filterByStatus) {
                $query->where('status', $filterByStatus);
            })
            ->when($filterByRole, function ($query) use ($filterByRole) {
                $query->whereHas('roles', function ($query) use ($filterByRole) {
                    $query->where('name', $filterByRole);
                });
            })
            ->paginate($rowsPerPage);

        return response()->json(['success' => true, 'roles' => $roles, 'users' => $users, 'permissions' => $permissions], 200);
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
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'permissions' => 'array',
            'permissions.*' => 'string|exists:permissions,name',
        ]);

        try {

            $permissions = Permission::whereIn('name', $validated['permissions'])->pluck('name');

            $role->syncPermissions($permissions);

            return response()->json(['message' => ucfirst($role->name) . ' permissions updated successfully!']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()], 500);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
