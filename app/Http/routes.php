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

Route::get('applicant/home', 'ApplicantController@home');
Route::get('applicant/form', 'ApplicantController@form');
Route::post('applicant/form', 'ApplicantController@formStore');
Route::get('applicant/accepted', 'ApplicantController@accepted');
Route::post('applicant/accepted', 'ApplicantController@updateAccepted');

Route::get('admin/home', 'AdminController@home');
Route::get('admin/rank', 'AdminController@rank');
Route::get('admin/rank/{id}', 'AdminController@rankShow');
Route::get('admin/submit/{id}', 'AdminController@submit');
Route::post('admin/save', 'AdminController@save');
Route::get('admin/settings', 'AdminController@settings');
Route::post('admin/settings', 'AdminController@phaseStore');
Route::get('admin/offer', 'AdminController@sendOffers');
Route::post('admin/offer', 'AdminController@sendEmail');

Route::get('instructor/home', 'InstructorController@home');
Route::get('instructor/feedback', 'InstructorController@index');
Route::post('instructor/feedback', 'InstructorController@redirectCourse');
Route::get('instructor/feedback/{id}', 'InstructorController@showApplicants');
Route::post('instructor/feedback/{id}', 'InstructorController@feedbackStore');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Route::get('/', 'WelcomeController@index');

// Route::get('/form', 'FormController@index');
// Route::post('/form', 'FormController@store');

// Route::get('/rank', 'RankController@index');
// Route::get('/rank/{id}', 'RankController@show');

//Route::get('/home', 'HomeController@index');

// Route::get('/feedback', 'FeedbackController@pickCourse');
// Route::post('/feedback', 'FeedbackController@redirectCourse');
// Route::get('/feedback/{id}', 'FeedbackController@showApplicants');
// Route::post('/feedback/{id}', 'FeedbackController@store');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);
