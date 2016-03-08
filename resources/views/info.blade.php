@extends('reg')
	@section('content')

		@if (count($errors) > 0)
			<div class="alert alert-info">
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</div>
		@endif

@endsection