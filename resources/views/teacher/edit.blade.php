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
        <form action="{{ URL('/teacher/'.$teacher->id) }}" method="POST" onsubmit="return(check())" name="formchange">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            姓名: <input type="text" name="name" class="form-control" required="required" value="{{ $teacher->name }}" maxLength="10">
            <br>
            学校: <input type="text" name="school" id="school-name" value="{{$teacher->univ->name}}" onclick="pop()" readonly="readonly" class="form-control">
                  <input type="hidden" id="univ_sel" name="univ_id" value="{{$teacher->univ->id}}" required="required">

            <br>
            学院:<input type="text" name="college" class="form-control" required="required" value="{{ $teacher->college }}" maxLength="20" required="required">
            <br> 

            Email: <input type="text" name="email" class="form-control" required="required" value="{{ $teacher->email }}" required="required">
            <br>
            <button class="btn btn-lg btn-info">保存</button>
            <input class="btn btn-lg btn-info" type="button" value="返回" onClick="javascript:history.back();">
        </form>
        </div>
    </div>
@endsection
</p>