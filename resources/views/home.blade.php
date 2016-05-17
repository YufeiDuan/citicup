<p>@extends('app')
    @section('content')
    <link rel="stylesheet" href="/css/menu.css" type="text/css" />
    <script src="{{ asset('/js/menu.js') }}"></script>
    <div class="container-fluid">
        <div class="row row-fluid" style="height:70%">
            <div class="col-md-3 menu">
                
            <ul id="main-nav" class="nav nav-tabs nav-stacked">
                <li id="menu_team">
                    <a href="{{ url('/team') }}">
                        <i class="glyphicon glyphicon-user"></i>
                        团队组建
                    </a>
                </li>
                <li id="menu_report">
                    <a href="{{ url('/report') }}">
                        <i class="glyphicon glyphicon-file"></i>
                        项目报告
                    </a>
                </li>
                
                <li id="menu_document">
                    <a href="{{ url('/document') }}">
                        <i class="glyphicon glyphicon-folder-open"></i>
                        完整作品
                    </a>
                </li>
                
                <li id="menu_rate">
                    <a href="{{ url('/rate') }}">
                        <i class="glyphicon glyphicon-stats"></i>
                        首轮评选
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