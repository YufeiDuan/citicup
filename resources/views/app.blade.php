<!DOCTYPE html>
<htm>
	<head>
		@yield('head')
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>2016花旗杯</title>
		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css" />
		<link href="/css/search.css"  rel="stylesheet" type="text/css" />
		<!-- Fonts -->
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="/home">CitiCup</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="/mail">消息中心({{ $data['count'] }})</a>
						</li>
						<li>
							<a href="/home">{{ $data['name'] }} 团队，您好！</a>
						</li>
						<li>
							<a href="{{ url('/auth/logout') }}">登出</a>
							
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
		<div class="box">
		<div class="time">
		<div class="clearfix course_nr">
	<ul class="course_nr2">
		<li>
			Mar 15
			<div class="shiji">
				<h5>Mar 15</h5>
				<p>比赛启动</p>
			</div>
		</li>
		<li>
			Jun 30
			<div class="shiji">
				<h5>Jun 30</h5>
				<p>团队组建</p>
			</div>
		</li>
		<li>
			Aug 1
			<div class="shiji">
				<h5>Aug 1</h5>
				<p>项目报告</p>
			</div>
		</li>
		<li>
			Sep 15
			<div class="shiji">
				<h5>Sep 15</h5>
				<p>完整作品</p>
			</div>
		</li>
		<li>
			Oct 15
			<div class="shiji">
				<h5>Oct 15</h5>
				<p>首轮评选</p>
			</div>
		</li>
		<li>
			Nov 20
			<div class="shiji">
				<h5>Nov 20</h5>
				<p>决赛颁奖</p>
			</div>
		</li>
		
	</ul>
</div>
</div>
</div>
		<!-- Scripts -->
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$('.course_nr2 li').hover(function(){
					$(this).find('.shiji').slideDown(600);
				},function(){
					$(this).find('.shiji').slideUp(400);
				});
				
			});
		</script>
		<script src="/js/search.js"></script>
		<div class="autoComplete"> <input value="input" /> <ul><li></li></ul> </div>
		@yield('content')
	</body>
</html>