<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DealController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\MappingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\PlantestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PPlantestController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\DealProductController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\PenetrationController;
use App\Http\Controllers\IntroductionController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\SupplyProductController;
use App\Http\Controllers\QuotationProductController;
use App\Http\Controllers\RoleController;

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

Route::group(['middleware' => 'guest'], function () {
    Route::resource('login', LoginController::class);
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('/', DashboardController::class);

    // Route::view('/konsumen', 'pages.konsumen.konsumen', ['title' => 'data oke']);
    Route::resource('konsumen', KonsumenController::class);
    Route::resource('product', ProductController::class);
    Route::resource('relationship', RelationshipController::class);
    Route::resource('mapping', MappingController::class);
    Route::resource('introduction', IntroductionController::class);
    Route::resource('penetration', PenetrationController::class);
    Route::resource('plantest', PlantestController::class);
    Route::resource('quotation', QuotationController::class);
    Route::resource('deal', DealController::class);
    Route::resource('supplies', SupplyController::class);
    Route::resource('maintenance', MaintenanceController::class);

    Route::group(['middleware' => ['role:Super Admin|Admin']], function () {
        Route::resource('pplantest', PPlantestController::class);
        Route::get('/productplantest/{id}', [PPlantestController::class, 'pplantest_product'])->name('pplantest.product');
        Route::get('/quotationproduct/{id}', [QuotationProductController::class, 'quotationProduct'])->name('quotationproduct.product');
        Route::resource('quotationproduct', QuotationProductController::class);
        Route::get('/show-deal-product/{id}', [DealProductController::class, 'showProduct'])->name('show.dealproduct');
        Route::resource('dealproduct', DealProductController::class);
        Route::get('/show-product-supply/{id}', [SupplyProductController::class, 'showProduct'])->name('supplyProductData');
        Route::resource('supplyproduct', SupplyProductController::class);
    });

    // Route::
    Route::group(['middleware' => ['role:Super Admin']], function () {
        Route::get('/has-role/{user}', [UserController::class, 'hasRole'])->name('has.role');
        Route::post('/remove-role/{user}/{role}', [UserController::class, 'removeRole'])->name('remove.role');
        Route::post('/give-role/{user}', [UserController::class, 'giveRole'])->name('giveRole');
        Route::resource('user', UserController::class);
        Route::get('/has-permission/{role}', [RoleController::class, 'showPermission'])->name('has.permission');
        Route::post('/give-permission/{role}', [RoleController::class, 'givePermission'])->name('give.permission');
        Route::post('/revoke-permission/{role}/{permission}', [RoleController::class, 'revokePermission'])->name('revoke.permission');
        Route::resource('role', RoleController::class);
    });
});
