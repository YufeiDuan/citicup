<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="renderer" content="webkit">

	<title>2016花旗杯</title>

	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="//cdn.bootcss.com/jquery.form/3.51/jquery.form.min.js"></script>
	<script src="//cdn.bootcss.com/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css" />
	<link href="//cdn.bootcss.com/jqueryui/1.11.4/jquery-ui.min.css" rel="stylesheet">
    
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    @yield('head')



</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="navbar-header">
						<a class="navbar-brand" href="/admin/home">CitiCup</a>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">

							<li>
								<a href="{{ url('/adminauth/logout') }}">登出</a>
								
							</li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>


	<div class="content-fluid" style="padding-top:15px;">
		<div class="row row-fluid">
			<div class="col-md-10 col-md-offset-1">
				<link rel="stylesheet" href="/css/menu.css" type="text/css" />
    <div class="container-fluid">
        <div class="row row-fluid">
            <div class="col-md-2 menu">
                
            <ul id="main-nav" class="nav nav-tabs nav-stacked">
                <li>
                    <a href="{{ url('/admin/team') }}">
                        <i class="glyphicon glyphicon-user"></i>
                        团队管理
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/report') }}">
                        <i class="glyphicon glyphicon-file"></i>
                        项目报告
                    </a>
                </li>
                
                <li>
                    <a href="{{ url('/admin/document') }}">
                        <i class="glyphicon glyphicon-folder-open"></i>
                        完整作品
                    </a>
                </li>
                
                <li>
                    <a href="{{ url('/admin/message') }}">
                        <i class="glyphicon glyphicon-stats"></i>
                        消息中心
                    </a>
                </li>   
                
            </ul>
            </div>
            <div class="col-md-9" style="margin-left:20px;">
                @yield('rightcontent')
            </div>
    </div>
			</div>
		</div>
	</div>
</body>
</html>