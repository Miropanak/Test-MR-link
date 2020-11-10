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

Route::post('/login', 'Api\UserController@login');
Route::post('/register', 'Api\UserController@register');
Route::post('/email/check', 'Api\UserController@email_check');


Route::group(['prefix' => 'password'], function () {
    Route::post('create', 'Api\PasswordResetController@create');
    Route::get('find/{token}', 'Api\PasswordResetController@find');
    Route::post('reset', 'Api\PasswordResetController@reset');
});

Route::group(['prefix' => 'password', 'middleware' => 'auth:api'], function () {
    Route::post('change', 'Api\UserController@password_change');
});

// USERS
Route::group(['prefix' => 'users'], function () {
    Route::get('{id}/events', 'Api\UserController@getUserEvents');
    Route::get('{id}/activities', 'Api\UserController@getUserActivities');
    Route::get('', 'Api\UserController@getUsers');
    Route::get('{id}/subscribed/activities', 'Api\UserController@subscribedActivity');

});
// EVENTS
Route::group(['prefix' => 'events', 'middleware' => 'auth:api'], function () {
    Route::post('', 'Api\EventController@createEvent');
});

Route::group(['prefix' => 'events'], function (){
    Route::get('{id}', 'Api\EventController@getEvent');
    Route::get('', 'Api\EventController@getEvents');
    Route::get('{id}/options', 'Api\EventController@getEventOptions');
    Route::delete('{id}/options', 'Api\EventController@deleteEventOptions');
    Route::get('{id}/event_types', 'Api\EventController@getEventTypes');
    Route::get('{id}/event_helps', 'Api\EventController@getEventHelps');
    Route::put('{id}', 'Api\EventController@updateEvent');
    Route::delete('{id}', 'Api\EventController@deleteEvent');
    Route::put('', 'Api\EventController@updateEvents');
    Route::post('filter', 'Api\EventController@filterEvents');
});

// OPTIONS
Route::group(['prefix' => 'options'], function (){
    Route::put('', 'Api\EventController@updateOptions');
    Route::put('{id}', 'Api\EventController@updateOption');
    Route::delete('{id}', 'Api\EventController@deleteOption');
    Route::post('', 'Api\EventController@createOption');
});
// HELPS
Route::group(['prefix' => 'helps'], function (){
    Route::get('{id}', 'Api\HelpController@getHelp');
    Route::post('', 'Api\HelpController@createHelp');
    Route::put('{id}', 'Api\HelpController@updateHelp');
    Route::delete('{id}', 'Api\HelpController@deleteHelp');
});

// ACTIVITIES
Route::group(['prefix' => 'activity'], function (){
    Route::get('all', 'Api\ActivityController@getActivities');
    Route::get('study/fields', 'Api\ActivityController@getStudyFields');
    Route::get('{id}/units', 'Api\ActivityController@getActivityUnits');
    Route::get('{id}/subscribers', 'Api\ActivityController@getSubscribers');
});

Route::group(['prefix' => 'activity', 'middleware' => 'auth:api'], function () {
    Route::get('{id}', 'Api\ActivityController@getActivity');
    Route::delete('{id}', 'Api\ActivityController@deleteActivity');
    Route::put('{id}', 'Api\ActivityController@updateActivity');
    Route::put('{id}/unit', 'Api\ActivityController@addUnitToActivity');
    Route::put('{id}/units', 'Api\ActivityController@updateUnitArrayInActivity');
    Route::put('{id}/order/units', 'Api\ActivityController@changeUnitOrder');
    Route::post('', 'Api\ActivityController@createActivity');
    Route::post('{id}/clone', 'Api\ActivityController@cloneActivity');
    Route::put('{id}/student', 'Api\ActivityController@addStudent');
});


// UNITS
Route::group(['prefix' => 'units', 'middleware' => 'auth:api'], function () {
    Route::post('', 'Api\UnitController@createUnit');
    Route::put('{id}/events', 'Api\UnitController@updateEventArrayInUnit');
});
Route::group(['prefix' => 'units'], function (){
    Route::get('{id}', 'Api\UnitController@getUnit');
    Route::get('{id}/events', 'Api\UnitController@getUnitEvents');
    Route::put('{id}', 'Api\UnitController@updateUnit');
});


// EXAMS

Route::get('unit/{unit_id}/activity/{activity_id}/exams', 'Api\ExamController@getUnitActivityExams');
Route::get('exam/{id}', 'Api\ExamController@getExam');
Route::group(['prefix' => 'exam', 'middleware' => 'auth:api'], function () {
    Route::post('', 'Api\ExamController@createExam');
    Route::put('{id}', 'Api\ExamController@updateExam');
    Route::post('{id}/createEventTestAnswers', 'Api\ExamController@createEventTestAnswers');
});
Route::get('exam/{exam_id}/user/{user_id}', 'Api\ExamController@getExamAnswers');

// CATEGORIES
Route::group(['prefix' => 'categories'], function(){
    Route::get('{type}', 'Api\CategoriesController@getCategoriesType');
});

Route::group(['prefix' => 'categories', 'middleware' => 'auth:api'], function (){
    Route::post('', 'Api\CategoriesController@createCategory');
});