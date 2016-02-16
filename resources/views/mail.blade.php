<p>@extends('app')
    @section('content')
    <link rel="stylesheet" href="/css/menu.css" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-xs-3">
                
            <ul id="main-nav" class="nav nav-tabs nav-stacked">
                <li>
                    <a href="{{ url('/team') }}">
                        <i class="glyphicon glyphicon-file"></i>
                        写信
                    </a>
                </li>
                <li>
                    <a href="{{ url('/report') }}">
                        <i class="glyphicon glyphicon-envelope"></i>
                        收信
                    </a>
                </li>
                
                <li>
                    <a href="{{ url('/document') }}">
                        收件箱
                    </a>
                </li>
                
                <li>
                    <a href="#">
                        发件箱
                    </a>
                </li>
                
            </ul>
            </div>
            <div class="col-xs-9">
                @yield('rightcontent')
            </div>
    </div>
    @endsection
</p>