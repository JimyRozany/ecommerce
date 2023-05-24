<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;




// Routes for  admin 

Route::prefix('admin')->group(function () {
    /* ************ Auth Routes *************** */
    Route::middleware('guest:admin')->group(function () {
        Route::get('login',[AuthController::class , 'showLogin']);
        Route::post('login',[AuthController::class , 'login'])->name('admin.login');
    
    });

       Route::get('logout',[AuthController::class , 'logout'])->middleware('auth:admin');
    /* ************ Auth Routes **************** */

    Route::middleware('auth:admin')->group(function () {
            Route::get('dashboard',[AdminController::class ,'dashboard'])->name('admin.dashboard');
            
            Route::get('users',[AdminController::class ,'users'])->name('all.users');
            Route::post('search-in-users',[AdminController::class ,'searchInUsers'])->name('search.in.users');
           
            Route::get('sellers',[AdminController::class ,'sellers'])->name('all.sellers');
            Route::post('search-in-sellers',[AdminController::class ,'searchInSellers'])->name('search.in.sellers');
           
            Route::get('orders',[AdminController::class ,'orders'])->name('all.orders');
            Route::post('search-in-orders',[AdminController::class ,'searchInOrders'])->name('search.in.orders');
        });

});