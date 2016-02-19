<p>@extends('mail')
	@section('rightcontent')
	<script src="/js/inbox.js"></script>

	<div class="container-fluid">
		@if (count($errors) > 0)
		<div class="alert alert-info">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<div class="row">
			<form id="op" action="/mail/del" method="post">
				<input type="hidden" name="tag" id="op_tag">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button class="btn" onclick="dels()">删除</button>
			</form>

			
		</div>
		<div class="row">
			@if (count($outbox)==0)
					没有发送任何消息。
			@else
			<table class="table table-striped" id="inbox">
				<form id="show" action="/mail/view" method="get">
					<input type="hidden" id="tag" name="tag">
				</form>
				<tr class="row">
					<th class="col-xs-1">
						<input id="checkAll" type="checkbox" />
					</th>
					<th class="col-xs-2">收件人</th>
					<th class="col-xs-6">主题</th>
					<th class="col-xs-3">时间</th>
				</tr>
				@foreach ($outbox as $mail)
				<tr class="row">
					<td class="col-xs-1 check">
						<input name="chkItem" type="checkbox" value="{{$mail->uid}}" onclick="checkchange()"/>
					</td>
					<td class="col-xs-2 ctb">
						{{ $mail->receiver->name }}
					</td>
					<td class="col-xs-5 ctb">
						{{ $mail->subject }}-{{mb_substr($mail->content,0,25-count($mail->subject))}}...
					</td>
					<td class="col-xs-3 ctb">
						{{ $mail->created_at }}
					</td>
				</tr>
				@endforeach
			</table>
			@endif
		</div>
		</div>

		@endsection
	</p>