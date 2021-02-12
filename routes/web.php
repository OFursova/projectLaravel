<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
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
Route::get('/product/{slug}', [StoreController::class, 'product']);
Auth::routes();

Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
