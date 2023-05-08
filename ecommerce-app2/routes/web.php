<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Seller\Auth\AuthController;
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
Route::get('/' ,[HomeController::class ,'index']);

Route::get('show/{product}' ,[HomeController::class ,'showProduct'])->name('show_product');
Route::post('search' ,[HomeController::class ,'handleSearch'])->name('handle_search');

