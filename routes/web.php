<?php

use App\Http\Controllers\FbaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;

/* use Laravel\Dusk\Http\Controllers\UserController; */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Authentication routes
Auth::routes();


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Include Wave Routes
Wave::routes();

// home page components routes
Route::view('saas-index', 'saas-index')->name('saas-index');

// landing pages routes -> @ wave router 



Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('admin-sellerfullfilment', [AdminController::class, 'index'])->name('admin.index');
    Route::get('admin-sellerfullfilment/deposit_user', [AdminController::class, 'deposit_user'])->name('admin.deposit_user');
    Route::get('admin-sellerfullfilment/reports', [AdminController::class, 'reports'])->name('admin.reports');
    Route::get('admin-sellerfullfilment/user_list', [AdminController::class, 'user_list'])->name('admin.user_list');
    Route::get('admin-sellerfullfilment/user_list/{user_id}/details', [AdminController::class, 'user_details'])->name('admin.user.details');
    Route::get('admin-sellerfullfilment/user_list/{id}/logs', [AdminController::class, 'user_logs'])->name('admin.user_logs');
    Route::get('admin-sellerfullfilment/deposit_requests', [AdminController::class, 'deposit_requests_index'])->name('admin.deposit_requests');
});

Route::group(['middleware' => ['auth', 'roles'], 'roles' => ['employee', 'admin']], function () {
    Route::get('warehouse-management-sellerfullfilment', [WarehouseController::class, 'index'])->name('warehouse.index');
    Route::get('warehouse-sellerfullfilment/order_process', [WarehouseController::class, 'order_process'])->name('warehouse.order_process');
    Route::get('warehouse-sellerfullfilment/order_process/{order_id}/status_change', [WarehouseController::class, 'status_change'])->name('warehouse.order_process.status_change');
    Route::get('warehouse-sellerfullfilment/order_process/{order_id}/edit', [WarehouseController::class, 'edit_order'])->name('warehouse.order_process.edit');
    Route::get('/warehouse-sellerfullfilment/order_process/{id}/skt_add', [WarehouseController::class, 'skt_add'])->name('warehouse.order_process.skt_add');
    Route::get('/warehouse-sellerfullfilment/order_process/{id}/payment_mail', [WarehouseController::class, 'payment_mail'])->name('warehouse.order_process.payment_mail');

    Route::get('warehouse-sellerfullfilment/order_process/{order_id}/show_user', [WarehouseController::class, 'show_user'])->name('warehouse.order_process.show_user');
    Route::get('warehouse-sellerfullfilment/order_process/{order_id}/box_create', [WarehouseController::class, 'box_create'])->name('warehouse.order_process.box_create');
    Route::get('warehouse-sellerfullfilment/order_process/{order_id}/box/box_update', [WarehouseController::class, 'box_update'])->name('warehouse.order_process.box_update');
    Route::get('warehouse-sellerfullfilment/user_list/{user_id}/details', [WarehouseController::class, 'user_details'])->name('warehouse.user.details');
    Route::get('warehouse-sellerfullfilment/box_settings', [WarehouseController::class, 'box_settings'])->name('warehouse.box_settings');
    Route::get('warehouse-sellerfullfilment/order/{id}/cancel', [WarehouseController::class, 'cancel'])->name('warehouse.cancel');
});


Route::group(['middleware' => ['auth', 'roles'], 'roles' => ['prime', 'basic', 'admin']], function () {
    Route::get('/{id}/cancel-subscription', [UserController::class, 'cancel_subscription'])->name('user.cancel-subscription');
    Route::get('/fba', [FbaController::class, 'index'])->name('fba');
    Route::get('/fba/order/{id}', [FbaController::class, 'show'])->name('fba.show');
    Route::get('/fba/order/{id}/update_tracking', [FbaController::class, 'update_tracking'])->name('fba.update_tracking');
    Route::get('/fba/order/{id}/update_label_fnsku', [FbaController::class, 'update_label_fnsku'])->name('fba.update_label_fnsku');
    Route::get('/fba/order/{id}/asin_update', [FbaController::class, 'asin_update'])->name('fba.asin_update');
    Route::get('/fba/order/{id}/products_arrived', [FbaController::class, 'products_arrived'])->name('fba.products_arrived');

    //Route::get('/fba/order/{id}/cancel', [FbaController::class, 'cancel'])->name('fba.cancel');
    Route::get('/fba/create', [FbaController::class, 'create'])->name('fba.create');
    Route::get('/payments', [PaymentController::class, 'index'])->name('payment');
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payments/create/{id}/stripe/pay', [StripeController::class, 'charge'])->name('stripe.pay');
    Route::get('fba/order/{id}/cancel', [FbaController::class, 'cancel'])->name('fba.cancel');


    Route::get('/other-services', function () {
        return view('theme::coming-soon');
    })->name('other-services');
    Route::get('/orders', function () {
        return view('theme::coming-soon');
    })->name('other-services');
    Route::get('/dropshipping', function () {
        return view('theme::coming-soon');
    })->name('dropshipping');
});







Route::get('/information', function () {
    return view('theme::coming-soon-dropshipping');
});
