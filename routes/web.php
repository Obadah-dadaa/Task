<?php

use App\Http\Controllers\HomeController ;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
/////////authintication routes///////////
Auth::routes();

///////////////////////////////////////////


////////////////user routes////////////////
Route::group(['middleware' => ['auth'], 'prefix' => 'user'], function () {
Route::get('/homee', [UserController::class, 'indexuser'])->name('homee');
Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
Route::get('/edit_profile/{id}', [UserController::class, 'edit'])->name('edit_profile');
Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
Route::delete('/user/{id}', 'UserController@destroy')
    ->name('users.destroy');
});
///////////////////////////////////////////

////////////////proudcts routes////////////
Route::group(['middleware' => ['role:Admin'], 'prefix' => 'product'], function () {
Route::get('/index', [ProductController::class, 'index'])->name('products.index');
Route::get('/create', [ProductController::class, 'create'])->name('create');
Route::put('/store', [ProductController::class, 'store'])->name('store');
Route::get('/show/{id}', [ProductController::class, 'show'])->name('show_prod');
Route::get('/edit_proudcts/{id}', [ProductController::class, 'edit'])->name('edit_prod');
Route::put('/update_prod/{id}', [ProductController::class, 'update'])->name('update_prod');
Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('destroy_prod');
});
///////////////////////////////////////////

////////////////admin routes////////////
Route::group(['middleware'=>['role:Admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [HomeController::class, 'indexadmin']);
    Route::get('/users', [HomeController::class, 'users'])->name('users');



});
///////////////////////////////////////////