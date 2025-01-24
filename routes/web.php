<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Backend\UserDetailsController;
use App\Http\Controllers\Backend\UserPermissionsController;
use App\Http\Controllers\Backend\CollectionsController;
use App\Http\Controllers\Backend\ProductCategoryController;
use App\Http\Controllers\Backend\ProductFabricsController;
use App\Http\Controllers\Backend\FabricCompositionController;
use App\Http\Controllers\Backend\ProductSizesController;
use App\Http\Controllers\Backend\ProductPrintsController;
use App\Http\Controllers\Backend\ProductDetailsController;


// =========================================================================== Backend Routes

Route::get('/', function () {
    return view('backend.login');
});
  
// Authentication Routes
Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::get('/change-password', [LoginController::class, 'change_password'])->name('admin.changepassword');
Route::post('/update-password', [LoginController::class, 'updatePassword'])->name('admin.updatepassword');

Route::get('/register', [LoginController::class, 'register'])->name('admin.register');
Route::post('/register', [LoginController::class, 'authenticate_register'])->name('admin.register.authenticate');
    
// Admin Routes with Middleware
Route::group(['middleware' => ['auth:web', \App\Http\Middleware\PreventBackHistoryMiddleware::class]], function () {
        Route::get('/dashboard', function () {
            return view('backend.dashboard'); 
        })->name('admin.dashboard');
});

// ==== Manage User List in User Management
Route::resource('user-list', UserDetailsController::class);
Route::post('/update-status', [UserDetailsController::class, 'updateStatus'])->name('update.status');

// ==== Manage User Permissions in User Management
Route::resource('user-permissions', UserPermissionsController::class);

// ==== Manage Collections in Store Management
Route::resource('collections', CollectionsController::class);

// ==== Manage category in Store Management
Route::resource('product-category', ProductCategoryController::class);

// ==== Manage fabrics in Store Management
Route::resource('product-fabrics', ProductFabricsController::class);

// ==== Manage composition in Store Management
Route::resource('fabric-composition', FabricCompositionController::class);

// ==== Manage Sizes in Store Management
Route::resource('product-sizes', ProductSizesController::class);

// ==== Manage prints in Store Management
Route::resource('product-prints', ProductPrintsController::class);

// ==== Manage product details in Store Management
Route::resource('product-details', ProductDetailsController::class);