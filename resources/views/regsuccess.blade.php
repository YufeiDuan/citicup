@extends('reg')
	@section('title')
	创建团队
	@endsection
	@section('content')
	
		<div class="alert alert-info">
			<ul>
				<li><h4>注册成功</h4></li>
				<li><h5>请查看邮件，验证邮箱后进行下一步操作。</h5></li>
				<li><h5><a href="{{ url('/reg/resend') }}">点击重新发送邮件</a></h5></li>

					@if(!empty($info))
						<br>
						<li>
							{{$info}}
						</li>
					@endif
				
			</ul>
@endsection