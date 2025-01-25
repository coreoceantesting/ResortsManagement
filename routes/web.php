<?php

use App\Http\Controllers\Admin\Masters\CoupleController;
use App\Http\Controllers\Admin\Masters\GroupController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
// Guest Admins
Route::resource('couple', CoupleController::class);
Route::post('/couple/store', [CoupleController::class, 'store'])->name('couple.store');

// Add group routes here if needed
Route::resource('group', GroupController::class);  // Assuming you have a GroupController
Route::post('/group/store', [GroupController::class, 'store'])->name('group.store');

Route::get('home', fn () => redirect()->route('dashboard'))->name('home');

Route::middleware(['guest','PreventBackHistory'])->group(function()
{
    Route::get('admin/login', [App\Http\Controllers\Admin\AuthController::class, 'showLogin'] )->name('login');
    Route::post('admin/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('signin');
    Route::get('register', [App\Http\Controllers\Admin\AuthController::class, 'showRegister'] )->name('register');
    Route::post('register', [App\Http\Controllers\Admin\AuthController::class, 'register'])->name('signup');

    // Routes for Forget Password
Route::get('forget-password', [App\Http\Controllers\Admin\AuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [App\Http\Controllers\Admin\AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [App\Http\Controllers\Admin\AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [App\Http\Controllers\Admin\AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');

});    

// Authenticated admins

Route::get('dashboard/Couple', [App\Http\Controllers\Admin\BookingController::class, 'bookingCouplePendingIndex'])->name('dashboard');
Route::get('dashboard/Group', [App\Http\Controllers\Admin\BookingController::class, 'bookingGroupPendingIndex'])->name('dashboardGroup');
Route::get('bookingApproved_dashboard', [App\Http\Controllers\Admin\BookingController::class, 'bookingApprovedIndex'])->name('bookingApproved_dashboard');
Route::get('bookingRejected_dashboard', [App\Http\Controllers\Admin\BookingController::class, 'bookingRejectedIndex'])->name('bookingRejected_dashboard');
Route::post('/booking/approve/{id}', [BookingController::class, 'approveBooking'])->name('booking.approve');
Route::post('/booking/reject/{id}', [BookingController::class, 'rejectBooking'])->name('booking.reject');
Route::post('logout', [App\Http\Controllers\Admin\AuthController::class, 'Logout'])->name('logout');
 

Route::middleware(['auth','PreventBackHistory'])->group(function()
{
    // Auth Routes
    Route::get('show-change-password', [App\Http\Controllers\Admin\AuthController::class, 'showChangePassword'] )->name('show-change-password');
    Route::post('change-password', [App\Http\Controllers\Admin\AuthController::class, 'changePassword'] )->name('change-password');
    Route::get('change-theme-mode', [App\Http\Controllers\Admin\DashboardController::class, 'changeThemeMode'])->name('change-theme-mode');
   
    // admins Roles n Permissions
    Route::resource('admins', AdminController::class );
    Route::get('admins/{admin}/toggle', [AdminController::class, 'toggle' ])->name('admins.toggle');
    Route::get('admins/{admin}/retire', [AdminController::class, 'retire' ])->name('admins.retire');
    Route::put('admins/{admin}/change-password', [AdminController::class, 'changePassword' ])->name('admins.change-password');
    Route::get('admins/{admin}/get-role', [AdminController::class, 'getRole' ])->name('admins.get-role');
    Route::put('admins/{admin}/assign-role', [AdminController::class, 'assignRole' ])->name('admins.assign-role');
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class );

    // admin
    

    Route::get('customer/view/{id}', [BookingController::class, 'viewCouple'])->name('customer.view');
    Route::get('groupcustomer/view/{id}', [BookingController::class, 'viewGroup'])->name('groupcustomer.view');
});
 


// Group resource routes

 Route::resource('group', GroupController::class);
 Route::post('/group/store', [GroupController::class, 'storeGroup'])->name('group.store');

