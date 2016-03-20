<p>@extends('admin.mail')
	@section('rightcontent')

	<div class="container-fluid" style="margin-left:30px;">
		<div class="col-md-10 col-md-offset-1">
		<div class="row">
			<a href="{{ $back }}"><i class="glyphicon glyphicon-chevron-left"></i>返回</a>
		</div>
		<div class="row">
			<h3><b>{{$mail->subject}}</b></h3>
		</div>
		<div class="row" style="margin-bottom:5px;font-size:15px;">
			发件人：{{$mail->sender->name}}
		</div>
		<div class="row" style="border-bottom:solid 1px #dddddd;margin-bottom:5px;font-size:15px;">
			时  间：{{$mail->created_at}}
		</div>
		<div class="row" style="font-size:15px;line-height:25px;">
			{{$mail->content}}
		</div>	
	</div>
	</div>

		@endsection
	</p>