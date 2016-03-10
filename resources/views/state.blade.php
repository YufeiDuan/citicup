<p>@extends('home')
	@section('rightcontent')
	<div class="container-fluid">
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }}
			@endforeach
		</div>
	</div>
@endsection
</p>