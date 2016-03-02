@extends('reg')
@section('head')
	<script src="/js/newteam.js"></script>
	<script src="/js/school.js"></script>
	<script src="/js/choose_school_th.js"></script>
	<script src="/js/jquery.form.js"></script>
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
<form class="form-horizontal" role="form" method="POST" action="{{ url('/reg/member') }}" onsubmit="return(checkadd())" name="add">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" id="univ_sel" name="univ_sel" required="required">
	<input type="hidden" id="univ_selt" name="univ_id" required="required">
	<div class="row">
		<div class="col-md-10">
			
			<div class="form-group">
				<label class="col-md-2"><h4>队长信息</h4></label>
			</div>
	
			<div class="form-group">
				<label class="col-md-2 control-label">姓名</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="leader_name" required="required"  maxLength="10" placeholder="必填项">
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
					<input type="text" class="form-control" name="leader_school" id="school-name" required="required"  maxLength="10" placeholder="必填项，点击选择" onclick="pop()" >
				</div>
			</div>
           
			<div class="form-group">
				<label class="col-md-2 control-label">学院</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="leader_college" required="required"  maxLength="20" placeholder="必填项,请输入学院全称，不超过20个字符">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">专业</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="leader_major" required="required"  maxLength="20" placeholder="必填项,请输入专业名称，不超过20个字符">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">学号</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="stu_num" required="required"  maxLength="15" placeholder="必填项,请输入数字字母组合">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">身份证号</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="id_num" id="id_num" required="required"  maxLength="18" placeholder="必填项,请输入正确的18位身份证号" onblur="checkid()" >
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
				<label class="col-md-2 control-label">入学年份</label>
				<div class="col-md-8">
					<select class="form-control" name="year_entry" id="year_entry" required="required">
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                  </select>
				</div>
			</div>
            
            <div class="form-group">
				<label class="col-md-2 control-label">电子邮箱</label>
				<div class="col-md-8">
					<input type="email" class="form-control" name="leader_email" required="required" placeholder="必填项">
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-3"><h4>指导老师信息</h4></label>
			</div>
           

            <div class="form-group">
				<label class="col-md-2 control-label">姓名</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="teacher_name" required="required"  maxLength="10" placeholder="必填项">
				</div>
			</div>
            <div class="form-group">
				<label class="col-md-2 control-label">学校</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="teacher_school" id="school-namet" required="required"  maxLength="10"  placeholder="必填项，点击选择" onclick="popt()" >
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">学院</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="teacher_college" required="required"  maxLength="20" placeholder="必填项,请输入学院全称，不超过20个字符">
				</div>
			</div>

            <div class="form-group">
				<label class="col-md-2 control-label">电子邮箱</label>
				<div class="col-md-8">
					<input type="email" class="form-control" name="teacher_email" required="required" placeholder="必填项">
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
					<li>若未上传团队Logo，将使用默认Logo。</li>
					<li>参赛题目可稍后填写，但不应晚于项目报告截止日期。</li>
				</ul>
			</div>
		</form>
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