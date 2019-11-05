<?php

use Illuminate\Http\Request;

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

Route::post('/login', 'API\UserController@login');
Route::post('/register', 'API\UserController@register');

Route::group(['prefix' => 'password'], function () {
    Route::post('change', 'API\UserController@password_change');
    Route::post('create', 'API\PasswordResetController@create');
    Route::get('find/{token}', 'API\PasswordResetController@find');
    Route::post('reset', 'API\PasswordResetController@reset');
});

Route::get('events/{id}', 'EventController@getEvent');
Route::get('events/{id}/options', 'EventController@getEventOptions');
Route::put('events/{id}', 'EventController@updateEvent');
Route::put('events', 'EventController@updateEvents');
Route::post('events', 'EventController@createEvent');
Route::get('activities/detail/{id}', 'ActivityController@detail');





