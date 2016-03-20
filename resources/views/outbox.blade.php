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
		<div class="row row-fluid">
			<form id="op" action="/mail/del" method="post" onsubmit="return(empcheck())">
				<input type="hidden" name="tag" id="op_tag">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<a href='#' onclick="dels()"><i class="glyphicon glyphicon-trash"></i>删除</a>
			</form>

			
		</div>
		<div class="row row-fluid">
			@if (count($outbox)==0)
				<div class="alert alert-info">
					没有发送任何消息。
				</div>
			@else
			<table class="table table-striped" id="inbox">
				<form id="show" action="/mail/view" method="get">
					<input type="hidden" id="tag" name="tag">
					<input type="hidden" name="f" value="/mail/outbox">
				</form>
				<thead>
					<tr class="row">
						<th class="col-xs-1">
							<input id="checkAll" type="checkbox" />
						</th>
						<th class="col-xs-2">收件人</th>
						<th class="col-xs-6">主题</th>
						<th class="col-xs-3">时间</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($outbox as $mail)
					<tr class="row">
						<td class="col-xs-1 check">
							<input name="chkItem" type="checkbox" value="{{$mail->uid}}" onclick="checkchange()"/>
						</td>
						<td class="col-xs-2 ctb">
							{{ $mail->receiver->name }}
						</td>
						<td class="col-xs-5 ctb">
							{{ $mail->subject }} - {{mb_substr($mail->content,0,15)}}...
						</td>
						<td class="col-xs-3 ctb">
							{{ $mail->created_at }}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif
		</div>
		</div>

		@endsection
	</p>