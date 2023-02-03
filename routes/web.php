<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\RequestRegisterController;

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

Route::get('/admin', function () {
    return view('dashboard');
});
Route::get('/add_product_view' , function(){
	return view('add_product');
});
Route::get('/' , function(){
	return view('home');
});
Route::get('/register' , function(){
	return view('register');
});
Route::get('/email_login' , function(){
	return view('login_email');
});
Route::get('/phone_login' , function(){
	return view('login_phone');
});
Route::get('/waiting' , function(){
	return view('waiting');
});
Route::get('/change_password_view' , function(){
	return view('change_password');
});


Route::get('/users_requests' , [RequestRegisterController::class, 'index']);
Route::get('/add_user/{id}' , [UserController::class, 'store']);
Route::post('/login/{type}' , [UserController::class, 'login']);
Route::get('/user_app/{id}' , [UserController::class, 'show']);
Route::post('/change_password' , [UserController::class, 'change_password']);
Route::get('/users' , [UserController::class, 'index']);
Route::post('/register_request' , [RequestRegisterController::class, 'store']);
Route::get('/remove_request/{id}' , [RequestRegisterController::class, 'destroy']);
Route::post('/add_product' , [ProductController::class, 'store']);
Route::get('/products' , [ProductController::class, 'index']);
Route::get('/edit_product/{id}' , [ProductController::class, 'edit']);
Route::get('/remove_product/{id}' , [ProductController::class, 'destroy']);
Route::get('/edit_user/{id}' , [UserController::class, 'edit']);
Route::post('/update_user/{id}' , [UserController::class, 'update']);
Route::get('/remove_user/{id}' , [UserController::class, 'destroy']);
Route::get('/users_products' , [UserProductController::class, 'index']);
Route::get('/edit_user_products/{id}' , [UserProductController::class, 'getUserProducts']);
Route::post('/assign_products/{id}' , [UserProductController::class, 'store']);

