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
Route::namespace('Api')->group(function() {
    Route::group(['middleware' => ['accessToken']], function() 
    {
        Route::apiResource('stores','StoreController');
        Route::apiResource('products','ProductController');
    });
});
Route::get('fakeAPI',function(Request $request){
    return response()->json(["data"=>"Fake API"])->header('responseType','json');
});

// Route::post('signup', 'AuthController@register'); Route::post('login', 'AuthController@login');

// Route::group(['middleware' => 'jwt.auth'], function () { Route::get('auth', 'AuthController@user'); Route::post('logout', 'AuthController@logout'); });

// Route::middleware('jwt.refresh')->get('/token/refresh', 'AuthController@refresh');





// Route::post('login','API\AuthController@login');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
