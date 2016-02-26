<p>@extends('home')
	@section('head')
	<meta name="file_token" content="">
	@endsection
	@section('rightcontent')
	<link rel="stylesheet" href="/css/report.css" type="text/css" />
	<script src="/js/jquery.form.js"></script>
	<script src="/js/report.js"></script>
	<div class="container-fluid">
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<div class="modal" id="upload_modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" onclick="hide()" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">上传文件</h4>
					</div>
					<div class="modal-body">
						<form id='myupload' action='/report' method='post' enctype='multipart/form-data'>
							<div class="btn">
								<span>添加附件</span>
								
								<input id="fileupload" type="file" name="report">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							</form>
						</div>
						<div class="progress">
							<span class="bar"></span><span class="percent">0%</span >
						</div>
						<div class="files"></div>
					</div>
					<div class="modal-footer">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		参赛题目<a href="#" onclick="display()">修改</a>
	</div>
	<div class="row">
		<form action="{{ URL('/report/1') }}" method="post">
			<input name="_method" type="hidden" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="text" name="title" id="title" value="{{$data['title']}}" onkeyup="value=value.replace(/[^\a-\z\A-\Z0-9\u4E00-\u9FA5\@\.]/g,'')" onblur="if(this.value.replace(/^ +| +$/g,'')=='')alert('不能为空!')" maxlength="30"/>
			<span class="tips">不超过30个字符</span>
			<input type="submit" id="save" value="保存">
			<input type="button" id="cancel" value="取消" onClick="display()">
		</form>
	</div>
	<div class="row">
		项目报告<a href="#" onclick="pop()">上传</a>
	</div>
	<div class="row report">
		<div class="row">
			@if (empty($data['report']))
			未提交项目报告。
			@else
			<table class="table table-striped">
				<tr class="row">
					<th class="col-xs-1">序号</th>
					<th class="col-xs-5">文件名</th>
					<th class="col-xs-2">文档类型</th>
					<th class="col-xs-4">上传时间</th>
				</tr>
				<tr class="row">
					<td class="col-xs-1">1</td>
					<td class="col-xs-5">
						{{ $data['report']->path }}
					</td>
					<td class="col-xs-2">
						项目报告
					</td>
					<td class="col-xs-4">
						{{ $data['report']->updated_at }}
					</td>
				</tr>
			</table>
			@endif
		</div>
		<div class="alert alert-info">
			<ul>
				@if(!empty($data['report']))
				<li id="freqli">					
						今日剩余上传次数：{{$data['report']->freq}}
					<input type="hidden" id="freq" value="{{ $data['report']->freq }}">
				</li>
				@endif
				<li>项目报告只保留最新一次上传的文档。</li>
				<li>项目报告将于2016年6月1日0时0分截止提交。</li>
			</ul>
		</div>
	</div>
	
</div>
@endsection
</p>