<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\RegisterController;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\ProductController;
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

Route::group(['namespace' => 'api'], function() {
    Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function() {
        Route::get('', [UserController::class, 'show']);
        Route::group(['prefix' => 'cart'], function() {
            Route::get('', [UserController::class, 'cart']);
            Route::post('{productId}', [UserController::class, 'updateCart']);
        });
    });

    Route::group(['prefix' => 'auth'], function() {
        Route::post('register', [RegisterController::class, 'register']);
        Route::post('login', [LoginController::class, 'login']);
    });

   Route::group(['prefix' => 'product'], function() {
       Route::get('', [ProductController::class, 'index']);
       Route::get('{productId}', [ProductController::class, 'show'])->middleware('isProductExists');
       Route::group(['middleware' => 'auth:api'], function() {
           Route::post('store', [ProductController::class, 'store']);
           Route::group(['prefix' => '{productId}', 'middleware' => 'isProductExists'], function() {
               Route::post('update', [ProductController::class, 'update']);
               Route::delete('', [ProductController::class, 'destroy']);
           });
       });
   }); 
});

