<?php

use App\Http\Controllers\Admin\Masters\CoupleController;
use App\Http\Controllers\Admin\Masters\GroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;



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
    return view('welcome');
});

    // Route::get('/welcome', function () {
    //     return view('welcome'); // The 'welcome' view will be returned.
    // })->name('welcome');
    Route::get('change-theme-mode', [App\Http\Controllers\Admin\DashboardController::class, 'changeThemeMode'])->name('change-theme-mode');
    Route::post('logout', [App\Http\Controllers\Admin\AuthController::class, 'Logout'])->name('logout');
    
    // Masters
  // Couple resource routes

    Route::resource('couple', CoupleController::class);
    Route::post('/couple/store', [CoupleController::class, 'store'])->name('couple.store');


// Group resource routes

    Route::resource('group', GroupController::class);
    Route::post('/group/store', [GroupController::class, 'storeGroup'])->name('group.store');






