<p>@extends('mail')
	@section('rightcontent')

	<div class="container-fluid">
		<div class="row">
			<button class="btn" onclick="location='/mail'">返回</button>
		</div>
		<div class="row">
			<h4>{{$mail->subject}}</h4>
		</div>
		<div class="row">
			发件人：{{$mail->sender->name}}
		</div>
		<div class="row">
			时  间：{{$mail->created_at}}
		</div>
		<div class="row">
			{{$mail->content}}
		</div>	
	</div>

		@endsection
	</p>