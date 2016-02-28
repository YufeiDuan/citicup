<html>
	<head>
		<title>2016花旗杯</title>
		
		<!--<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>-->
				<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/register.js"></script>
	</head>
	<body>
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">创建团队
					<ul class="nav  navbar-right">
						<li>
							<a href="{{ url('/auth/logout') }}">登出</a>
							
						</li>
						
					</ul></div>
				<div class="panel-body">
					
						<div class="alert alert-info">
							<ul>
								<li><h4>注册成功</h4></li>
								<li><h5>请查看邮件，验证邮箱后进行下一步操作。</h5></li>
								<li><h5><a href="">未收到邮件？点击重新发送</a></h5></li>
							</ul>
						</div>

				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>