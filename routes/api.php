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
Route::group(['prefix' => 'users'], function () {
    Route::get('{id}/events', 'API\UserController@getUserEvents');
    Route::get('{id}/activities', 'API\UserController@getUserActivities');
});
// EVENTS
Route::group(['prefix' => 'events', 'middleware' => 'auth:api'], function () {
    Route::post('', 'EventController@createEvent');
});
Route::get('events/{id}', 'EventController@getEvent');
Route::get('events/', 'EventController@getEvents');
Route::get('events/{id}/options', 'EventController@getEventOptions');
Route::delete('events/{id}/options', 'EventController@deleteEventOptions');
Route::get('events/{id}/event_types', 'EventController@getEventTypes');
Route::get('events/{id}/event_helps', 'EventController@getEventHelps');
Route::put('events/{id}', 'EventController@updateEvent');
Route::delete('events/{id}', 'EventController@deleteEvent');
Route::put('events', 'EventController@updateEvents');
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
Route::group(['prefix' => 'activity'], function (){
    Route::get('all', 'ActivityController@getActivities');
    Route::get('study/fields', 'ActivityController@getStudyFields');
    Route::get('{id}/units', 'ActivityController@getActivityUnits');
});

Route::group(['prefix' => 'activity', 'middleware' => 'auth:api'], function () {
    Route::get('{id}', 'ActivityController@getActivity');
    Route::delete('{id}', 'ActivityController@deleteActivity');
    Route::put('{id}', 'ActivityController@updateActivity');
    Route::put('{id}/unit', 'ActivityController@addUnitToActivity');
    Route::put('{id}/units', 'ActivityController@updateUnitArrayInActivity');
    Route::put('{id}/order/units', 'ActivityController@changeUnitOrder');
    Route::post('', 'ActivityController@createActivity');
    Route::post('{id}/clone', 'ActivityController@cloneActivity');
    Route::put('{id}/student', 'ActivityController@addStudent');
});


// UNITS
Route::group(['prefix' => 'units', 'middleware' => 'auth:api'], function () {
    Route::post('', 'UnitController@createUnit');
    Route::put('{id}/events', 'UnitController@updateEventArrayInUnit');
});
Route::group(['prefix' => 'units'], function (){
    Route::get('{id}', 'UnitController@getUnit');
    Route::get('{id}/events', 'UnitController@getUnitEvents');
    Route::put('{id}', 'UnitController@updateUnit');

});


// EXAMS

Route::get('unit/{id}/exams', 'ExamController@getUnitExams');
Route::get('exam/{id}', 'ExamController@getExam');
Route::group(['prefix' => 'exam', 'middleware' => 'auth:api'], function () {
    Route::post('', 'ExamController@createExam');
    Route::put('{id}', 'ExamController@updateExam');
});







