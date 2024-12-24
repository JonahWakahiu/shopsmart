<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\DeleteImageController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('products/list', [ProductsController::class, 'getProducts'])->name('products.list');
    Route::get('categories/list', [CategoriesController::class, 'getCategories'])->name('categories.list');
    Route::get('orders/list', [OrdersController::class, 'getOrders'])->name('orders.list');
    Route::get('customers/list', [CustomersController::class, 'getCustomers'])->name('customers.list');
    Route::get('roles/list', [RolesController::class, 'getRoles'])->name('roles.list');
    Route::get('permissions/list', [PermissionsController::class, 'getPermissions'])->name('permissions.list');

    Route::post('user/{user}/roles', [CustomersController::class, 'updatedUserRoles'])->name('user.roles');
    Route::post('user/{user}/status', [CustomersController::class, 'updateUserStatus'])->name('user.status');

    Route::delete('product/{product}/image/{image}', [ProductsController::class, 'destroyProductImage'])->name('image.delete');

    Route::put('orders/{order}/status', [OrdersController::class, 'updateStatus'])->name('orders.update.status');
    Route::put('orders/{order}/payment', [OrdersController::class, 'updatePaymentStatus'])->name('orders.update.payment');
    Route::put('orders/{order}/cancel', [OrdersController::class, 'cancelOrder'])->name('orders.cancel');

    Route::get('customer/{customer}/orders', [CustomersController::class, 'getCustomerOrders'])->name('customer.orders');

    Route::put('products/{product}/stock', [ProductsController::class, 'updateStock'])->name('products.update.stock');

    Route::resource('products', ProductsController::class);
    Route::resource('categories', CategoriesController::class)->except([
        'create',
        'show',
        'edit'
    ]);
    Route::resource('orders', OrdersController::class);
    Route::resource('customers', CustomersController::class);

    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);
});

require __DIR__ . '/auth.php';
