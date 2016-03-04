<!DOCTYPE html>
<htm>
	<head>

		<title>2016花旗杯</title>
		
		<!--<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>-->
		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/jquery-ui.min.css') }}" rel="stylesheet">
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/jquery-ui.min.js"></script>

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