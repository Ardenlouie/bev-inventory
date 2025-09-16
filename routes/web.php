<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SystemLogController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\RefreshableController;
use App\Http\Controllers\ShowDetailController;
use App\Http\Controllers\FurnitureController;

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
    return redirect()->route('login');

});
Route::get('show/detail/{id}', [ShowDetailController::class, 'index'])->name('details.show');
Route::get('show/furniture/{id}', [ShowDetailController::class, 'furniture'])->name('furnitures.show');

Auth::routes();

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::group(['middleware' => 'auth'], function() {

    // LAPTOPS ROUTES
    Route::group(['middleware' => 'permission:item access'], function() {
        Route::get('laptops', [LaptopController::class, 'index'])->name('laptops.index');
        Route::get('laptops/show/{id}', [LaptopController::class, 'show'])->name('laptops.show');
        Route::get('laptops/downloadQrCode/{id}', [LaptopController::class, 'downloadQrCode'])->name('laptops.downloadQrCode');
       
    });

     // LAPTOPS ROUTES
    Route::group(['middleware' => 'permission:item edit'], function() {
        Route::get('laptops/create', [LaptopController::class, 'create'])->name('laptops.create');
        Route::post('laptops/store', [LaptopController::class, 'store'])->name('laptops.store');
        Route::get('laptops/edit/{id}', [LaptopController::class, 'edit'])->name('laptops.edit');
        Route::post('laptops/update/{id}', [LaptopController::class, 'update'])->name('laptops.update');
        Route::get('export-devices', [LaptopController::class, 'export'])->name('export.devices');

       
    });

    // FURNITURES ROUTES
    Route::group(['middleware' => 'permission:item access'], function() {
        Route::get('furnitures', [FurnitureController::class, 'index'])->name('furnitures.index');
        Route::get('furnitures/show/{id}', [FurnitureController::class, 'show'])->name('furnitures.show');
        Route::get('furnitures/downloadQrCode/{id}', [FurnitureController::class, 'downloadQrCode'])->name('furnitures.downloadQrCode');
        Route::get('export-furnitures', [FurnitureController::class, 'export'])->name('export.furnitures');
       
    });

     // FURNITURES ROUTES
    Route::group(['middleware' => 'permission:item edit'], function() {
        Route::get('furnitures/create', [FurnitureController::class, 'create'])->name('furnitures.create');
        Route::post('furnitures/store', [FurnitureController::class, 'store'])->name('furnitures.store');
        Route::get('furnitures/edit/{id}', [FurnitureController::class, 'edit'])->name('furnitures.edit');
        Route::post('furnitures/update/{id}', [FurnitureController::class, 'update'])->name('furnitures.update');
       
    });

    // REFRESHABLE ROUTES
    Route::group(['middleware' => 'permission:company access'], function() {
        Route::get('refreshables', [RefreshableController::class, 'index'])->name('refreshables.index');
        Route::get('refreshables/show/{id}', [RefreshableController::class, 'show'])->name('refreshables.show');

       
    });

    // COMPANIES ROUTES
    Route::group(['middleware' => 'permission:company access'], function() {
        Route::get('companies', [CompanyController::class, 'index'])->name('company.index');
        Route::get('company/create', [CompanyController::class, 'create'])->name('company.create')->middleware('permission:company create');
        Route::post('company', [CompanyController::class, 'store'])->name('company.store')->middleware('permission:company create');

        Route::get('company/{id}', [CompanyController::class, 'show'])->name('company.show');

        Route::get('company/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit')->middleware('permission:company edit');
        Route::post('company/{id}', [CompanyController::class, 'update'])->name('conpany.update')->middleware('permission:company edit');
    });

    // ROLES ROUTES
    Route::group(['middleware' => 'permission:role access'], function() {
        Route::get('roles', [RoleController::class, 'index'])->name('role.index');
        Route::get('role/create', [RoleController::class, 'create'])->name('role.create')->middleware('permission:role create');
        Route::post('role', [RoleController::class, 'store'])->name('role.store')->middleware('permission:role create');

        Route::get('role/{id}', [RoleController::class, 'show'])->name('role.show');

        Route::get('role/{id}/edit', [RoleController::class, 'edit'])->name('role.edit')->middleware('permission:role edit');
        Route::post('role/{id}', [RoleController::class, 'update'])->name('role.update')->middleware('permission:role edit');
    });

    // USERS ROUTES
    Route::group(['middleware' => 'permission:user access'], function() {
        Route::get('users', [UserController::class, 'index'])->name('user.index');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create')->middleware('permission:user create');
        Route::post('user', [UserController::class, 'store'])->name('user.store')->middleware('permission:user create');

        Route::get('user/{id}', [UserController::class, 'show'])->name('user.show');

        Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('permission:user edit');
        Route::post('user/{id}', [UserController::class, 'update'])->name('user.update')->middleware('permission:user edit');
    });

    // SYSTEM LOG ROUTES
    Route::group(['middleware' => 'permission:system logs'], function() {
        Route::get('system-logs', [SystemLogController::class, 'index'])->name('system-logs');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


});

