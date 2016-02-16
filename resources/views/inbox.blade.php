<p>@extends('mail')
	@section('rightcontent')
	<link rel="stylesheet" href="/css/inbox.css" type="text/css" />
	<script src="/js/inbox.js"></script>
	<div class="modal" id="mail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">模态弹出窗标题</h4>
			</div>
			<div class="modal-body">
				<p>模态弹出窗主体内容</p>
			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>
	<div class="container-fluid">
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<div class="row">
			<button class="btn" onclick="getChecked()">删除</button>
			<button class="btn" onclick="viewmail()">标记为已读</button>
		</div>
		<div class="row">
			@if (count($inbox)==0)
					没有收到任何消息。
			@else
			<table class="table table-striped">
				<tr class="row">
					<th class="col-xs-1">
						<input id="checkAll" type="checkbox" />
					</th>
					<th class="col-xs-3">发件人</th>
					<th class="col-xs-5">主题</th>
					<th class="col-xs-3">时间</th>
				</tr>
				@foreach ($inbox as $mail)
				<tr class="row" onclick="">
					<td class="col-xs-1">
						<input name="chkItem" type="checkbox" value="{{$mail->uid}}" onclick="checkchange()"/>
					</td>
					@if (!$mail->flag_read)
						<td class="col-xs-3">
							<b>{{ $mail->sender->name }}</b>
						</td>
						<td class="col-xs-5">
							<b>{{ $mail->subject }}</b>
						</td>
						<td class="col-xs-3">
							<b>{{ $mail->created_at }}</b>
						</td>
					@else
						<td class="col-xs-2">
							{{ $mail->sender->name }}
						</td>
						<td class="col-xs-4">
							{{ $mail->subject }}
						</td>
						<td class="col-xs-2">
							{{ $mail->created_at }}
						</td>
					@endif
				</tr>
				@endforeach
			</table>
			@endif
		</div>
		</div>

		@endsection
	</p>