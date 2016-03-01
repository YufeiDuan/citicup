<!DOCTYPE html>
<htm>
	<head>
		@yield('head')
		<title>2016花旗杯</title>
		
		<!--<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>-->
				<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
	</head>
	<body>
	<div class="contrainer-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">@yield('title')</div>
				<div class="panel-body">
					
					@yield('content')

				</div>
			</div>
		</div>
	</div>
</div>
	</body>
</html>