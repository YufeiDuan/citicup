<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="renderer" content="webkit">
		<title>2016花旗杯</title>
		
		<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		<link href="//cdn.bootcss.com/jquery-ui-bootstrap/0.5pre/css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet">
		<script src="//cdn.bootcss.com/jquery.form/3.51/jquery.form.min.js"></script>
		<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
		<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="//cdn.bootcss.com/jquery-ui-bootstrap/0.5pre/assets/js/jquery-ui-1.10.0.custom.min.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<div class="contrainer-fluid">
	<div class="row" style="margin-top:20px;">
		<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
				<div class="panel-heading">登录
					<div style="text-align:right;float:right">
						
					</div>
				</div>
				<div class="panel-body">
					
							
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<form class="form-horizontal" role="form" method="POST" action="{{ url('/adminauth/login') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label class="col-md-4 control-label">用户名</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="name" value="{{ old('name') }}" required="required" placeholder="请输入用户名">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">密码</label>
					<div class="col-md-6">
						<input type="password" class="form-control pwdd" name="password" id="pwd" required="required"  placeholder="请输入密码">
						<span id="pwd_info"></span>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							登录
						</button>
					</div>
				</div>

			</form>
		</div>

				</div>
			</div>

	</div>
</div>
	</body>
</html>