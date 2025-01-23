<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Backend\UserDetailsController;
use App\Http\Controllers\Backend\UserPermissionsController;
use App\Http\Controllers\Backend\CollectionsController;

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

// ==== Manage Collections in Product Details
Route::resource('collections', CollectionsController::class);