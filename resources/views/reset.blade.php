@extends('reg')
	@section('head')
	<script src="/js/register.js"></script>
	@endsection
@section('title')重置密码
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/pwd/reset') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">新密码</label>
							<div class="col-md-6">
								<input type="password" class="form-control pwdd" name="password" id="pwd" placeholder="请输入6-16位数字、字母或常用符号">
								<span id="pwd_info"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">确认密码</label>
							<div class="col-md-6">
								<input type="password" class="form-control pwdd" name="password_confirmation" id="pwd_c" placeholder="请输入6-16位数字、字母或常用符号">
							<span id="pwd_c_info"></span>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									重置
								</button>
							</div>
						</div>
					</form>

	@endsection
