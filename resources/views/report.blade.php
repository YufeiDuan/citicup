<p>@extends('home')
	@section('head')
	<meta name="file_token" content="">
	@endsection
	@section('rightcontent')
	<link rel="stylesheet" href="/css/report.css" type="text/css" />
	<script src="/js/jquery.form.js"></script>
	<script src="/js/report.js"></script>
	<div class="container">
		@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
		<div class="row">
		参赛题目<a href="#" onclick="display()">修改</a>
	</div>
		<div class="row">
		<form action="{{ URL('/team/1') }}" method="post">
			<input name="_method" type="hidden" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="text" name="title" id="title" value="{{$data['title']}}" onkeyup="value=value.replace(/[^\a-\z\A-\Z0-9\u4E00-\u9FA5\@\.]/g,'')" onblur="if(this.value.replace(/^ +| +$/g,'')=='')alert('不能为空!')" maxlength="30"/>
			<span class="tips">不超过30个字符</span>
			<input type="submit" id="save" value="保存">
			<input type="button" id="cancel" value="取消" onClick="display()">
		</form>
	</div>

		<div class="row">
			项目报告
	</div>

		<div class="row report">
			<p>
				当前项目报告状态：
				@if(empty($data['report']))
				未提交
				@else
				{{$data['report']->updated_at}} 已提交{{strstr($data['report']->path, '.')}}类型文件
				@endif
			</p>
			<div class="btn">
				<span>添加附件</span>
				<form id='myupload' action='/report' method='post' enctype='multipart/form-data'>
					<input id="fileupload" type="file" name="report">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</form>
			</div>
			<div class="progress">
				<span class="bar"></span><span class="percent">0%</span >
			</div>
			<div class="files"></div>
		</div>
		
	</div>
	@endsection
</p>