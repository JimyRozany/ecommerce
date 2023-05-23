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
        });

});