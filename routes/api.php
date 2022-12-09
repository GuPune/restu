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
    Route::get('/toe', 'App\Http\Controllers\API\ProductController@gettoe');
    Route::post('/typeresfitter', 'App\Http\Controllers\API\ProductController@fitter');
    Route::post('/transaction_temp', 'App\Http\Controllers\API\ProductController@orderssave');
    Route::post('/transaction_orders', 'App\Http\Controllers\API\ProductController@transaction_orders');
    Route::post('/transaction_tempupdate', 'App\Http\Controllers\API\ProductController@transaction_ordersupdate');
    Route::post('/transaction_tempdelete', 'App\Http\Controllers\API\ProductController@transaction_ordersdelete');


    Route::post('/fronttypelist', 'App\Http\Controllers\API\ProductController@fronttyperes');
    Route::post('/frontres', 'App\Http\Controllers\API\ProductController@frontres');
    Route::post('/restoe', 'App\Http\Controllers\API\ProductController@restoe');
    Route::post('/checkout', 'App\Http\Controllers\API\ProductController@checkout');
    Route::post('/ordernumber', 'App\Http\Controllers\API\ProductController@ordernumber');
    Route::post('/order', 'App\Http\Controllers\API\ProductController@order');
    Route::post('/call', 'App\Http\Controllers\API\ProductController@call');

    Route::post('/ordercheckbill', 'App\Http\Controllers\API\ProductController@ordercheckbill');
    Route::post('/checkbill', 'App\Http\Controllers\API\ProductController@checkbill');


    Route::post('/orders_cus', 'App\Http\Controllers\API\ProductController@orderscus');
    Route::post('/updateorder_pen', 'App\Http\Controllers\API\ProductController@updateorder_pen');
    Route::post('/updateorder_wait', 'App\Http\Controllers\API\ProductController@updateorder_wait');
    Route::post('/updateorder_doing', 'App\Http\Controllers\API\ProductController@updateorder_doing');

    Route::post('/opentoe', 'App\Http\Controllers\API\ProductController@opentoe');
    Route::post('/canceltoe', 'App\Http\Controllers\API\ProductController@canceltoe');

    Route::post('/checktoken', 'App\Http\Controllers\API\ProductController@checktoken');

    });


