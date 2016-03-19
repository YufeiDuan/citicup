<p>@extends('admin.home')
	@section('rightcontent')
	<script src="/js/s.js"></script>
	<script src="/js/teama.js"></script>
	<script type="text/javascript">
		$(function () {
			n = Math.random(100);
			$("#logo").attr("src","/admin/logo/{{$team->id}}/"+n);
		});
	</script>
	<link rel="stylesheet" href="/css/team.css" type="text/css" />
	<link rel="stylesheet" href="/css/report.css" type="text/css" />
	<div class="container-fluid">
		<div class="modal" id="upload_modal">
			<div class="modal-dialog">	
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" onclick="hideupload()" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">上传Logo</h4>
					</div>
					<div class="modal-body">
						<form id='myupload' action='/admin/team/logo' method='post' enctype='multipart/form-data' onsubmit='check()'>
							<div class="btni">
								<span>选择图片</span>
								<input id="fileupload" type="file" name="pic" accept=".jpg,.png">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="team_id" id="team_id" value="{{$team->id}}">

							</form>
						</div>
						<div class="progress">
							<span class="bar"></span><span class="percent">0%</span >
						</div>
						<div class="files">
							请选择jpg,png类型图片。
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

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
	<div class="row-fluid xgxdiv">
		<h4 class="xgxtitle">团队信息</h4>
	</div>
	<div class="row">

		<div class="col-md-3 col-md-offset-1">
			<div class="logo">
				<img src="" id="logo" class="img-rounded img-thumbnail">

			<div class="logobtn">
				<button class="btn btn-success" id="btn_upload" type="button">上传Logo</button>
			</div>
		</div>
		</div>
		<form action="{{ URL('/admin/team/'.$team->id) }}" method="post" name="formchange" class="form-horizontal teamedit">
			<div class="col-md-8">
				<div class="form-group">
					<label class="col-md-3 control-label">团队名称</label>
					<div class="col-md-7">
						<input type="text" class="form-control finput" name="team_name" id="team_name" value="{{ $team->name }}" required="required" maxlength="20"/ placeholder="不超过20个字符">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">所属高校</label>
					<div class="col-md-7">
						<input type="text" name="school" id="school-name" value="{{$team->univ->name}}" class="form-control school finput">

					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">参赛题目</label>
					<div class="col-md-7">
						<input type="text" class="form-control finput" name="team_title" id="team_title" value="{{ $team->title }}" maxlength="30"/ placeholder="不超过30个字符">
					</div>
				</div>
	
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input name="_method" type="hidden" value="PUT">
				<div class="form-group">
					<div class="col-md-9 col-md-offset-3">
						<input class="btn btn-success" type="submit" id="save" value="保存" onclick="save()">
					</div>
				</div>

			</form>
		</div>
	</div>
	<div class="row-fluid xgxdiv">
		<h4 class="xgxtitle">成员信息</h4> <a href="{{url('/admin/team/add')}}"><i class="glyphicon glyphicon-user"></i>添加</a>
	</div>
	<div class="row-fluid">
		<table class="table table-hover table-striped ">
			<thead>
			<tr class="row">
				<th class="col-xs-3">姓名</th>
				<th class="col-xs-3">学校</th>
				<th class="col-xs-2">学院</th>
				<th class="col-xs-2">类别</th>
				<th class="col-xs-2">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($members as $member)
			<tr class="row">
				<td class="col-xs-3">
					{{ $member->name }}
				</td>
				<td class="col-xs-3">
					{{ $member->univ->name }}
				</td>
				<td class="col-xs-2">
					{{ $member->college }}
				</td>
				@if ($member->leader)
				<td class="col-xs-2">
					队长
				</td>
				@else
				<td class="col-xs-2">
					队员
				</td>
				@endif
			<td class="col-xs-2">
				<a href="{{ URL('admin/member/'.$member->id.'/edit') }}" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
				<form action="{{ URL('admin/member/'.$member->id) }}" method="POST" style="display: inline;" onsubmit="return(delconfirm())">
					<input name="_method" type="hidden" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn btn-danger del"><i class="glyphicon glyphicon-trash"></i></button>
				</form>
			</td>

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
				<a href="{{ URL('admin/teacher/'.$teacher->id.'/edit') }}" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
				<form action="{{ URL('admin/teacher/'.$teacher->id) }}" method="POST" style="display: inline;" onsubmit="return(delconfirm())" class="form">
					<input type="hidden" id="teacher_count" value="{{$teachers->count()}}">
					<input name="_method" type="hidden" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button class="btn btn-danger del" type="submit"><i class="glyphicon glyphicon-trash"></i></button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
	</table>
</div>

</div>
@endsection
</p>