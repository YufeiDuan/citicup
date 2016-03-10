<p>@extends('mail')
	@section('rightcontent')

	<div class="container-fluid">
		<div class="row">
			<a href="{{ $back }}">返回</a>
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