<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CartController;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
/* ========= user auth ============  */
Auth::routes();
/* ========= end user auth ============  */

/* ========= Public Routes ============  */
Route::get('/' ,[HomeController::class ,'index']); // home page 
Route::get('show/{product}' ,[HomeController::class ,'showProduct'])->name('show_product'); // show one products (more details)
Route::post('search' ,[HomeController::class ,'handleSearch'])->name('handle_search'); // search about products 
/* ========= end Public Routes ============  */

Route::middleware('auth:user')->group(function(){
    /* ========= Routes Cart ============  */
    Route::get('cart' ,[CartController::class ,'index'])->name('cart');
    Route::get('add-to-cart/{product}' ,[CartController::class ,'addToCart'])->name('add.to.cart');
    Route::post('change-quantity' ,[CartController::class ,'changeQuantity'])->name('change.quantity');
    Route::get('remove-item/{cart_id}' ,[CartController::class ,'removeItem'])->name('remove.item.cart');
  

    /* ========= end Routes Cart ============  */
});

/* ========= Routes buying ============  */

/* ========= end Routes buying ============  */
