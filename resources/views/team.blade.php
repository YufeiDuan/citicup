<p>@extends('home')
	@section('rightcontent')
	<link rel="stylesheet" href="/css/team.css" type="text/css" />
	<div class="container">
		<div class="row">
			团队信息 <a href="{{ url('#') }}">修改</a>
		</div>
		<div class="row">
			<div class="col-xs-3">
				<img src="/logo/pic">
			</div>
			<div class="col-xs-5">
				<table class="table">
				<tr class="row"></tr>
				<tr class="row">
					<td>团队名称：</td>
					<td>{{$team->name}}</td>
				</tr>
				<tr class="row">
					<td>所属高校：</td>
					<td>{{$univname}}</td>
				</tr>
				<tr class="row">
					<td>参赛题目：</td>
					<td>{{$team->title}}</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="row">
		成员信息 <a href="{{url('#')}}">添加</a>
	</div>
	<div class="row">
		<table class="table table-striped">
			<tr class="row">
				<th class="col-xs-2">姓名</th>
				<th class="col-xs-2">学校</th>
				<th class="col-xs-2">学院</th>
				<th class="col-xs-1">类别</th>
				<th class="col-xs-2">操作</th>
			</tr>
			@foreach ($members as $member)
			<tr class="row">
				<td class="col-xs-2">
					{{ $member->name }}
				</td>
				<td class="col-xs-2">
					{{ $member->univ->name }}
				</td>
				<td class="col-xs-2">
					{{ $member->college }}
				</td>
				<td class="col-xs-1">
				@if ($member->leader)
					队长
				</td>
				<td class="col-xs-2"></td>
				<td class="col-xs-1">
				@else
					队员
				</td>
				<td class="col-xs-2">
					<a href="{{ URL('admin/members/'.$member->id.'/edit') }}" class="btn btn-success">编</a>
					<form action="{{ URL('admin/members/'.$member->id) }}" method="POST" style="display: inline;">
						<input name="_method" type="hidden" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit" class="btn btn-danger">删</button>
					</form>
				</td>
				@endif
			</tr>
			@endforeach
			@foreach ($teachers as $teacher)
			<tr class="row">
				<td class="col-xs-1">
					{{ $teacher->name }}
				</td>
				<td class="col-xs-2">
					{{ $teacher->univ->name }}
				</td>
				<td class="col-xs-2">
					{{ $teacher->college }}
				</td>
				<td class="col-xs-1">
					指导老师
				</td>
				<td class="col-xs-1">
					<a href="{{ URL('admin/members/'.$member->id.'/edit') }}" class="btn btn-success">编</a>
					<form action="{{ URL('admin/members/'.$member->id) }}" method="POST" style="display: inline;">
						<input name="_method" type="hidden" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit" class="btn btn-danger">删</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection
</p>