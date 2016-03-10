<p>@extends('app')
    @section('content')
    <link rel="stylesheet" href="/css/menu.css" type="text/css" />
    <script src="/js/mail.js"></script>
    <div class="container">
        <div class="modal" id="mail">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">新邮件</h4>
                    </div>
                    <div class="modal-body">
                        <form action="/mail" method="post">
                        收件人：大赛举办方
                        <p>
                        主题：<input type="text" name="subject" id="subject" class="form-control" maxlength="25">
                        <p>
                        正文：<textarea name="content" id="content" class="form-control" rows="10" maxlength="250"></textarea>
                    </div>
                    <div class="modal-footer">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-success" type="submit">发送</button>
                        </form>
                          <button class="btn btn-danger" onclick="cancel()">取消</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                
            <ul id="main-nav" class="nav nav-tabs nav-stacked">
                <li>
                    <a href="javascript:write()">
                        <i class="glyphicon glyphicon-file"></i>
                        写信
                    </a>
                </li>
               
                <li>
                    <a href="{{ url('/mail') }}">
                        收件箱
                    </a>
                </li>
                
                <li>
                    <a href="{{ url('/mail/outbox') }}">
                        发件箱
                    </a>
                </li>
                
            </ul>
            </div>
            <div class="col-md-9">
                @yield('rightcontent')
            </div>
    </div>
    @endsection
</p>