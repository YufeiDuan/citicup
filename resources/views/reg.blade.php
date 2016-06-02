<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="renderer" content="webkit">
	<title>2016 Citi Financial Innovation Application Competition</title>
	
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="//cdn.bootcss.com/jqueryui/1.11.4/jquery-ui.min.css" rel="stylesheet">

	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="//cdn.bootcss.com/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="//cdn.bootcss.com/jquery.form/3.51/jquery.form.min.js"></script>




	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


	@yield('head')

</head>
<body>
<div id="container">
	<div id="header">
	</div>
	<div id="body">
		<div class="contrainer-fluid" style="margin-top:50px;">
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
	</div>
	<div id="footer">
		版权所有@<a id="se" href="http://se.xjtu.edu.cn">西安交通大学软件学院</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
		地址：陕西省西安市咸宁西路28号&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
		邮编：710049&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
		陕ICP备05001571号 
	</div>
</div>
</body>
</html>