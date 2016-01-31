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

Route::get('home', 'HomeController@index');

//Route::post('login','LoginController@authenticate');

Route::controllers([
	'auth' => 'LoginController',
]);

Route::group(['prefix' => '/', 'middleware' => 'auth'], function()
{
	Route::get('logo','LogoController@index');
	Route::resource('team', 'TeamController');
	Route::resource('member','MemberController');
	/*
	Route::controllers([
	'team' => 'TeamController',
	'logo' => 'LogoController',
	//'password' => 'Auth\PasswordController',
	]);
	*/
});


/*Route::controllers([
	'auth' => 'LoginController',
	'team' => 'TeamController',
	'logo' => 'LogoController',
	//'password' => 'Auth\PasswordController',
]);*/
