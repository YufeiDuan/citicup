@extends('reg')
@section('head')
<script src="/js/newteam.js"></script>
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
<form class="form-horizontal" role="form" method="POST" action="{{ url('/reg/register') }}" onsubmit="return(check())">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" id="univ_sel" name="univ_sel" >
	<img src="/img/logo.png" id="logo">
	<div class="form-group">
		<label class="col-md-4 control-label">团队名称</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="name" value="{{ old('name') }}" required="required" placeholder="必填项，请避免使用特殊字符，最多20个字符">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">所属高校</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="school" id="school-name" required="required"  placeholder="必填项，请点击选择" onclick="pop()">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">参赛题目</label>
		<div class="col-md-6">
			<input type="password" class="form-control" name="title" id="title" placeholder="非必填项，可稍后填写">
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
		</ul>
	</div>
</form>
		<div class="modal" id="upload_modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" onclick="hideupload()" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">上传Logo</h4>
					</div>
					<div class="modal-body">
						<form id='myupload' action='/team/logo' method='post' enctype='multipart/form-data' onsubmit='check()'>
							<div class="btn">
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
	<div class="modal" id="choose">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">选择学校</h4>
				</div>
				<div class="modal-body">
					<div id="choose-a-province">
					</div>
					<div id="choose-a-school">
					</div>
				</div>
				<div class="modal-footer">
					
				</div>
			</div>
		</div>
	</div>

@endsection