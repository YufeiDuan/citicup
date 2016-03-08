<p>@extends('home')
    @section('rightcontent')
    <script src="/js/memberadd.js"></script>
    <script src="/js/s.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/search.js"></script>
    <link rel="stylesheet" href="/css/team.css" type="text/css" />
    <link href="{{ asset('/css/search.css') }}" rel="stylesheet">
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
        <div class="alert alert-info" id="tchinfo">
            <span id="info"></span>
        </div>
        <div class="row">
        <input type="hidden" id="teacher_count" value="{{ $data['teacher_count'] }}"/>

        <ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#member" data-toggle="tab">
      添加队员</a>
   </li>
   <li id="addteacher"><a href="#teacher" data-toggle="tab">添加老师</a></li>
</ul>
<div id="myTabContent" class="tab-content">
   
   <div class="tab-pane fade" id="teacher">
      <form action="{{ URL('/teacher') }}" method="POST" name="formaddt" class="form-horizontal">   
        <br>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="col-md-4 control-label">姓名</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="name" required="required" value="{{ old('name') }}" maxLength="10" placeholder="必填项,不超过10个字符" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">学校</label>
            <div class="col-md-6">
                <input type="text" class="form-control school" name="school" required="required" value="{{ old('school') }}" placeholder="必填项,请输入学校全称" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">学院</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="college" required="required" value="{{ old('college') }}" maxLength="20" placeholder="必填项,请输入学院全称,不超过20个字符" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">邮箱</label>
            <div class="col-md-6">
                <input type="email" class="form-control" name="email" required="required" value="{{ old('email') }}" placeholder="必填项" >
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-5">
               <button class="btn btn-success">保存</button>
                <input class="btn btn-danger" type="button" value="返回" onClick="javascript:history.back();">
            </div>
        </div>
        </form>
   </div>
   <div class="tab-pane fade in active" id="member">
      <form action="{{ URL('/member') }}" method="POST" onsubmit="return(checkadd())" name="formaddm" class="form-horizontal">
            <br>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="col-md-4 control-label">姓名</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="name" required="required" value="{{ old('name') }}" maxLength="10" placeholder="必填项,不超过10个字符" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">性别</label>
                <div class="col-md-6">
                    <select class="form-control" name="sex" id="sex" required="required">
                      <option value="1">男</option>
                      <option value="0">女</option>
                  </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">学校</label>
                <div class="col-md-6">
                    <input type="text" class="form-control school" name="school" required="required" value="{{ old('school') }}" placeholder="必填项,请输入学校全称" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">学院</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="college" required="required" value="{{ old('college') }}" maxLength="20" placeholder="必填项,请输入学院全称,不超过20个字符" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">专业</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="major" required="required" value="{{ old('major') }}" maxLength="20" placeholder="必填项,请输入专业名称,不超过20个字符" >
                </div>
            </div>            
            <div class="form-group">
                <label class="col-md-4 control-label">学号</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="stu_num" required="required" value="{{ old('stu_num') }}" placeholder="必填项,请输入数字字母组合" >
                </div>
            </div>  
            <div class="form-group">
                <label class="col-md-4 control-label">身份证号</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="id_num" id="id_num"  required="required" value="{{ old('id_num') }}" maxLength="18" onblur="checkid()" placeholder="必填项,请输入正确的18位身份证号">
                </div>
                <div class="col-md-2 control-label">
                    <span id="id_info"></span>
                </div>
            </div>  
            <div class="form-group">
                <label class="col-md-4 control-label">在读学历</label>
                <div class="col-md-6">
                    <select class="form-control" name="degree" id="degree" required="required">
                      <option value="0">大专</option>
                      <option value="1"  selected>本科</option>
                      <option value="2">硕士</option>
                      <option value="3">博士</option>
                  </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">入学年份</label>
                <div class="col-md-6">
                    <select class="form-control" name="year_entry" id="year_entry" required="required" >
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
                <label class="col-md-4 control-label">电子邮箱</label>
                <div class="col-md-6">
                    <input type="email" class="form-control" name="email" required="required" value="{{ old('email') }}" placeholder="必填项" >
                </div>
            </div>  

            <div class="form-group">
                <div class="col-md-6 col-md-offset-5">
                   <button class="btn btn-success">保存</button>
                    <input class="btn btn-danger" type="button" value="返回" onClick="javascript:history.back();">
                </div>
            </div>
        </form>
   </div>
</div>



@endsection
</p>