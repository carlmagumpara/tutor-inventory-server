<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ ProductController, LoginController  };

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

Route::get('products', [ProductController::class, 'index']);
Route::post('products/store', [ProductController::class, 'store']);
Route::get('products/show/{id}', [ProductController::class, 'show']);
Route::post('products/update/{id}', [ProductController::class, 'update']);
Route::delete('products/delete/{id}', [ProductController::class, 'delete']);

// Units
Route::get('products/units', [ProductController::class, 'units']);

Route::post('login', [LoginController::class, 'login']);

// Route::get('/products','ProductController@index');
// Route::post('/products/store','ProductController@store');
// Route::patch('/products/update/{id}','ProductController@update');
// Route::get('/products/show/{id}','ProductController@show');
// Route::delete('/products/delete/{id}','ProductController@delete');