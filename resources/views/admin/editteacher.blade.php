<p>
@extends('admin.home')
    @section('rightcontent')
    <script src="/js/memberedit.js"></script>
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
            修改信息
        </div>
        <div class="row">
        <form action="{{ URL('/admin/teacher/'.$teacher->id) }}" method="POST" name="formchange"class="form-horizontal">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            

            <div class="form-group">
                <label class="col-md-4 control-label">姓名</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="name" required="required" value="{{ $teacher->name }}" maxLength="10" placeholder="必填项,不超过10个字符" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">学校</label>
                <div class="col-md-6">
                    <input type="text" class="form-control school" name="school" required="required" value="{{ $teacher->univ->name }}" placeholder="必填项,请输入学校全称" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">学院</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="college" required="required" value="{{ $teacher->college }}" maxLength="20" placeholder="必填项,请输入学院全称,不超过20个字符" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">电子邮箱</label>
                <div class="col-md-6">
                    <input type="email" class="form-control" name="email" required="required" value="{{ $teacher->email }}" placeholder="必填项" >
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