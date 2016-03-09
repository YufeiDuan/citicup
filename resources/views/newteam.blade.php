@extends('reg')
@section('head')
	<script src="/js/newteam.js"></script>
	<script src="/js/s.js"></script>
	<script src="/js/jquery.form.js"></script>
	<script src="/js/jquery-ui.min.js"></script>
	<link href="{{ asset('/css/jquery-ui.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/newteam.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/report.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/team.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/search.css') }}" rel="stylesheet">
@endsection
@section('title')
创建团队
@endsection

@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<form class="form-horizontal" role="form" method="POST" action="{{ url('/reg/team') }}" onsubmit="">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" id="univ_sel" name="univ_sel" >
	<div class="row">
		<div class="col-md-3 logo">
			<img src="/logo/xgx" id="logo">
			<div>
				<button class="btn btn-primary" id="btn_upload" type="button">上传Logo</button>
			</div>
		</div>
		<div class="col-md-9">
			<div class="form-group">
				<label class="col-md-3 control-label">团队名称</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="name" value="{{ old('name') }}" required="required" placeholder="必填项，请避免使用特殊字符，最多20个字符" onblur="if(this.value.replace(/^ +| +$/g,'')=='')alert('不能为空!')" maxlength="20" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">所属高校</label>
				<div class="col-md-8">
					<input required="required" type="text" class="form-control school" autocomplete="off" placeholder="必填项，请输入学校全称" name="univ"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">参赛题目</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="title" id="title" placeholder="非必填项，可稍后填写" maxlength="30" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="submit" class="btn btn-primary">
					下一步
					</button>
				</div>
			</div>
			<div class="alert alert-info">
				<ul>
					<li>每个团队只需注册一个账号。</li>
					<li>请由队长进行团队注册操作。</li>
					<li>若未上传团队Logo，将使用默认Logo。</li>
					<li>参赛题目可稍后填写，但不应晚于项目报告截止日期。</li>
					<li>团队组建将于2016年6月30日0时0分截止。</li>
				</ul>
			</div>
		</form>
	</div>
</div>
		<div class="modal" id="upload_modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" onclick="hideupload()" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">上传Logo</h4>
					</div>
					<div class="modal-body">
						<form id='myupload' action='/reg/logo' method='post' enctype='multipart/form-data' onsubmit='check()'>
							<div class="btni">
								<span>选择图片</span>
								
								<input id="fileupload" type="file" name="pic" accept=".jpg,.png">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							</form>
						</div>
						<div class="progress">
							<span class="bar"></span><span class="percent">0%</span >
						</div>
						<div class="files">
							请选择jpg,png类型图片。
						</div>
					</div>
					<div class="modal-footer">
						
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection