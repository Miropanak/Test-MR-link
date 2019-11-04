<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
| Test of routes syntax [preffered]:
| Route::get('urlPath','ControllerName@methodInThatController')->
| name('routeNameRefereneceForController')
|
| Alternative syntax:
| Route::post('urlPath', ['uses' => 'ControllerName@methodInThatController',
| 'as' => 'routeNameRefereneceForController']);
|
|---------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return redirect('/dilema');
});

Route::get('/dilema', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();


/**
 * Events-related routes
 **/

Route::get('events/{id}', 'EventController@getEvent');
Route::get('events/{id}/options', 'EventController@getEventOptions');
Route::put('events/{id}', 'EventController@updateEvent');
Route::put('events', 'EventController@updateEvents');
Route::post('events', 'EventController@createEvent');




 /*
Route::get('events/show', 'EventController@eventGetAllEvents')->name('events/show');
Route::get('events/detail/{id}', 'EventController@showEvent')->name('events/detail');
Route::get('events/new', 'EventController@addEvents')->name('events/new');
Route::post('events/new', 'EventController@eventCreateEvent')->name('event/create');
Route::get('events/new/{unit_id}', 'EventController@addEvents')->name('events/new/unit');
Route::post('events/new/{unit_id}', 'EventController@eventCreateEvent')->name('event/create/unit');
Route::get('events/edit/{event_id}', 'EventController@editEvents')->name('events/edit');
Route::post('events/edit/{event_id}', 'EventController@eventUpdateEvent')->name('events/update');
Route::get("events/delete/{id}", 'HelpController@delete')->name('events/delete');
*/

/**
 * Options-related routes
 **/
//Route::get('events/option/save/{option_id}', 'EventController@editOption')->name('events/option/edit');
Route::post('events/option/save/{option_id}', 'EventController@eventUpdateOption')->name('events/option/save');
Route::get('events/option/{option_id}', 'EventController@editOption')->name('events/option');
Route::post('events/option/{option_id}', 'EventController@eventUpdateEventOption')->name('events/option/update');
Route::post('events/option/{event_id}', 'EventController@eventUpdateOption')->name('events/option/update');
Route::delete("events/options/delete/{id}", 'EventController@deleteOption')->name('events/options/delete');

/**
 * Units-related routes
 **/
Route::get('units/new', 'UnitController@eventGetAll')->name('units.new');
Route::post('units/new', 'UnitController@createUnit')->name('units.create');
Route::get('units/new/{activity_id}', 'UnitController@eventGetAll')->name('units.new');
Route::get('units/edit/{id}', 'UnitController@editUnit')->name('units/edit');
Route::put('units/edit/{id}', 'UnitController@updateUnit')->name('units.update');
Route::delete('units/{id}/deleteEvent/{event_id}', 'UnitController@deleteUnitEvent')->name('unitsEvent.delete');
Route::delete("units/edit/{id}", 'UnitController@delete')->name('units.delete');

/**
 * Activity-related routes
 **/
Route::get('activities/new', 'ActivityController@newActivity')->name('activities/new');
Route::post('activities/new', 'ActivityController@create')->name('activity/create');
Route::get('activities/show', 'ActivityController@show')->name('activities/show');
Route::get('activities/detail/{id}', 'ActivityController@detail')->name('activities/detail');
Route::post('activities/subscribe/{id}','ActivityController@subscribe')->name('activities.subscribe');
Route::post('activities/invite/{id}', 'ActivityController@invite')->name('activities.invite');
Route::post('activities/expel/{id}', 'ActivityController@expel')->name('activities.expel');
Route::get("activities/edit/{id}", 'ActivityController@edit');
Route::put("activities/edit/{id}", 'ActivityController@update')->name('activities.update');
Route::delete("activities/edit/{id}", 'ActivityController@delete')->name('activities.delete');
Route::post('activities/validate/{id}', 'ActivityController@validateActivity')->name('activities.validate');

/**
 * Dashboard-related routes
 **/
Route::get('dashboard', 'DashboardController@newDashboard')->name('dashboard');

/**
 * Test-related routes
 **/
Route::get('tests/new', 'TestController@new')->name('tests/new');
Route::get('tests/show', 'TestController@show')->name('tests/show');
Route::post('tests/search',"TestController@testSearch")->name('tests/search');
Route::get('test/run/{id}',"TestController@run")->name('test/run');
Route::get('test/getTest/{id}',"TestController@getTest")->name('test/getTest');

/**
 * Help-related routes
 **/
Route::delete("helps/delete/{id}", 'HelpController@delete')->name('help/delete');
Route::get("events/{event_id}/createHelp", 'HelpController@createHelp')->name('events/createHelp');
Route::post('events/detail/{id}', 'HelpController@storeHelp')->name('events/storeHelp');

/**
 * Exam-related routes
 **/
Route::get('exam',"UserTestController@index")->name('exam/index');
Route::get('exam/create', 'UserTestController@create')->name('exam/create');
Route::get('exam/getEvents/{id?}','UserTestController@getEvents')->name('exam/getEvents');
Route::post('exam/store',"UserTestController@store")->name('exam/store');
Route::get('exam/edit/{id}',"UserTestController@edit")->name('exam/edit');
Route::post('exam/update',"UserTestController@update")->name('exam/update');

Route::get('exam/run/{id}',"ExamController@run")->name('exams/run');
Route::get('exam/show', 'ExamController@show')->name('exam/show');
Route::get('exams/show', 'ExamController@show')->name('exams/show');
Route::post('exams/search',"ExamController@examSearch")->name('exams/search');
Route::get('exam/getTest/{id}',"ExamController@getExam")->name('exam/getExam');
Route::get('exam/getEventList/{id}',"ExamController@getEventList")->name('exam/getEventList');
Route::post('exams/submit',"ExamController@submit")->name('exams/submit');
Route::get('exams/statistics/{id}', 'ExamController@statistics')->name('exams/statistics');
