<p>@extends('admin.home')
	@section('rightcontent')
	<script type="text/javascript">
	function delconfirm(){
		if(confirm( '确认删除？ ')==false){
			return false;
		}
		return true;
	}
	</script>
		<div class="contrainer-fluid">
			<div class="row-fluid xgxdiv">
				<h4 class="xgxtitle">所有团队</h4> <a href="{{url('')}}"><i class="glyphicon glyphicon-user"></i>添加</a>
			</div>
	<div class="row-fluid">
		<table class="table table-hover table-striped ">
			<thead>
			<tr class="row">
				<th class="col-xs-1">序号</th>
				<th class="col-xs-3">团队名称</th>
				<th class="col-xs-3">学校</th>
				<th class="col-xs-3">参赛题目</th>
				<th class="col-xs-2">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($teams as $k=>$team)
			<tr class="row">
				<td class="col-xs-1">
					{{ $k+1 }}
				</td>
				<td class="col-xs-3">
					{{ $team->name }}
				</td>
				<td class="col-xs-3">
					{{ $team->univ->name }}
				</td>
				<td class="col-xs-3">
					{{ $team->title }}
				</td>
				<td class="col-xs-2">
					<a href="{{ URL('/admin/team/'.$team->id) }}" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
					<form action="{{ URL('/admin/team/'.$team->id) }}" method="POST" style="display: inline;" onsubmit="return(delconfirm())">
						<input name="_method" type="hidden" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit" class="btn btn-danger del"><i class="glyphicon glyphicon-trash"></i></button>
					</form>
				</td>
		</tr>
		@endforeach
	</tbody>
	</table>
</div>
		</div>
	@endsection