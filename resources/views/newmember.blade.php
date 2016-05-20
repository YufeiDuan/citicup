@extends('reg')
@section('head')
	<script src="{{ asset('/js/newteam.js') }}"></script>
	<script src="{{ asset('/js/s.js') }}"></script>
	<link href="{{ asset('/css/newteam.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/report.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/team.css') }}" rel="stylesheet">

@endsection
@section('title')
填写成员信息
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
<form class="form-horizontal" role="form" method="POST" action="{{ url('/reg/member') }}" onsubmit="" name="add">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="row">
		<div class="col-md-10">
			
			<div class="form-group">
				<label class="col-md-4"><h4>队长信息</h4></label>
			</div>
	
			<div class="form-group">
				<label class="col-md-2 control-label">姓名</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="leader_name" required="required" value="{{ old('leader_name') }}" maxLength="10" placeholder="必填项">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">性别</label>
				<div class="col-md-8">
					<select class="form-control" name="leader_sex" id="sex" required="required">
                      <option value="1">男</option>
                      <option value="0">女</option>
                  </select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">学校</label>
				<div class="col-md-8">
					<input required="required" type="text" class="form-control school" autocomplete="off" placeholder="必填项，请输入学校全称" value="{{ old('leader_univ') }}" name="leader_univ"/>
				</div>
			</div>
           
			<div class="form-group">
				<label class="col-md-2 control-label">学院</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="leader_college" required="required"  maxLength="20" placeholder="必填项,请输入学院全称，不超过20个字符" value="{{ old('leader_college') }}">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">身份证号</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="id_num" id="id_num" required="required"  maxLength="18" placeholder="必填项,请输入正确的18位身份证号" onblur="checkid()" value="{{ old('id_num') }}" >
				</div>
				<span id="id_info"></span>
			</div>

            <div class="form-group">
				<label class="col-md-2 control-label">在读学历</label>
				<div class="col-md-8">
					<select class="form-control" id="degree" name="degree" required="required">
                      <option value="0">大专</option>
                      <option value="1" selected>本科</option>
                      <option value="2">硕士</option>
                      <option value="3">博士</option>
                  </select>
				</div>
			</div>
            <div class="form-group">
				<label class="col-md-2 control-label">在读年级</label>
				<div class="col-md-8">
					<select class="form-control" name="grade" id="grade" required="required">
                        <option value="1">一</option>
                        <option value="2">二</option>
                        <option value="3">三</option>
                        <option value="4">四</option>
                        <option value="5">五</option>
                        <option value="6">六</option>
                        <option value="7">七</option>
                        <option value="8">八</option>
                  </select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">手机号码</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="phone" required="required"  maxLength="11" placeholder="必填项,请输入11位手机号码"value="{{ old('phone') }}">
				</div>
			</div>
            
            <div class="form-group">
				<label class="col-md-2 control-label">电子邮箱</label>
				<div class="col-md-8">
					<input type="email" class="form-control" name="leader_email" required="required" placeholder="必填项" value="{{ old('leader_email') }}">
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4"><h4>指导老师信息</h4></label>
			</div>
           

            <div class="form-group">
				<label class="col-md-2 control-label">姓名</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="teacher_name" required="required"  maxLength="10" placeholder="必填项" value="{{ old('teacher_name') }}">
				</div>
			</div>
            <div class="form-group">
				<label class="col-md-2 control-label">学校</label>
				<div class="col-md-8">
					<input required="required" type="text" class="form-control school" autocomplete="off" placeholder="必填项，请输入学校全称" name="teacher_univ"/>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">学院</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="teacher_college" required="required"  maxLength="20" placeholder="必填项,请输入学院全称，不超过20个字符" value="{{ old('teacher_college') }}">
				</div>
			</div>

            <div class="form-group">
				<label class="col-md-2 control-label">电子邮箱</label>
				<div class="col-md-8">
					<input type="email" class="form-control" name="teacher_email" required="required" placeholder="必填项" value="{{ old('teacher_email') }}">
				</div>
			</div>

            
			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="submit" class="btn btn-primary">
					完成
					</button>
				</div>
			</div>
			<div class="alert alert-info">
				<ul>
					<li>每个团队只需注册一个账号。</li>
					<li>请由队长进行团队注册操作。</li>
					<li>队长信息注册后不可修改，请慎重操作。</li>
					<li>团队组建将于2016年7月15日0时0分截止。</li>
				</ul>
			</div>
		</form>
	</div>
</div>

@endsection