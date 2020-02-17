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
    return view('welcome');
});

Route::get('/debug-sentry-develop', function () {
    throw new Exception('My Sentry error develop!');
});
