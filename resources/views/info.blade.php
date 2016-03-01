@extends('reg')
	@section('content')
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">网站提示<ul class="nav  navbar-right">
						<li>
							<a href="{{ url('/auth/logout') }}">返回首页</a>
						</li>
						
					</ul>
				</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection