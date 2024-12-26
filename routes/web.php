<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\DeleteImageController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Guest\ProductGuestController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guest.homepage');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// guest
Route::controller(ProductGuestController::class)->group(function () {
    Route::get('products/list', 'getProducts')->name('products/list');
    Route::get('products/{product}', 'show')->name('products.show');
    Route::get('cart', 'cart')->name('cart');
});


// auth
Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });


    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('categories/list', [CategoriesController::class, 'getCategories'])->name('categories.list');
        Route::get('roles/list', [RolesController::class, 'getRoles'])->name('roles.list');
        Route::get('permissions/list', [PermissionsController::class, 'getPermissions'])->name('permissions.list');

        Route::controller(CustomersController::class)->group(function () {
            Route::get('customers/list', 'getCustomers')->name('customers.list');
            Route::post('user/{user}/roles', 'updatedUserRoles')->name('user.roles');
            Route::post('user/{user}/status', 'updateUserStatus')->name('user.status');
            Route::get('customer/{customer}/orders', 'getCustomerOrders')->name('customer.orders');
        });

        Route::controller(ProductsController::class)->group(function () {
            Route::get('products/list', 'getProducts')->name('products.list');
            Route::delete('product/{product}/image/{image}', 'destroyProductImage')->name('image.delete');
            Route::put('products/{product}/stock', 'updateStock')->name('products.update.stock');
        });

        Route::controller(OrdersController::class)->group(function () {
            Route::get('orders/list', 'getOrders')->name('orders.list');
            Route::put('orders/{order}/status', 'updateStatus')->name('orders.update.status');
            Route::put('orders/{order}/payment', 'updatePaymentStatus')->name('orders.update.payment');
            Route::put('orders/{order}/cancel', 'cancelOrder')->name('orders.cancel');
        });

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

});

require __DIR__ . '/auth.php';
