<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="renderer" content="webkit">
	<title>2016 Citi Financial Innovation Application Competition</title>

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
	<div id="container">
		<div id="header">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="navbar-header">
						<a class="navbar-brand" style="font-size:14px;" href="/home">2016 “花旗杯”金融创新应用大赛</a>
					</div>
					<p class="navbar-text"><a id="news" href="#">大赛要闻</a></p>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="/mail">消息中心
									@if($data['count']>0)
                        			({{$data['count']}})
                        			@endif
								</a>
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
			</div>
		</div>
	</nav>
</div>
<div id="body">
	<div class="box">
		<div class="time">
			<div class="clearfix course_nr">
				<ul class="disp">
					<li id="s1" style="background:url(/img/1.png) no-repeat center top; ">
						Jun 5
						<div class="shiji">
							<h5>Jun 5</h5>
							<p>比赛启动</p>
						</div>
					</li>
					<li id="s2" style="background:url(/img/2.png) no-repeat center top; ">
						Jul 15
						<div class="shiji" >
							<h5>Jul 15</h5>
							<p>团队组建</p>
						</div>
					</li>
					<li  id="s3" style="background:url(/img/3.png) no-repeat center top; ">
						Aug 12
						<div class="shiji">
							<h5>Aug 12</h5>
							<p>项目报告</p>
						</div>
					</li>
					<li id="s4" style="background:url(/img/4.png) no-repeat center top; ">
						Sep 16
						<div class="shiji" >
							<h5>Sep 16</h5>
							<p>完整作品</p>
						</div>
					</li>
					<li id="s5" style="background:url(/img/5.png) no-repeat center top; ">
						Oct 20
						<div class="shiji">
							<h5>Oct 20</h5>
							<p>首轮评选(暂定)</p>
						</div>
					</li>
					<li  id="s6" style="background:url(/img/6.png) no-repeat center top; ">
						Nov 17
						<div class="shiji">
							<h5>Nov 17</h5>
							<p>决赛颁奖(暂定)</p>
						</div>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
	<!-- Scripts -->
	<script type="text/javascript">
		$(function(){
			var t_li = $(".disp li:not(#s1,#s2)");
			var c_li = $(".disp li:not(#s1,#s2)").find('.shiji');
				t_li.hover(function(){
					var i = t_li.index($(this));
					function way(){
					//t_li.removeClass("cur").eq(i).addClass("cur");
					c_li.eq(i).slideDown(250);
				}
				timer=setTimeout(way,100);
			},function(){
				clearTimeout(timer);
				$(this).find('.shiji').slideUp(150);
			});

			$('#s1,#s2').find('.shiji').slideDown(300);

		});
	</script>

	<div class="content-fluid" style="border-top:solid 1px #eeeeee;padding-top:15px;">
		<div class="row row-fluid">
			<div class="col-md-10 col-md-offset-1">
				@yield('content')
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