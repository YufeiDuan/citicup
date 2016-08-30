<p>@extends('admin.home')
	@section('rightcontent')
	<div class="container-fluid">
		@if (count($errors) > 0)
		<div class="row-fluid">
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>
		@endif
	</div>

	<div class="row-fluid xgxdiv">
		<h4 class="xgxtitle">最终作品</h4>  <a href="/admin/document/all"><i class="glyphicon glyphicon-download"></i>下载全部</a>
	</div>
	<div class="row-fluid">
			<table class="table table-hover table-striped">
				<thead>
					<tr class="row">
						<th class="col-xs-1">序号</th>
						<th class="col-xs-2">团队名称</th>
						<th class="col-xs-1">参赛<br>承诺书</th>
						<th class="col-xs-1">商业<br>计划书</th>
						<th class="col-xs-1">需求<br>文档</th>
						<th class="col-xs-1">测试<br>文档</th>
						<th class="col-xs-1">用户<br>手册</th>
						<th class="col-xs-1">源代码</th>
						<th class="col-xs-1">项目<br>花絮</th>
						<th class="col-xs-1">下载</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($teams as $k=>$team)
				<tr class="row">

					<td class="col-xs-1">{{$k+1}}</td>
					<td class="col-xs-2">
						{{ $team->name }}
					</td>
					<td clss="col-xs-2">
						@if ( $team->doccount()[8] )
						<i style="color: green;" class="glyphicon glyphicon-ok"></i>
						@else
						<i style="color: red;" class="glyphicon glyphicon-remove"></i>
						@endif
					</td>
					@for ($i=0;$i<6;$i++)
					<td clss="col-xs-2">
						@if ( $team->doccount()[$i] )
						<i style="color: green;" class="glyphicon glyphicon-ok"></i>
						@else
						<i style="color: red;" class="glyphicon glyphicon-remove"></i>
						@endif
					</td>
					@endfor



					<td class="col-xs-1">
						@if($team->doccount()[4])
						<a href="{{ URL('/admin/document/'.$team->id) }}" class="btn btn-success"><i class="glyphicon glyphicon-download"></i></a>
						@endif
					</td>
				</tr>
				@endforeach
				</tbody>
			</table>
	</div>
	
</div>
@endsection
</p>