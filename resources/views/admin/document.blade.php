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
						<th class="col-xs-2">商业计划书</th>
						<th class="col-xs-2">技术文档</th>
						<th class="col-xs-2">作品演示</th>
						<th class="col-xs-2">项目花絮</th>
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
						@if ( $team->doccount()[0] )
						<i style="color: green;" class="glyphicon glyphicon-ok"></i>
						@else
						<i style="color: red;" class="glyphicon glyphicon-remove"></i>
						@endif
					</td>
					<td clss="col-xs-2">
						@if ( $team->doccount()[1] )
						<i style="color: green;" class="glyphicon glyphicon-ok"></i>
						@else
						<i style="color: red;" class="glyphicon glyphicon-remove"></i>
						@endif
					</td>
					<td clss="col-xs-2">
						@if ( $team->doccount()[2] )
						<i style="color: green;" class="glyphicon glyphicon-ok"></i>
						@else
						<i style="color: red;" class="glyphicon glyphicon-remove"></i>
						@endif
					</td>
					<td clss="col-xs-2">
						@if ( $team->doccount()[3] )
						<i style="color: green;" class="glyphicon glyphicon-ok"></i>
						@else
						<i style="color: red;" class="glyphicon glyphicon-remove"></i>
						@endif
					</td>


					<td class="col-xs-1">
						<a href="{{ URL('/admin/report/'.$team->id) }}" class="btn btn-success"><i class="glyphicon glyphicon-download"></i></a>
					</td>
				</tr>
				@endforeach
				</tbody>
			</table>
	</div>
	
</div>
@endsection
</p>