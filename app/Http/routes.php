<?php


//注册
Route::get('/register','RegisterController@register');
//url验证
Route::get('/validate/{token}','RegisterController@validateemail');
//重置密码验证
Route::get('/password/{token}','PasswordController@reset');

//https group
Route::group(['middleware' => 'ployssl'], function()
{
	//main page
	Route::get('/test', 'WelcomeController@index');
	Route::get('/','WelcomeController@test');
	//auth
	Route::controllers([
		'auth' => 'LoginController',
	]);
});

Route::controllers([
	'auth' => 'LoginController',
	'reg' => 'RegisterController',
	'pwd' => 'PasswordController',
]);

Route::group(['prefix' => '/', 'middleware' => 'auth'], function(){
	//Logo
	Route::get('logo/{r}','FileGetController@logo');
});

Route::group(['prefix' => '/', 'middleware' => ['auth','home','ploynor']], function()
{
	//用户主页
	Route::get('home', 'HomeController@home');
	//首轮评选
	Route::get('rate','HomeController@rate');
	//模板下载
	Route::get('template','FileGetController@template');
	//承诺书下载
	Route::get('commitment','FileGetController@commitment');
	//添加成员/老师
	Route::get('team/add', 'TeamController@add');
	//更新Logo
	Route::post('team/logo','TeamController@updatelogo');
	//发件箱
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

//https admin group
Route::group(['middleware' => 'ployssl'], function()
{
	Route::get('/xgx','WelcomeController@admin');

	Route::group(['namespace' => 'Admin'], function()
	{
	    Route::controllers([
			'adminauth' => 'AuthController',
		]);
	});
});


Route::group(['prefix' => 'admin','middleware' => ['admin','ployssl'],'namespace' => 'Admin'], function()
{
    //admin home page
	Route::get('home', 'HomeController@home');
	//get logo
	Route::get('logo/{id}/{r}','TeamController@logo');
	//update logo
	Route::post('team/logo','TeamController@updatelogo');
	//addmember
	Route::get('team/add','TeamController@add');
	//download report all
	Route::get('report/all','ReportController@dlall');
	//download document all
	Route::get('document/all','DocController@dlall');
	//outbox
	Route::get('mail/outbox','MailController@outbox');
	//delete mails by sender
	Route::post('mail/del','MailController@dels');
	//write new mail
	Route::get('mail/new','MailController@newmail');
	//reply mail
	Route::get('mail/reply','MailController@reply');
	Route::resource('team','TeamController');
	Route::resource('member','MemberController');
	Route::resource('teacher','TeacherController');
	Route::resource('report','ReportController');
	Route::resource('document','DocController');
	Route::resource('mail','MailController');
	//export as excel
	Route::get('export/teams','ExcelController@exportTeams');
	Route::get('export/details','ExcelController@exportDetails');

});
