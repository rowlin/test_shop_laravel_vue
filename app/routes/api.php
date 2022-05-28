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

Route::get('products' , 'App\Http\Controllers\ProductController@get_list');
Route::post('cache/{cache}' , 'App\Http\Controllers\CacheController@put' );
Route::delete('cache/{cache}/{id}', 'App\Http\Controllers\CacheController@delete' );
Route::get('cache/{cache}' , 'App\Http\Controllers\CacheController@get');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
