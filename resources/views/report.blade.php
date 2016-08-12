<p>@extends('home')
	@section('head')
	<meta name="file_token" content="">
	@endsection
	@section('rightcontent')
	<link rel="stylesheet" href="/css/report.css" type="text/css" />
	<script src="/js/report.js"></script>
	<div class="container-fluid">
		@if (count($errors) > 0)
		<div class="row-fluid">
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>
		@endif
		{{-- <div class="modal" id="upload_modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" onclick="hide()" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">上传文件</h4>
					</div>
					<div class="modal-body">
						<form id='myupload' action='/report' method='post' enctype='multipart/form-data'>
							<div class="btni">
								<span>添加附件</span>
								
								<input id="fileupload" type="file" name="report">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							</form>
						</div>
						<div class="progress">
							<span class="bar"></span><span class="percent">0%</span >
						</div>
						<div class="files">
							建议使用英文文件名。
						</div>
					</div>
					<div class="modal-footer">
						
					</div>
				</div>
			</div>
		</div> --}}
	</div>
	<div class="row-fluid xgxdiv" >
		<h4 class="xgxtitle">参赛题目</h4>{{--  <a href="#" onclick="display()"><i class="glyphicon glyphicon-edit"></i>修改</a> --}}

	</div>
	<div class="row-fluid col-md-12">
		{{-- <form action="{{ URL('/report/1') }}" method="post" class="form-horizontal"> --}}
			<div class="form-group">
				<input name="_method" type="hidden" value="PUT">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<div class="col-md-6 col-md-offset-2">
						<input type="text" name="title" id="title" class="form-control" value="{{$data['title']}}" onblur="if(this.value.replace(/^ +| +$/g,'')=='')alert('不能为空!')"placeholder="不超过30个字符" maxlength="30"/>
					</div>
				</div>
				{{-- <div class="form-group">
					<div class="col-md-4 col-md-offset-4">
						<input class="btn btn-success" type="submit" id="save" value="保存">
						<input class="btn btn-danger" type="button" id="cancel" value="取消" onClick="display()">
					</div>
				</div> --}}
			</div>
		{{-- </form> --}}
	</div>
	<div class="row-fluid xgxdiv" >
		<h4 class="xgxtitle">项目简介</h4>{{--  <a href="#" onclick="display2()"><i class="glyphicon glyphicon-edit"></i>修改</a> --}}

	</div>
	<div class="row-fluid col-md-12">
		<form action="{{ URL('/report/2') }}" method="post" class="form-horizontal">
			<div class="form-group">
				<input name="_method" type="hidden" value="PUT">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label class="col-md-2 control-label">中文简介<br>
						{{-- <span id="chn_info">0</span>/200 --}}
					</label>
					<div class="col-md-8">
						<textarea id="chn" class="form-control introduction" name="introduction_chn" required="required" value="" rows="5" maxLength="200" placeholder="不超过200个字。">{{$data['introduction_chn']}}</textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">英文简介
				{{-- 	<br>
						<span id="eng_info">0</span>/200 --}}</label>
					<div class="col-md-8">
						<textarea id="eng" class="form-control introduction" name="introduction_eng" required="required" value="" rows="5" placeholder="No more than 200 words.">{{$data['introduction_eng']}}</textarea>
					</div>
				</div>
				{{-- <div class="form-group">
					<div class="col-md-4 col-md-offset-4">
						<input class="btn btn-success" type="submit" id="save2" value="保存">
						<input class="btn btn-danger" type="button" id="cancel2" value="取消" onClick="display2()">
					</div>
				</div> --}}

			</div>
		</form>
	</div>
	<div class="row-fluid xgxdiv">
		<h4 class="xgxtitle">项目报告</h4>{{--  <a href="#" onclick="pop()"><i class="glyphicon glyphicon-upload"></i>上传</a> --}}
	</div>
	<div class="row-fluid">
			@if (empty($data['report']))
			<div class="alert alert-info">
				未提交项目报告。
			</div>
			@else
			<table class="table table-hover table-striped">
				<thead>
					<tr class="row">
						<th class="col-md-1">序号</th>
						<th class="col-md-5">文件名</th>
						<th class="col-md-2">文档类型</th>
						<th class="col-md-4">上传时间</th>
					</tr>
				</thead>
				<tbody>
				<tr class="row">
					<td class="col-md-1">1</td>
					<td class="col-md-5">
						{{ $data['report']->path }}
					</td>
					<td class="col-md-2">
						项目报告
					</td>
					<td class="col-md-4">
						{{ $data['report']->updated_at }}
					</td>
				</tr>
				</tbody>
			</table>
			@endif
	</div>
	<div class="row-fluid">
		<div class="alert alert-info">
			<ul>
				@if(!empty($data['report']))
				<li id="freqli">					
						今日剩余上传次数：{{$data['report']->freq}}
					<input type="hidden" id="freq" value="{{ $data['report']->freq }}">
				</li>
				@endif
				<li>参赛题目和项目简介应在本阶段完成填写。</li>
				<li>项目报告只保留最新一次上传的文档。</li>
				<li>项目报告将于2016年8月13日0时0分截止提交。</li>
			</ul>
		</div>
	</div>
	
</div>
@endsection
</p>