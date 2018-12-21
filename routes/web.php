<?php

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


Route::group(['prefix' => 'v1.0'], function(){
    Route::get('/', function(){
        return response()->json(['message' => 'API Laravel', 'status' => 'Connected!!']);
    });
    
    Route::group(['middleware' => ['jwt.verify']], function () {
        Route::post('refresh', 'AuthController@refresh');
        Route::get('me', 'AuthController@me');
        Route::get('open', 'AuthController@open');
    });
    Route::resource('users', 'UsersController');

    Route::post('login', 'AuthController@login')->name('login');
    Route::get('logout', 'AuthController@logout');
});

Route::get('/', function () {
    return redirect('v1.0');
});
