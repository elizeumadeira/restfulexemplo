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
    // Route::post('login', 'UsersController@authenticate');
    // Route::get('open', 'DataController@open');
    
    Route::group(['middleware' => ['jwt.verify']], function () {
        // Route::get('user', 'UsersController@getAuthenticatedUser');
        // Route::get('closed', 'DataController@closed');
        Route::post('closed', 'AuthController@closed');
        Route::post('me', 'AuthController@me');
    });
    Route::resource('users', 'UsersController');

    // Route::post('register', 'UsersController@register');

    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');

});



 
Route::get('/', function () {
    return redirect('v1.0');
});
