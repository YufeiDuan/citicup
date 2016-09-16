<p>@extends('home')
	@section('head')
	<meta name="file_token" content="">
	@endsection
	@section('rightcontent')
	<link rel="stylesheet" href="/css/report.css" type="text/css" />
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
							<div class="btni">
								<span>添加附件</span>
								
								<input id="fileupload" type="file" name="document">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							</form>
						</div>
						<div class="progress">
							<span class="bar"></span><span class="percent">0%</span >
						</div>
						<div class="files">
							建议使用英文文件名, 文件大小不超过256MB.
						</div>
					</div>
					<div class="modal-footer">
						
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
	<div class="row-fluid xgxdiv">
		<h4 class="xgxtitle">最终作品</h4> <a href="#" onclick="pop()"><i class="glyphicon glyphicon-upload"></i>上传</a>
		<span style="float:right;">
			<a href="/commitment"><i class="glyphicon glyphicon-download"></i>参赛承诺书</a>
			&nbsp;&nbsp;
			{{-- <a href="/template"><i class="glyphicon glyphicon-download"></i>文档模板下载</a></span> --}}



	</div>
	<div class="row-fluid">
		@if (count($documents)==0)
			<div class="alert alert-info">
				未提交任何作品。
			</div>
		@else
		<table class="table table-striped table-hover">
			<thead>
			<tr class="row">
				<th class="col-md-5">文件名</th>
				<th class="col-md-2">文档类型</th>
				<th class="col-md-4">上传时间</th>
				<th class="col-md-1">操作</th>
			</tr>
			</thead>
			<tbody>
			@foreach ($documents as $k=>$doc)
			<tr class="row">
				<td class="col-md-5">
					{{ $doc->path }}
				</td>
				<td class="col-md-2">
					{{ $doc->type->name }}
				</td>
				<td class="col-md-4">
					{{ $doc->updated_at }}
				</td>
				<td class="col-md-1">
					<form action="{{ URL('document/'.$doc->id) }}" method="POST" style="display: inline;" onsubmit="return(delconfirm())">
						<input name="_method" type="hidden" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
					</form>
				</td>
			</tr>
			@endforeach
			</tbody>
		</table>
		@endif
	</div>
	<div class="row-fluid">
	<div class="alert alert-info">
		<ul>
			<li>若文件过大，可将作品上传至云盘，并在本页面上传保存有链接地址的文本文件。</li>
			<li>提交作品前，请先下载<a href="/commitment">参赛承诺书</a>（请直接右键另存下载，勿使用迅雷等下载工具），签名后将扫描件上传。</li>
			<li>项目花絮为不计分项，其余类别都为最终作品必需项。</li>
			<li>最终作品的每种文档类型只保留最新一次上传的文档。</li>
			<li>请在网络条件较好的环境下上传作品。</li>
			<li>请避免在临近截止时刻上传作品，以免网络拥堵，给您造成不便。</li>
			<li>最终作品将于2016年9月17日0时0分截止提交。</li>
		</ul>
	</div>
</div>
</div>

</div>
@endsection
</p>
