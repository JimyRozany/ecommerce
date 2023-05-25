<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HandelSellerController;




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

            Route::get('products',[AdminController::class ,'products'])->name('all.products');
            Route::post('search-in-products',[AdminController::class ,'searchInProducts'])->name('search.in.products');
            // delete specific product (softDelete)
            Route::get('remove-product/{product}',[AdminController::class ,'deleteProduct'])->name('remove.product');
            // get all products in trash
            Route::get('trash-products',[AdminController::class ,'productsTrash'])->name('trash.products');
            // restore product from trash
            Route::get('restore-product/{id}',[AdminController::class ,'restoreProduct'])->name('restore.product');

            /* ************ control seller **************** */

            Route::get('ban-seller/{seller}',[HandelSellerController::class ,'ban'])->name('ban.seller');
            Route::get('seller-trash',[HandelSellerController::class ,'sellerBanned'])->name('seller.trash');
            Route::get('seller-unban/{seller_id}',[HandelSellerController::class ,'unban'])->name('seller.unban');
        });

});
