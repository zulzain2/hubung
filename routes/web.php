<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return redirect('/home');
    });

    Route::get('/home', 'App\Http\Controllers\HomeController@index');

    Route::resource('chat', 'App\Http\Controllers\ChatController');

    Route::post('/fetch/meetinglog', 'App\Http\Controllers\MeetController@storeMeetingLog');
    Route::resource('meet', 'App\Http\Controllers\MeetController');

});

