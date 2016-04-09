<p>@extends('home')
	@section('rightcontent')
	<div class="container-fluid">
		
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<div class="alert alert-info">
			{{$infos}}
		</div>
	</div>
		@endsection
	</p>