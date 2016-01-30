<p>@extends('app')
    @section('content')
    <link rel="stylesheet" href="/css/menu.css" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-xs-3">
                
            <ul id="main-nav" class="nav nav-tabs nav-stacked">
                <li>
                    <a href="{{ url('/team') }}">
                        <i class="glyphicon glyphicon-user"></i>
                        团队组建
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-file"></i>
                        项目报告
                    </a>
                </li>
                
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-folder-open"></i>
                        完整作品
                    </a>
                </li>
                
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-stats"></i>
                        首轮评选
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-star"></i>
                        决赛颁奖
                    </a>
                </li>
                
            </ul>
            </div>
            <div class="col-xs-9 rightview">
                @yield('rightcontent')
            </div>
    </div>
    @endsection
</p>