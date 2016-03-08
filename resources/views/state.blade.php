<p>@extends('home')
	@section('rightcontent')
	<div class="container-fluid">
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</div>
	</div>
@endsection
</p>