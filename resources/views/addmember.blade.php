<p>@extends('home')
    @section('rightcontent')
    <script src="/js/memberadd.js"></script>
    <script src="/js/school.js"></script>
    <script src="/js/choose_school_two.js"></script>
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
        <div class="row">
        <input type="hidden" id="teacher_count" value="{{ $data['teacher_count'] }}"/>
        <span id="info"></span>
        <ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#member" data-toggle="tab">
      添加队员</a>
   </li>
   <li id="addteacher"><a href="#teacher" data-toggle="tab">添加老师</a></li>
</ul>
<div id="myTabContent" class="tab-content">
   
   <div class="tab-pane fade" id="teacher">
      <form action="{{ URL('/teacher') }}" method="POST" name="formaddt" onsubmit="return(check())">   
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            姓名: <input type="text" name="name" class="form-control" required="required" value="" maxLength="10">
            <br>
            学校: <input type="text" name="school" id="school-namet" value="点击选择" onclick="pop()" readonly="readonly" class="form-control">
            <input type="hidden" id="univ_selt" name="univ_id" value="" required="required">

            <br>
            学院:<input type="text" name="college" class="form-control" required="required" value="" maxLength="20" required="required">
            <br> 

            Email: <input type="text" name="email" class="form-control" required="required" value="" required="required">
            <br>
            <button class="btn btn-lg btn-info">保存</button>
            <input class="btn btn-lg btn-info" type="button" value="返回" onClick="javascript:history.back();">
        </form>
   </div>
   <div class="tab-pane fade in active" id="member">
      <form action="{{ URL('/member') }}" method="POST" onsubmit="return(checkadd())" name="formaddm">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            姓名: <input type="text" name="name" class="form-control" required="required" value="" maxLength="10" placeholder="必填项">
            <br>
            性别: <select class="form-control" name="sex" id="sex" required="required">
                      <option value="1">男</option>
                      <option value="0">女</option>
                  </select>
            <br>
            学校: <input type="text" name="school" id="school-name" value="点击选择" onclick="pop()" class="form-control" required="required">
            <input type="hidden" id="univ_sel" name="univ_id" value="" required="required">
            <br>
            学院:<input type="text" name="college" class="form-control" required="required" value="" maxLength="20" required="required" placeholder="必填项,请输入学院全称，不超过20个字符">
            <br> 
            专业: <input type="text" name="major" class="form-control" required="required" value="" maxLength="20" required="required" placeholder="必填项,请输入专业名称，不超过20个字符">
            <br>
            学号: <input type="text" name="stu_num" class="form-control" required="required" value="" maxLength="15" required="required" placeholder="必填项,请输入数字字母组合">
            <br>
            身份证号: <span id="id_info"></span><input type="text" name="id_num" id="id_num" class="form-control" required="required" value="" maxLength="18" required="required" onblur="checkid()" placeholder="必填项,请输入正确的18位身份证号">
            <br>
            在读学历: <select class="form-control" id="degree" name="degree" required="required">
                      <option value="0">大专</option>
                      <option value="1">本科</option>
                      <option value="2">硕士</option>
                      <option value="3">博士</option>
                  </select>
            <br>
            入学年份: <select class="form-control" name="year_entry" id="year_entry" required="required">
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
            <br>
            Email: <input type="text" name="email" class="form-control" required="required" value="" required="required" placeholder="必填项">
            <br>
            <button class="btn btn-lg btn-info">保存</button>
            <input class="btn btn-lg btn-info" type="button" value="返回" onClick="javascript:history.back();">
        </form>
   </div>
</div>



@endsection
</p>