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
			最终作品
	</div>

		<div class="row report">
			<p id="state">
				当前项目报告状态：
				@if(empty($data['report']))
				未提交
				@else
				{{$data['report']->updated_at}} 已提交{{strstr($data['report']->path, '.')}}类型文件
				@endif
			</p>
			<p id="freqinfo">
				今日剩余上传次数：{{$data['report']->freq}}
			</p>
			<input type="hidden" id="freq" value="{{ $data['report']->freq }}">
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