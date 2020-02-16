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
    Route::get('', 'API\UserController@getUsers');
    Route::get('{id}/subscribed/activities', 'API\UserController@subscribedActivity');

});
// EVENTS
Route::group(['prefix' => 'events', 'middleware' => 'auth:api'], function () {
    Route::post('', 'API\EventController@createEvent');
});
Route::get('events/{id}', 'API\EventController@getEvent');
Route::get('events/', 'API\EventController@getEvents');
Route::get('events/{id}/options', 'API\EventController@getEventOptions');
Route::delete('events/{id}/options', 'API\EventController@deleteEventOptions');
Route::get('events/{id}/event_types', 'API\EventController@getEventTypes');
Route::get('events/{id}/event_helps', 'API\EventController@getEventHelps');
Route::put('events/{id}', 'API\EventController@updateEvent');
Route::delete('events/{id}', 'API\EventController@deleteEvent');
Route::put('events', 'API\EventController@updateEvents');
// OPTIONS
Route::put('options', 'API\EventController@updateOptions');
Route::put('options/{id}', 'API\EventController@updateOption');
Route::delete('options/{id}', 'API\EventController@deleteOption');
Route::post('options', 'API\EventController@createOption');
// HELPS
Route::get('helps/{id}', 'API\HelpController@getHelp');
Route::post('helps', 'API\HelpController@createHelp');
Route::put('helps/{id}', 'API\HelpController@updateHelp');
Route::delete('helps/{id}', 'API\HelpController@deleteHelp');

// ACTIVITIES
Route::group(['prefix' => 'activity'], function (){
    Route::get('all', 'API\ActivityController@getActivities');
    Route::get('study/fields', 'API\ActivityController@getStudyFields');
    Route::get('{id}/units', 'API\ActivityController@getActivityUnits');
    Route::get('{id}/subscribers', 'API\ActivityController@getSubscribers');
});

Route::group(['prefix' => 'activity', 'middleware' => 'auth:api'], function () {
    Route::get('{id}', 'API\ActivityController@getActivity');
    Route::delete('{id}', 'API\ActivityController@deleteActivity');
    Route::put('{id}', 'API\ActivityController@updateActivity');
    Route::put('{id}/unit', 'API\ActivityController@addUnitToActivity');
    Route::put('{id}/units', 'API\ActivityController@updateUnitArrayInActivity');
    Route::put('{id}/order/units', 'API\ActivityController@changeUnitOrder');
    Route::post('', 'API\ActivityController@createActivity');
    Route::post('{id}/clone', 'API\ActivityController@cloneActivity');
    Route::put('{id}/student', 'API\ActivityController@addStudent');
});


// UNITS
Route::group(['prefix' => 'units', 'middleware' => 'auth:api'], function () {
    Route::post('', 'API\UnitController@createUnit');
    Route::put('{id}/events', 'API\UnitController@updateEventArrayInUnit');
});
Route::group(['prefix' => 'units'], function (){
    Route::get('{id}', 'API\UnitController@getUnit');
    Route::get('{id}/events', 'API\UnitController@getUnitEvents');
    Route::put('{id}', 'API\UnitController@updateUnit');

});


// EXAMS

Route::get('unit/{id}/exams', 'API\ExamController@getUnitExams');
Route::get('exam/{id}', 'API\ExamController@getExam');
Route::group(['prefix' => 'exam', 'middleware' => 'auth:api'], function () {
    Route::post('', 'API\ExamController@createExam');
    Route::put('{id}', 'API\ExamController@updateExam');
});







