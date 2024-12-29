<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\DeleteImageController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Customer\CategoryController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//  guest customer
Route::view('', 'customer.homepage')->name('home');

Route::controller(ProductController::class)->group(function () {
    Route::get('products/list', 'getProducts')->name('products/list');
    Route::get('products/{product}', 'show')->name('products.show');
});

Route::get('cart', [OrderController::class, 'cart'])->name('cart');

Route::controller(CategoryController::class)->group(function () {
    Route::get('category/{category}', 'show')->name('category.products.show');
    Route::get('category/{category}/list', 'getCategoryProducts')->name('category.products.list');
});

// authenticated user
Route::middleware('auth')->group(function () {

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // authenticated customer routes
    Route::controller(OrderController::class)->group(function () {
        Route::post('checkout', 'checkout')->name('checkout');
        Route::get('/success', 'success')->name('checkout.success');
        Route::get('/cancel', 'cancel')->name('checkout.cancel');
        Route::post('webhook', 'webhook')->name('checkout.webhook');

        // get orders
        Route::get('orders', 'index')->name('orders');
        Route::get('orders/list', 'getOrders')->name('orders.list');
        Route::get('orders/{order}/details', 'getOrderDetails')->name('orders.details');
        Route::get('orders/{order}/track', 'getOrderStatusHistory')->name('orders.track');
    });

    // admin/manager routes
    Route::middleware('role:admin|manager')->group(function () {

        Route::view('dashboard', 'admin.dashboard')->middleware('verified')->name('dashboard');

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
});

require __DIR__ . '/auth.php';
