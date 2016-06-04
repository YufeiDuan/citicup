<p>@extends('admin.home')
    @section('rightcontent')
    <script src="/js/s.js"></script>
    <link rel="stylesheet" href="/css/team.css" type="text/css" />
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
        <div class="row">

        <ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#member" data-toggle="tab">
      添加学生</a>
   </li>
   <li id="addteacher"><a href="#teacher" data-toggle="tab">添加老师</a></li>
</ul>
<div id="myTabContent" class="tab-content">
   
   <div class="tab-pane fade" id="teacher">
      <form action="{{ URL('/admin/teacher') }}" method="POST" name="formaddt" class="form-horizontal">   
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
      <form action="{{ URL('/admin/member') }}" method="POST" name="formaddm" class="form-horizontal">
            <br>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="col-md-4 control-label">学生类型</label>
                <div class="col-md-6">
                    <select class="form-control" name="leader" id="leader" required="required">
                      <option value="1">队长</option>
                      <option value="0" selected>队员</option>
                  </select>
                </div>
            </div>
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
                <label class="col-md-4 control-label">身份证号</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="id_num" id="id_num"  required="required" value="{{ old('id_num') }}" maxLength="18" placeholder="必填项,请输入正确的18位身份证号">
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
                <label class="col-md-4 control-label">在读年级</label>
                <div class="col-md-6">
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
                <label class="col-md-4 control-label">手机号码</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="phone" required="required"  maxLength="11" placeholder="必填项,请输入11位手机号码"value="{{ old('phone') }}">
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