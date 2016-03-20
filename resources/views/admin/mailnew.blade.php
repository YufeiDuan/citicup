、<p>@extends('admin.mail')
	@section('rightcontent')
	<script src="/js/inbox.js"></script>
	<script type="text/javascript">
		$(function(){
			var recv = {{$recv}};
			$("[name = chkItem]:checkbox").each(function () {
		        if($(this).val()==recv){
		            $(this).prop("checked", true);
		        }
		    });
		});
		function send(){
			$('#recvlist').val(getChecked());
			return true;
		}
	</script>
	<div class="container-fluid">
		<form class="form-horizontal" method="post" action="/admin/mail" onsubmit="return(send())">
			<div class="col-md-7">
				<div class="row" style="margin-bottom:5px;font-size:15px;">
					<button class="btn btn-success btn-sm" type="submit">发送</button>
				</div>
				<div class="row" style="font-size:15px;line-height:25px;">
					<div class="form-group">
						<label class="col-md-2 control-label">主题</label>
						<div class="col-md-10">
							<input type="text" name="subject" id="subject" class="form-control" maxlength="25" value="{{$subject}}" placeholder="此处输入邮件主题">
						</div>
					</div>
					<p>
					<textarea name="content" id="content" class="form-control" rows="10" maxlength="250" placeholder="此处输入邮箱正文"></textarea>
					</div>
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="recvlist" id="recvlist">
			</form>
			<div class="col-md-4" style="border:solid 1px #dddddd;margin-left:5px;margin-top:20px;height:260px;overflow-y:scroll">
				选择收件人
				<table class="table table-striped table-hover" style="font-size:13px;">
					<thead>
						<th class="row">
							<td class="col-md-1">
								<input id="checkAll" type="checkbox" />
							</td class="col-md-11">
							<td class="col-md-10">团队名称</td>
						</th>
					</thead>
					<tbody>
						@foreach( $teams as $team)
						<tr class="row">
							<td class="col-md-1">
								<input name="chkItem" type="checkbox" value="{{$team->id}}" onclick="checkchange()"/></td>
							<td class="col-md-11">
								{{$team->name}}
							</td>
						</tr>
						@endforeach
					</tbody>
					</table>
				</div>
			</div>
			@endsection
		</p>