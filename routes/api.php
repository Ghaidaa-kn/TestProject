<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\RequestRegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register_request' , [RequestRegisterController::class, 'api_store']);
Route::get('/add_user/{id}' , [UserController::class, 'api_store']);
Route::post('/login/{type}' , [UserController::class, 'api_login']);
Route::get('/edit_user/{id}' , [UserController::class, 'api_edit']);
Route::post('/update_user/{id}' , [UserController::class, 'api_update']);
Route::post('/change_password/{id}' , [UserController::class, 'api_change_password']);
Route::post('/add_product' , [ProductController::class, 'api_store']);
Route::get('/remove_product/{id}' , [ProductController::class, 'api_destroy']);
Route::get('/edit_product/{id}' , [ProductController::class, 'api_edit']);
Route::get('/products' , [ProductController::class, 'api_index']);
Route::get('/edit_user_products/{id}' , [UserProductController::class, 'api_getUserProducts']);
Route::post('/assign_products/{id}' , [UserProductController::class, 'api_store']);
Route::get('/remove_user/{id}' , [UserController::class, 'api_destroy']);