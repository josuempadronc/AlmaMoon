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
        Route::get('ensamble', function () {
            return view('./Dashboard/ensamble');
        });
        Route::get('estadistica', function () {
            return view('./statistics/statistics');
        });

        Route::post('/get-customer-data', [App\Http\Controllers\CustomerController::class,'getCustomerData'])->name('order.get-customer-data');
        Route::put('/orders/{id}', [App\Http\Controllers\OrderController::class, 'actualizar'])->name('orders.actualizar');

        // Generador de PDF
        Route::get('orders/{id}/pdf', [App\Http\Controllers\OrderController::class, 'pdf'])->name('orders.pdf');
        Route::get('product-sheats/{id}/pdf', [App\http\Controllers\ProductSheatController::class, 'pdf'])->name('product-sheats.pdf');

        // End Generador de PDF

        // Calculadora de Productos
        Route::post('product-sheats/calculator/{id}', [App\http\Controllers\ProductSheatController::class, 'calculator'])->name('product-sheats.calculator');
        Route::get('product-sheats/calculator/{id}', [App\http\Controllers\ProductSheatController::class, 'calculator'])->name('product-sheats.json');

        // End Calculadora de Productos

        // Import txt
        Route::post('/finished-products/import', [App\Http\Controllers\FinishedProductController::class, 'import'])->name('finished-products.import');
        Route::post('/color/import', [App\Http\Controllers\ColorController::class, 'import'])->name('color.import');
        Route::post('/paws/import', [App\Http\Controllers\PawController::class, 'import'])->name('pata.import');
        Route::post('/destinations/import', [App\Http\Controllers\DestinationController::class, 'import'])->name('Destination.import');
        Route::post('/locations/import', [App\Http\Controllers\LocationController::class, 'import'])->name('location.import');
        Route::post('/measures/import', [App\Http\Controllers\MeasureController::class, 'import'])->name('measure.import');
        Route::post('/movement-details/import', [App\Http\Controllers\MovementDetailController::class, 'import'])->name('DetallesMoviminetos.import');
        Route::post('/origins/import', [App\Http\Controllers\OriginController::class, 'import'])->name('origen.import');
        Route::post('/suppliers/import', [App\Http\Controllers\SupplierController::class, 'import'])->name('supplier.import');
        Route::post('/type-movements/import', [App\Http\Controllers\TypeMovementController::class, 'import'])->name('typeMovement.import');
        Route::post('/customer/import', [App\Http\Controllers\CustomerController::class, 'import'])->name('customer.import');
        Route::post('/assembly-accessories/import', [App\Http\Controllers\AssemblyAccessoryController::class, 'import'])->name('AssemblyAccessory.import');
        Route::post('/product-type-assemblies/import', [App\Http\Controllers\ProductTypeAssemblyController::class, 'import'])->name('ProductTypeAssembly.import');
        Route::post('/semi-finished-products/import', [App\Http\Controllers\SemiFinishedProductController::class, 'import'])->name('semi-finished-products.import');
        Route::post('/raw-materials/import', [App\Http\Controllers\RawMaterialController::class, 'import'])->name('raw-materials.import');

        // End Import txt

       // Almacen
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

        // Ensamble

        Route::resource('assembly-inputs', App\Http\Controllers\AssemblyInputController::class)->middleware('auth');
        Route::resource('assembly-structures', App\Http\Controllers\AssemblyStructureController::class)->middleware('auth');
        Route::resource('assembly-accessories',App\Http\Controllers\AssemblyAccessoryController::class)->middleware('auth');
        Route::resource('product-type-assemblies', App\http\Controllers\ProductTypeAssemblyController::class)->middleware('auth');
        Route::resource('product-sheats', App\http\Controllers\ProductSheatController::class)->middleware('auth');
        Route::resource('assembly-movements', App\http\Controllers\AssemblyMovementController::class)->middleware('auth');
        Route::resource('assembly-movement-inputs', App\http\Controllers\AssemblyMovementInputController::class)->middleware('auth');
        Route::resource('assembly-movement-inputs', App\http\Controllers\AssemblyMovementInputController::class)->middleware('auth');

            // Progreso Productivo
            Route::resource('progress-assambly', App\http\Controllers\ProgressAssamblyController::class)->middleware('auth');
            Route::resource('progress-lona', App\http\Controllers\ProgressLonaController::class)->middleware('auth');
            Route::resource('progress-serigrafium', App\http\Controllers\ProgressSerigrafiumController::class)->middleware('auth');
            Route::resource('progress-vulcanizado', App\http\Controllers\ProgressVulcanizadoController::class)->middleware('auth');
        // End Ensamble

});

