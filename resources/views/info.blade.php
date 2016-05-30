@extends('reg')
@section('title')2016 “花旗杯”金融创新应用大赛
@endsection
	@section('content')

		@if (count($errors) > 0)
			<div class="alert alert-info">
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</div>
		@endif

@endsection