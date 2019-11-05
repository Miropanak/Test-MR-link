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
Route::post('/password/reset', 'API\UserController@password_reset');

Route::get('events/{id}', 'EventController@getEvent');
Route::get('events/{id}/options', 'EventController@getEventOptions');
Route::delete('events/{id}/options', 'EventController@deleteEventOptions');
Route::put('events/{id}', 'EventController@updateEvent');
Route::delete('events/{id}', 'EventController@deleteEvent');
Route::put('events', 'EventController@updateEvents');
Route::post('events', 'EventController@createEvent');
Route::get('activities/detail/{id}', 'ActivityController@detail')->name('activities/detail');
Route::put('options', 'EventController@updateOptions');
Route::put('options/{id}', 'EventController@updateOption');
Route::delete('options/{id}', 'EventController@deleteOption');
Route::post('options', 'EventController@createOption');






