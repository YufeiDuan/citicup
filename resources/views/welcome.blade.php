<html>
	<head>
		<title>2016花旗杯</title>
		
		<!--<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>-->

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.content {
				margin-top: 150px;
				text-align: center;
				display: inline-block;
				float: right;
				margin-right: 100px;
			}
			.login_box{
    			width: 300px;
    			background: #000;
    			text-align: center;
    			opacity: 0.4;
			}
			.checkbox{
				margin-left: 50px;
				text-align: left;
				float: left;
			}
			.forget{
				margin-right: 50px;
				text-align: right;
			}
			a:link,a:visited,a:hover {
				font-size:12px;
				color:#FFF;
				text-decoration: none
			}
			.btn{
				font-size: 16px;
				text-align: center;
				margin-right: 100px;
			}
		</style>
	</head>
	<body>
		<div class="content">
			<div class="login_box">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<div class="form-group">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<br/>
							<br/>
							<div class="col-md-6">
								邮箱<input type="email" name="email" value="{{ old('email') }}">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								密码<input type="password" name="password">
							</div>
						</div>
						<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> 记住我
									</label>
									
						</div>
						<div class="forget">
							<a href="#">忘记密码</a>
						</div>
						<div class="btn">
							<button type="submit">登录</button>
						</div>
					</form>
					<a>没有团队？</a><a href="#">立即组建</a>
			</div>
		</div>
	</body>
</html>
<!--<div class="title">Laravel 5</div>
				<div class="quote">{{ Inspiring::quote() }}</div>-->