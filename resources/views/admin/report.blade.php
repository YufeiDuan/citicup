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
		<h4 class="xgxtitle">项目报告</h4>  <a href="/admin/report/all"><i class="glyphicon glyphicon-download"></i>下载全部</a>
	</div>
	<div class="row-fluid">
					<table class="table table-hover table-striped">
				<thead>
					<tr class="row">
						<th class="col-xs-1">序号</th>
						<th class="col-xs-4">团队名称</th>
						<th class="col-xs-2">项目报告</th>
						<th class="col-xs-4">上传时间</th>
						<th class="col-xs-1">下载</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($teams as $k=>$team)
				<tr class="row">

					<td class="col-xs-1">{{$k+1}}</td>
					<td class="col-xs-4">
						{{ $team->name }}
					</td>
					@if($team->reportcount()==0)
					<td class="col-xs-2">
						未提交
					</td>
					<td class="col-xs-4">
						未提交
					</td>
					<td class="col-xs-1">
					</td>
					@else
					<td class="col-xs-2">
						{{$team->report->path}}
					</td>
					<td class="col-xs-4">
						{{ $team->report->updated_at }}
					</td>
					<td>
						<a href="{{ URL('/admin/report/'.$team->id) }}" class="btn btn-success"><i class="glyphicon glyphicon-download"></i></a>
					</td>
					@endif
				</tr>
				@endforeach
				</tbody>
			</table>
	</div>
	
</div>
@endsection
</p>