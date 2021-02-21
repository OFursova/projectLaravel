<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/', 'MainController@index'); - laravel older than version 8
Route::get('/', [MainController::class, 'index']);
Route::get('/contacts', [MainController::class, 'contacts'])->middleware('auth');
Route::post('/contacts', [MainController::class, 'getContacts']);
Route::get('/sale', [StoreController::class, 'sale']);
Route::post('/sale', [StoreController::class, 'buyProduct']);
Route::get('/review', [ReviewController::class, 'review']);
Route::post('/review', [ReviewController::class, 'sendReview']);

Route::get('/category/{slug}', [StoreController::class, 'category']);
Route::get('/product/{product:slug}', [StoreController::class, 'product']);

Route::post('/cart/add', [CartController::class, 'add']);
Route::post('/cart/clear', [CartController::class, 'clear']);
Route::post('/cart/remove/{id}', [CartController::class, 'remove']);
Route::post('/cart/change-qty', [CartController::class, 'changeItem']);

Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/checkout', [CheckoutController::class, 'checkoutSave']);

Auth::routes();

Route::middleware(['auth', 'role:administrator'])->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/slider', SliderController::class);
    Route::get('/orders', [OrdersController::class, 'index']);
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
