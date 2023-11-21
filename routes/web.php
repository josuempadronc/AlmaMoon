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


    Route::group(['middleware' => ['role:1']], function () {
        // Almacen
        Route::get('admin/almacen', function () {
            return view('./Dashboard/almacen');
        });

        Route::get('admin/estadistica', function () {
            return view('./statistics/statistics');
        });
        Route::resource('admin/color', App\Http\Controllers\ColorController::class)->middleware('auth');
        Route::resource('admin/destinations', App\Http\Controllers\DestinationController::class)->middleware('auth');
        Route::resource('admin/finished-products', App\Http\Controllers\FinishedProductController::class)->middleware('auth');
        Route::resource('admin/locations', App\Http\Controllers\LocationController::class)->middleware('auth');
        Route::resource('admin/measures', App\Http\Controllers\MeasureController::class)->middleware('auth');
        Route::resource('admin/movements', App\Http\Controllers\MovementController::class)->middleware('auth');
        Route::resource('admin/movement-details', App\Http\Controllers\MovementDetailController::class)->middleware('auth');
        Route::resource('admin/origins', App\Http\Controllers\OriginController::class)->middleware('auth');
        Route::resource('admin/paws', App\Http\Controllers\PawController::class)->middleware('auth');
        Route::resource('admin/semi-finished-movements', App\Http\Controllers\SemiFinishedMovementController::class)->middleware('auth');
        Route::resource('admin/semi-finished-products', App\Http\Controllers\SemiFinishedProductController::class)->middleware('auth');
        Route::resource('admin/suppliers', App\Http\Controllers\SupplierController::class)->middleware('auth');
        Route::resource('admin/type-movements', App\Http\Controllers\TypeMovementController::class)->middleware('auth');
        Route::resource('admin/raw-materials', App\Http\Controllers\RawMaterialController::class)->middleware('auth');
        Route::resource('admin/raw-material-movements', App\Http\Controllers\RawMaterialMovementController::class)->middleware('auth');
        Route::resource('admin/assembled-products', App\Http\Controllers\AssembledProductController::class)->middleware('auth');
        Route::resource('admin/orders', App\Http\Controllers\OrderController::class)->middleware('auth');
        // End Almacen
    });

    Route::group(['middleware' => ['role:2']], function () {
        // Almacen
        Route::get('/almacen', function () {
            return view('./Dashboard/almacen');
        });

        Route::resource('color', App\Http\Controllers\ColorController::class)->only(['index','show', 'create', 'store', 'destroy'])->middleware('auth');
        Route::resource('destinations', App\Http\Controllers\DestinationController::class)->only(['index', 'show', 'create', 'store', 'destroy'])->middleware('auth');
        Route::resource('finished-products', App\Http\Controllers\FinishedProductController::class)->only(['index', 'show', 'create', 'store', 'destroy'])->middleware('auth');
        Route::resource('locations', App\Http\Controllers\LocationController::class)->only(['index', 'show', 'create', 'store', 'destroy'])->middleware('auth');
        Route::resource('measures', App\Http\Controllers\MeasureController::class)->only(['index', 'show', 'create', 'store', 'destroy'])->middleware('auth');
        Route::resource('movements', App\Http\Controllers\MovementController::class)->only(['index', 'show', 'create', 'store', 'destroy'])->middleware('auth');
        Route::resource('movement-details', App\Http\Controllers\MovementDetailController::class)->only(['index', 'show', 'create', 'store', 'destroy'])->middleware('auth');
        Route::resource('origins', App\Http\Controllers\OriginController::class)->only(['index', 'show', 'create', 'store', 'destroy'])->middleware('auth');
        Route::resource('paws', App\Http\Controllers\PawController::class)->only(['index', 'show', 'create', 'store', 'destroy'])->middleware('auth');
        Route::resource('semi-finished-movements', App\Http\Controllers\SemiFinishedMovementController::class)->only(['index', 'show', 'create', 'store', 'destroy'])->middleware('auth');
        Route::resource('semi-finished-products', App\Http\Controllers\SemiFinishedProductController::class)->only(['index', 'show', 'create', 'store', 'destroy'])->middleware('auth');
        Route::resource('suppliers', App\Http\Controllers\SupplierController::class)->only(['index', 'show', 'create', 'store', 'destroy'])->middleware('auth');
        Route::resource('type-movements', App\Http\Controllers\TypeMovementController::class)->only(['index', 'show', 'create', 'store', 'destroy'])->middleware('auth');
        Route::resource('raw-materials', App\Http\Controllers\RawMaterialController::class)->only(['index', 'show', 'create', 'store', 'destroy'])->middleware('auth');
        Route::resource('raw-material-movements', App\Http\Controllers\RawMaterialMovementController::class)->only(['index', 'show', 'create', 'store', 'destroy'])->middleware('auth');
        Route::resource('assembled-products', App\Http\Controllers\AssembledProductController::class)->only(['index', 'show', 'create', 'store', 'destroy'])->middleware('auth');
        Route::resource('orders', App\Http\Controllers\OrderController::class)->only(['index', 'show', 'destroy'])->middleware('auth');
        // End Alamcen
    });
    Route::group(['middleware' => ['role:7']], function () {
        // Almacen
        Route::get('ventas/almacen', function () {
            return view('./Dashboard/almacen');
        });

        Route::resource('ventas/color', App\Http\Controllers\ColorController::class)->only(['index'])->middleware('auth');
        Route::resource('ventas/destinations', App\Http\Controllers\DestinationController::class)->only(['index'])->middleware('auth');
        Route::resource('ventas/finished-products', App\Http\Controllers\FinishedProductController::class)->only(['index'])->middleware('auth');
        Route::resource('ventas/locations', App\Http\Controllers\LocationController::class)->only(['index'])->middleware('auth');
        Route::resource('ventas/measures', App\Http\Controllers\MeasureController::class)->only(['index'])->middleware('auth');
        Route::resource('ventas/movements', App\Http\Controllers\MovementController::class)->only(['index'])->middleware('auth');
        Route::resource('ventas/movement-details', App\Http\Controllers\MovementDetailController::class)->only(['index'])->middleware('auth');
        Route::resource('ventas/origins', App\Http\Controllers\OriginController::class)->only(['index'])->middleware('auth');
        Route::resource('ventas/paws', App\Http\Controllers\PawController::class)->only(['index'])->middleware('auth');
        Route::resource('ventas/semi-finished-movements', App\Http\Controllers\SemiFinishedMovementController::class)->only(['index'])->middleware('auth');
        Route::resource('ventas/semi-finished-products', App\Http\Controllers\SemiFinishedProductController::class)->only(['index'])->middleware('auth');
        Route::resource('ventas/suppliers', App\Http\Controllers\SupplierController::class)->only(['index'])->middleware('auth');
        Route::resource('ventas/type-movements', App\Http\Controllers\TypeMovementController::class)->only(['index'])->middleware('auth');
        Route::resource('ventas/raw-materials', App\Http\Controllers\RawMaterialController::class)->only(['index'])->middleware('auth');
        Route::resource('ventas/raw-material-movements', App\Http\Controllers\RawMaterialMovementController::class)->only(['index'])->middleware('auth');
        Route::resource('ventas/assembled-products', App\Http\Controllers\AssembledProductController::class)->only(['index'])->middleware('auth');
        Route::resource('ventas/orders', App\Http\Controllers\OrderController::class)->middleware('auth');
        // End Alamcen
    });
});


// Route::resource('/orders', App\Http\Controllers\OrderController::class)->middleware('auth');
