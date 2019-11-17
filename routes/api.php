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
Route::post('/email/check', 'API\UserController@email_check');


Route::group(['prefix' => 'password'], function () {
    Route::post('create', 'API\PasswordResetController@create');
    Route::get('find/{token}', 'API\PasswordResetController@find');
    Route::post('reset', 'API\PasswordResetController@reset');
});

Route::group(['prefix' => 'password', 'middleware' => 'auth:api'], function () {
    Route::post('change', 'API\UserController@password_change');
});

// USERS
Route::get('/users/{id}/events', 'API\UserController@getUserEvents');

// EVENTS
Route::get('events/{id}', 'EventController@getEvent');
Route::get('events/{id}/options', 'EventController@getEventOptions');
Route::delete('events/{id}/options', 'EventController@deleteEventOptions');
Route::get('/events/{id}/event_types', 'EventController@getEventTypes');
Route::get('/events/{id}/event_helps', 'EventController@getEventHelps');
Route::put('events/{id}', 'EventController@updateEvent');
Route::delete('events/{id}', 'EventController@deleteEvent');
Route::put('events', 'EventController@updateEvents');
Route::post('events', 'EventController@createEvent');
// OPTIONS
Route::put('options', 'EventController@updateOptions');
Route::put('options/{id}', 'EventController@updateOption');
Route::delete('options/{id}', 'EventController@deleteOption');
Route::post('options', 'EventController@createOption');
// HELPS
Route::get('helps/{id}', 'HelpController@getHelp');
Route::post('helps', 'HelpController@createHelp');
Route::put('helps/{id}', 'HelpController@updateHelp');
Route::delete('helps/{id}', 'HelpController@deleteHelp');

// ACTIVITIES
Route::group(['prefix' => 'activities', 'middleware' => 'auth:api'], function () {
    Route::get('{id}', 'ActivityController@getActivity');
    Route::post('', 'ActivityController@createActivity');
});
Route::group(['prefix' => 'activities'], function (){
    Route::get('', 'ActivityController@getActivities');
});

