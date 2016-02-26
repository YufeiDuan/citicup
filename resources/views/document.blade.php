<p>@extends('home')
	@section('head')
	<meta name="file_token" content="">
	@endsection
	@section('rightcontent')
	<link rel="stylesheet" href="/css/report.css" type="text/css" />
	<link rel="stylesheet" href="/css/document.css" type="text/css" />
	<script src="/js/jquery.form.js"></script>
	<script src="/js/document.js"></script>
	<div class="container-fluid">
		<div class="modal" id="upload_modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" onclick="hide()" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">上传文件</h4>
					</div>
					<div class="modal-body">
						<form id='myupload' action='/document' method='post' enctype='multipart/form-data'>
							上传文档类别：<select id="upload_type" name="upload_type">
								
							</select>
							<br>
							<div class="btn">
								<span>添加附件</span>
								
								<input id="fileupload" type="file" name="document">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							</form>
						</div>
						<div class="progress">
							<span class="bar"></span><span class="percent">0%</span >
						</div>
						<div class="files"></div>
					</div>
					<div class="modal-footer">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	@if (count($errors) > 0)
	<div class="row-fluid">
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
</div>
	@endif
	<div class="row-fluid">
		最终作品
		<a href="#" onclick="pop()">上传</a>
		<span><a href="/template">文档模板下载</a></span>
	</div>
	<div class="row-fluid">
		@if (count($documents)==0)
		还没有提交任何作品。
		@else
		<table class="table table-striped">
			<tr class="row">
				<th class="col-xs-1">序号</th>
				<th class="col-xs-2">文件名</th>
				<th class="col-xs-2">文档类型</th>
				<th class="col-xs-3">上传时间</th>
				<th class="col-xs-2">操作</th>
			</tr>
			
			@foreach ($documents as $k=>$doc)
			<tr class="row">
				<td class="col-xs-1">
					{{ $k+1 }}
				</td>
				<td class="col-xs-2">
					{{ $doc->path }}
				</td>
				<td class="col-xs-2">
					{{ $doc->type->name }}
				</td>
				<td class="col-xs-3">
					{{ $doc->updated_at }}
				</td>
				<td class="col-xs-2">
					<form action="{{ URL('document/'.$doc->id) }}" method="POST" style="display: inline;" onsubmit="return(delconfirm())">
						<input name="_method" type="hidden" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit" class="btn btn-danger">删</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
		@endif
	</div>
	<div class="row-fluid">
	<div class="alert alert-info">
		<ul>
			<li>最终作品的每种文档类型只保留最新一次上传的文档。</li>
			<li>最终作品将于2016年9月1日0时0分截止提交。</li>
		</ul>
	</div>
</div>
</div>

</div>
@endsection
</p>