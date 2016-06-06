<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="renderer" content="webkit">
		<meta http-equiv="cleartype" content="on" />
		<title>2016 Citi Financial Innovation Application Competition</title>
		<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
		<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

		<link rel="stylesheet" href="{{ asset('/css/welcome.css') }}">
	</head>
	<body>
		<div class="logobck">
			<div class="logo">
				<img class="ilogo" src="/img/citi.png" alt=""/>
				<img class="ilogo" src="/img/xjtu.png" alt=""/>
				<img class="ilogo" src="/img/cfg.png" alt=""/>
				<div class="back2home" style="margin-right:200px;">
					<a href="/news">大赛要闻</a>
				</div>
				<div class="back2home" style="margin-right:50px;">
					<a href="/home">返回首页</a>
				</div>
			</div>
		</div>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1"  id="content">
				<div class="title">
					<h2 style="margin-bottom:20px;">@yield('title')</h2>
					<p>@yield('source')</p>
				</div>
				<div class="row"> 
					<div class="newscontent col-md-10 col-md-offset-1">
						@yield('content')
					</div>
				</div>

			</div>
		</div>
	</div>
	    <div class="footer">
	    	<div class="copyright">
	    		版权所有@<a id="se" href="http://se.xjtu.edu.cn">西安交通大学软件学院</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
	    		地址：陕西省西安市咸宁西路28号&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
	    		邮编：710049&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
	    		陕ICP备05001571号 
			</div>
	    </div>
	</body>
</html>