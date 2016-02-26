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
			<form id="op" action="" method="post" onsubmit="return(empcheck())">
				<input id="method" name="_method" type="hidden">
				<input type="hidden" name="tag" id="op_tag">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button class="btn" onclick="delmail()" type="button">删除</button>
				<button class="btn" onclick="setread()" type="button">标记为已读</button>
			</form>

			
		</div>
		<div class="row">
			@if (count($inbox)==0)
					没有收到任何消息。
			@else
			<table class="table table-striped" id="inbox">
				<form id="show" action="/mail/view" method="get">
					<input type="hidden" id="tag" name="tag">
				</form>
				<tr class="row">
					<th class="col-xs-1">
						<input id="checkAll" type="checkbox" />
					</th>
					<th class="col-xs-2">发件人</th>
					<th class="col-xs-6">主题</th>
					<th class="col-xs-3">时间</th>
				</tr>
				@foreach ($inbox as $mail)
				<tr class="row">
					<td class="col-xs-1 check">
						<input name="chkItem" type="checkbox" value="{{$mail->uid}}" onclick="checkchange()"/>
					</td>
					@if (!$mail->flag_read)
						<td class="col-xs-2 ctb">
							<b>{{ $mail->sender->name }}</b>
						</td>
						<td class="col-xs-6 ctb">
							<b>{{ $mail->subject }}-{{mb_substr($mail->content,0,25-count($mail->subject))}}...</b>
						</td>
						<td class="col-xs-3 ctb">
							<b>{{ $mail->created_at }}</b>
						</td>
					@else
						<td class="col-xs-2 ctb">
							{{ $mail->sender->name }}
						</td>
						<td class="col-xs-5 ctb">
							{{ $mail->subject }}-{{mb_substr($mail->content,0,25-count($mail->subject))}}...
						</td>
						<td class="col-xs-3 ctb">
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