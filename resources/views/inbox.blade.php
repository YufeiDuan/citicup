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
			<form id="op" action="" method="post" onsubmit="return(empcheck())">
				<input id="method" name="_method" type="hidden">
				<input type="hidden" name="tag" id="op_tag">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<a href='#' onclick="delmail()"><i class="glyphicon glyphicon-trash"></i>删除</a>
				<a href='#' onclick="setread()" style="margin-left:15px;"><i class="glyphicon glyphicon-envelope"></i>标记为已读</a>
			</form>

			
		</div>
		<div class="row row-fluid">
			@if (count($inbox)==0)
				<div class="alert alert-info">
					没有收到任何消息。
				</div>

			@else
			<table class="table table-striped table-hover" id="inbox">
				<form id="show" action="/mail/view" method="get">
					<input type="hidden" name="f" value="/mail">
					<input type="hidden" id="tag" name="tag">
				</form>
				<thead>
				<tr class="row">
					<th class="col-xs-1">
						<input id="checkAll" type="checkbox" />
					</th>
					<th class="col-xs-2">发件人</th>
					<th class="col-xs-6">主题</th>
					<th class="col-xs-3">时间</th>
				</tr>
				</thead>
				<tbody>
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
				</tbody>
			</table>
			@endif
		</div>
		</div>

		@endsection
	</p>