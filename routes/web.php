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

Route::get('home', fn() => redirect()->route('dashboard'))->name('home');

Route::middleware(['guest', 'PreventBackHistory'])->group(function () {
    Route::get('admin/login', [App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('admin/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('signin');
    // Routes for Forget Password
    Route::get('forget-password', [App\Http\Controllers\Admin\AuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [App\Http\Controllers\Admin\AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [App\Http\Controllers\Admin\AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [App\Http\Controllers\Admin\AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');
});




Route::middleware(['auth', 'PreventBackHistory'])->group(function () {
    // Auth Routes
    Route::get('show-change-password', [App\Http\Controllers\Admin\AuthController::class, 'showChangePassword'])->name('show-change-password');
    Route::post('change-password', [App\Http\Controllers\Admin\AuthController::class, 'changePassword'])->name('change-password');
    Route::get('change-theme-mode', [App\Http\Controllers\Admin\DashboardController::class, 'changeThemeMode'])->name('change-theme-mode');

    // admins Roles n Permissions
    Route::resource('admins', AdminController::class);
    Route::get('admins/{admin}/toggle', [AdminController::class, 'toggle'])->name('admins.toggle');
    Route::get('admins/{admin}/retire', [AdminController::class, 'retire'])->name('admins.retire');
    Route::put('admins/{admin}/change-password', [AdminController::class, 'changePassword'])->name('admins.change-password');
    Route::get('admins/{admin}/get-role', [AdminController::class, 'getRole'])->name('admins.get-role');
    Route::put('admins/{admin}/assign-role', [AdminController::class, 'assignRole'])->name('admins.assign-role');
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);




    // admin
    //couple
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard/Couple', [App\Http\Controllers\Admin\BookingController::class, 'bookingCoupleIndex'])->name('dashboardCouple');
    Route::get('coupleApproved_dashboard', [App\Http\Controllers\Admin\BookingController::class, 'coupleApprovedIndex'])->name('coupleApproved_dashboard');
    Route::get('coupleRejected_dashboard', [App\Http\Controllers\Admin\BookingController::class, 'coupleRejectedIndex'])->name('coupleRejected_dashboard');
    Route::post('/couple/approve/{id}', [App\Http\Controllers\Admin\BookingController::class, 'coupleApproveBooking'])->name('couple.approve');
    Route::post('/couple/reject/{id}', [BookingController::class, 'rejectBookingCouple'])->name('couplebooking.reject');
    Route::get('/admin/booking/view-couple/{id}', [BookingController::class, 'viewCouple'])->name('booking.viewCouple');


    // group
    Route::get('dashboard/Group', [App\Http\Controllers\Admin\BookingController::class, 'bookingGroupIndex'])->name('dashboardGroup');
    Route::get('groupApproved_dashboard', [App\Http\Controllers\Admin\BookingController::class, 'groupApprovedIndex'])->name('groupApproved_dashboard');
    Route::get('groupRejected_dashboard', [App\Http\Controllers\Admin\BookingController::class, 'groupRejectedIndex'])->name('groupRejected_dashboard');
    Route::post('/group/approve/{id}', [BookingController::class, 'groupApproveBooking'])->name('group.approve');
    Route::post('/group/reject/{id}', [BookingController::class, 'rejectBookingGroup'])->name('groupbooking.reject');
    Route::get('/admin/booking/view-group/{id}', [BookingController::class, 'viewGroup'])->name('booking.viewGroup');


    Route::post('logout', [App\Http\Controllers\Admin\AuthController::class, 'Logout'])->name('logout');


    Route::get('customer/view/{id}', [BookingController::class, 'viewCouple'])->name('customer.view');
    Route::get('groupcustomer/view/{id}', [BookingController::class, 'viewGroup'])->name('groupcustomer.view');
});



// Group resource routes

Route::resource('group', GroupController::class);
Route::post('/group/store', [GroupController::class, 'storeGroup'])->name('group.store');
