<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Seller\Auth\AuthController;
use App\Http\Controllers\Seller\Product\ProductController;

/*
|--------------------------------------------------------------------------
| Seller Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* ********* Seller Routes ********* */
Route::prefix('seller')->group(function(){

    /* =============== Auth =============== */
    Route::middleware('guest:seller')->group(function(){
        Route::get('register' ,[AuthController::class ,'showRegister'])->name('show_register');
        Route::post('register' ,[AuthController::class ,'register'])->name('seller_register');    
        
        Route::get('login' ,[AuthController::class ,'showLogin'])->name('show_login');
        Route::post('login' ,[AuthController::class ,'login'])->name('seller_login');
    
    });
    /* ============= Logout =========== */
    Route::post('logout' ,[AuthController::class ,'logout'])->name('seller_logout');
    
    /* =============== end Auth =============== */

    Route::middleware('auth:seller')->group(function(){
        Route::get('dashboard' ,[AuthController::class ,'dashboard'])->name('seller_dashboard');

    /* =============== product routes =============== */
        Route::resource('product', ProductController::class);
    });
    
});



