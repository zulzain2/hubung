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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// FCM API
Route::post('/fcm/setToken',   'App\Http\Controllers\ApiController@setFcmToken');
Route::post('/fcm/unsetToken',   'App\Http\Controllers\ApiController@unsetFcmToken');
Route::post('/updateNotificationStatus',   'App\Http\Controllers\ApiController@updateNotificationStatus');
