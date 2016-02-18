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



//Route::post('login','LoginController@authenticate');

Route::controllers([
	'auth' => 'LoginController',
]);

Route::group(['prefix' => '/', 'middleware' => 'auth'], function()
{
	Route::get('home', 'HomeController@home');
	Route::get('rate','HomeController@rate');
	Route::get('logo','FileGetController@index');
	Route::get('template','FileGetController@template');
	Route::get('team/add', 'TeamController@add');
	Route::get('mail/outbox','MailController@outbox');
	Route::post('mail/del','MailController@dels');
	Route::resource('team', 'TeamController');
	Route::resource('member','MemberController');
	Route::resource('teacher','TeacherController');
	Route::resource('report','ReportController');
	Route::resource('document','DocController');

	Route::resource('mail','MailController');

});
