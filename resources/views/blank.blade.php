<div style="height:200px">
	
</div>
<div style="text-align:center">
	<h2>版权所有：西安交通大学软件学院</h1>
		@if (count($errors) > 0)
						<div class="alert alert-info">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
</div>
