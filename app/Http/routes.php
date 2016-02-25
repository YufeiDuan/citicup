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
//首页
Route::get('/test', 'WelcomeController@index');
Route::get('/','WelcomeController@test');
//认证
Route::controllers([
	'auth' => 'LoginController',
]);

Route::group(['prefix' => '/', 'middleware' => 'auth'], function()
{
	//用户主页
	Route::get('home', 'HomeController@home');
	//首轮评选
	Route::get('rate','HomeController@rate');
	//Logo
	Route::get('logo','FileGetController@index');
	//模板下载
	Route::get('template','FileGetController@template');
	//添加成员/老师
	Route::get('team/add', 'TeamController@add');
	//更新Logo
	Route::post('team/logo','TeamController@updatelogo');
	//收件箱
	Route::get('mail/outbox','MailController@outbox');
	//发信方删信
	Route::post('mail/del','MailController@dels');
	
	Route::resource('team', 'TeamController');
	Route::resource('member','MemberController');
	Route::resource('teacher','TeacherController');
	Route::resource('report','ReportController');
	Route::resource('document','DocController');
	Route::resource('mail','MailController');

});
