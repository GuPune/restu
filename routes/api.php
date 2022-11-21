<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::resource('order', OrderController::class);


Route::group(['middleware' => ['api']], function ($router) {

    Route::get('/test', 'App\Http\Controllers\OrderController@test');

    Route::get('/product', 'App\Http\Controllers\API\ProductController@index');
    Route::get('/typeres', 'App\Http\Controllers\API\ProductController@typeres');
    Route::post('/typeresfitter', 'App\Http\Controllers\API\ProductController@fitter');
    Route::post('/transaction_temp', 'App\Http\Controllers\API\ProductController@orderssave');
    Route::post('/transaction_orders', 'App\Http\Controllers\API\ProductController@transaction_orders');
    });
