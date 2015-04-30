<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('/form', 'FormController@index');
Route::post('/form', 'FormController@store');

Route::get('/rank', 'RankController@index');

Route::get('/home', 'HomeController@index');

Route::get('/feedback', 'FeedbackController@index');
Route::get('/feedback/{id}', 'FeedbackController@showApplicants');
Route::post('/feedback', 'FeedbackController@store');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
