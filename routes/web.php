<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
// use App\Http\Middleware\CheckRole;
// use App\Helpers\CustomHelper;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('./auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {

        Route::get('almacen', function () {
            return view('./Dashboard/almacen');
        });
        Route::get('estadistica', function () {
            return view('./statistics/statistics');
        });

        Route::post('/get-customer-data', [App\Http\Controllers\CustomerController::class,'getCustomerData'])->name('order.get-customer-data');
        Route::get('orders/{id}/pdf', [App\Http\Controllers\OrderController::class, 'pdf'])->name('orders.pdf');
        Route::put('/orders/{id}', [App\Http\Controllers\OrderController::class, 'actualizar'])->name('orders.actualizar');


        Route::resource('color', App\Http\Controllers\ColorController::class);
        Route::resource('destinations', App\Http\Controllers\DestinationController::class)->middleware('auth');
        Route::resource('finished-products', App\Http\Controllers\FinishedProductController::class)->middleware('auth');
        Route::resource('locations', App\Http\Controllers\LocationController::class)->middleware('auth');
        Route::resource('measures', App\Http\Controllers\MeasureController::class)->middleware('auth');
        Route::resource('movements', App\Http\Controllers\MovementController::class)->middleware('auth');
        Route::resource('movement-details', App\Http\Controllers\MovementDetailController::class)->middleware('auth');
        Route::resource('origins', App\Http\Controllers\OriginController::class)->middleware('auth');
        Route::resource('paws', App\Http\Controllers\PawController::class)->middleware('auth');
        Route::resource('semi-finished-movements', App\Http\Controllers\SemiFinishedMovementController::class)->middleware('auth');
        Route::resource('semi-finished-products', App\Http\Controllers\SemiFinishedProductController::class)->middleware('auth');
        Route::resource('suppliers', App\Http\Controllers\SupplierController::class)->middleware('auth');
        Route::resource('type-movements', App\Http\Controllers\TypeMovementController::class)->middleware('auth');
        Route::resource('raw-materials', App\Http\Controllers\RawMaterialController::class)->middleware('auth');
        Route::resource('raw-material-movements', App\Http\Controllers\RawMaterialMovementController::class)->middleware('auth');
        Route::resource('assembled-products', App\Http\Controllers\AssembledProductController::class)->middleware('auth');
        Route::resource('orders', App\Http\Controllers\OrderController::class)->middleware('auth');
        Route::resource('customer', \App\Http\Controllers\CustomerController::class)->middleware('auth');

        // End Almacen

});

