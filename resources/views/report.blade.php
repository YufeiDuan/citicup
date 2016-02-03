<p>@extends('home')
	@section('head')
	<meta name="file_token" content="">
	@endsection
	@section('rightcontent')
	<script src="/js/report.js"></script>
	<div class="container">
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		<div class="progress">
			<div class="progress-bar progress-bar-info" role="progressbar"
				aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
				style="" id="info">
				<span class="sr-only">30% 完成（信息）</span>
			</div>
		</div>
		<form id="form1" enctype="multipart/form-data" method="post" action="/report">
			<div class="row">
				<label for="fileToUpload">Select a File to Upload</label><br />
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="file" name="fileToUpload" id="fileToUpload" onchange="fileSelected();"/>
			</div>
			<div id="fileName"></div>
			<div id="fileSize"></div>
			<div id="fileType"></div>
			<div class="row">
				<input type="button" onclick="uploadFile()" value="Upload" />
			</div>
			<div id="progressNumber"></div>
		</form>
		
	</div>
	@endsection
</p>