<p>@extends('home')
	@section('rightcontent')
	<script src="/js/team.js"></script>
	<script src="/js/school.js"></script>
	<script src="/js/choose_school.js"></script>
	<link rel="stylesheet" href="/css/team.css" type="text/css" />
	<div class="container">
		<div class="row">
			<div id="choose-box-wrapper">
				<div id="choose-box">
					<div id="choose-box-title">
						<span>选择学校</span>
					</div>
					<div id="choose-a-province">
					</div>
					<div id="choose-a-school">
					</div>
					<div id="choose-box-bottom">
						<input type="botton" onclick="hide()" value="关闭" />
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			团队信息 <a href="#" onclick="display()">修改</a>
		</div>
		<div class="row">
			<form action="{{ URL('/team/1') }}" method="post" enctype="multipart/form-data" name="formchange" onsubmit="return(check())">
				<div class="col-xs-3">
					<div>
						<img src="/logo">
					</div>
					<div>
						<input id="upload" type="file" name="upload" value="" accept=".jpg,.jpeg,.png">
					</div>
				</div>
				<div class="col-xs-5">
					<table class="table">
					<tr class="row"></tr>
					<tr class="row">
						<td>团队名称：</td>
						<td>
							<input type="text" name="team_name" id="team_name" value="{{$team->name}}" onkeyup="value=value.replace(/[^\a-\z\A-\Z0-9\u4E00-\u9FA5\@\.]/g,'')" onblur="if(this.value.replace(/^ +| +$/g,'')=='')alert('不能为空!')" maxlength="20"/>
							<span class="tips">不超过20个字符</span>
						</td>
					</tr>
					<tr class="row">
						<td>所属高校：</td>
						<td class="hrefselect">
							<input type="text" name="school" id="school-name" value="{{$univ->name}}" onclick="pop()" readonly="readonly">
							<input type="hidden" id="univ_sel" name="univ_sel" value="{{$univ->id}}">
						</td>
					</tr>
					<tr class="row">
						<td>参赛题目：</td>
						<td>
							<input type="text" name="team_title" id="team_title" value="{{$team->title}}" onkeyup="value=value.replace(/[^\a-\z\A-\Z0-9\u4E00-\u9FA5\@\.]/g,'')" onblur="if(this.value.replace(/^ +| +$/g,'')=='')alert('不能为空!')" maxlength="30"/>
							<span class="tips">不超过30个字符</span>
						</td>
					</tr>
				</table>
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input name="_method" type="hidden" value="PUT">
				<input type="submit" id="save" value="保存" onclick="save()">
			</form>
		</div>
	</div>
	<div class="row">
		成员信息 <a href="{{url('/team/add')}}">添加</a>
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
					<a href="{{ URL('member/'.$member->id.'/edit') }}" class="btn btn-success">改</a>
					<form action="{{ URL('member/'.$member->id) }}" method="POST" style="display: inline;">
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
					<a href="{{ URL('teacher/'.$teacher->id.'/edit') }}" class="btn btn-success">改</a>
					<form action="{{ URL('teacher/'.$teacher->id) }}" method="POST" style="display: inline;" onsubmit="return(delcheck())">
						<input type="hidden" id="teacher_count" value="{{$teachers->count()}}">
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