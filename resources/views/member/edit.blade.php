<p>@extends('home')
    @section('rightcontent')
    <script src="/js/memberedit.js"></script>
    <script src="/js/school.js"></script>
    <script src="/js/choose_school.js"></script>
    <link rel="stylesheet" href="/css/team.css" type="text/css" />
    <div class="container">
        <div class="row">
            <div id="choose-box-wrapper">
                <div id="choose-box">
                    <div id="choose-box-title">
                        <span>选择学校</span>
                    </div>
                    <div id="choose-a-province">
                    </div>
                    <div id="choose-a-school">
                    </div>
                    <div id="choose-box-bottom">
                        <input type="botton" onclick="hide()" value="关闭" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            修改信息
        </div>
        <div class="row">
        <form action="{{ URL('/member/'.$member->id) }}" method="POST" onsubmit="return(check())" name="formchange">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            姓名: <input type="text" name="name" class="form-control" required="required" value="{{ $member->name }}" maxLength="10">
            <br>
            性别: <select class="form-control" name="sex" id="sex" required="required">
                      <option value="1">男</option>
                      <option value="0">女</option>
                  </select>
            <br>
            <input type="hidden" name="sex_sel" id="sex_sel" value="{{$member->sex}}"/>
            学校: <input type="text" name="school" id="school-name" value="{{$member->univ->name}}" onclick="pop()" readonly="readonly" class="form-control">
                  <input type="hidden" id="univ_sel" name="univ_id" value="{{$member->univ->id}}" required="required">

            <br>
            学院:<input type="text" name="college" class="form-control" required="required" value="{{ $member->college }}" maxLength="20" required="required">
            <br> 
            专业: <input type="text" name="major" class="form-control" required="required" value="{{ $member->major }}" maxLength="20" required="required">
            <br>
            学号: <input type="text" name="stu_num" class="form-control" required="required" value="{{ $member->stu_num }}" maxLength="15" required="required">
            <br>
            身份证号: <input type="text" name="id_num" id="id_num" class="form-control" required="required" value="{{ $member->id_num }}" maxLength="18" required="required">
            <br>
            在读学历: <select class="form-control" id="degree" name="degree" required="required">
                      <option value="0">大专</option>
                      <option value="1">本科</option>
                      <option value="2">硕士</option>
                      <option value="3">博士</option>
                  </select>
                <input type="hidden" name="degree_sel" id="degree_sel" value="{{$member->degree}}"/>
            <br>
            入学年份: <select class="form-control" name="year_entry" id="year_entry" required="required">
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2008</option>
                        <option value="2006">2008</option>
                        <option value="2005">2008</option>
                  </select>

                  <input type="hidden" name="entry_sel" id="entry_sel" value="{{$member->year_entry}}"/>
            <br>
            Email: <input type="text" name="email" class="form-control" required="required" value="{{ $member->email }}" required="required">
            <br>
            <button class="btn btn-lg btn-info">保存</button>
            <input class="btn btn-lg btn-info" type="button" value="返回" onClick="javascript:history.back();">
        </form>
        </div>
    </div>
@endsection
</p>