<p>@extends('home')
	@section('rightcontent')
	<div class="container">
		<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
	</div>
@endsection
</p>