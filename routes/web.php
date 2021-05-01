<?php

use Illuminate\Support\Facades\Auth;
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

require __DIR__.'/auth.php';

Route::get('/fetch/csrf', function () {
    $token = csrf_token();
    return json_encode($token);
});

Route::get('/fetch/checkAuth', function () {
    
    if (Auth::check()) {
        return json_encode('true');
    }
    else
    {
        return json_encode('false');
    }
    
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/', function () {
    return redirect('/home');
})->middleware(['auth']);

Route::get('/home', 'App\Http\Controllers\HomeController@index');

Route::resource('chat', 'App\Http\Controllers\ChatController');

Route::get('/fetch/meetingLog', 'App\Http\Controllers\MeetController@meetingLog');
Route::post('/fetch/storeMeetingLog', 'App\Http\Controllers\MeetController@storeMeetingLog');
Route::resource('meet', 'App\Http\Controllers\MeetController');



