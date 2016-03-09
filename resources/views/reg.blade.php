<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="renderer" content="webkit">
		<title>2016花旗杯</title>
		
		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/jquery-ui.min.css') }}" rel="stylesheet">
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/jquery-ui.min.js"></script>
		<!-- Fonts -->
		<link href='//fonts.useso.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->


		@yield('head')

	</head>
	<body>
	<div class="contrainer-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">@yield('title')
					<div style="text-align:right;float:right">
						<a href="{{ url('/auth/logout') }}">
							@if(Auth::user())
							登出
							@else
							返回首页
							@endif
						</a>
					</div>
				</div>
				<div class="panel-body">
					
					@yield('content')

				</div>
			</div>
		</div>
	</div>
</div>
	</body>
</html>