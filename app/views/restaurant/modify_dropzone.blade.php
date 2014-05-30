@extends('restaurant.base')

@section('include-css')
	<link rel="stylesheet" href="{{ asset('assets/css/dropzone.css') }}" />
@stop

@section('content')
	<div class="col-xs-12">
		<div id="dropzone">
			<form action="/restaurant-img-upload" class="dropzone">
				<div class="fallback">
					<input name="file" type="file" multiple="" />
				</div>
			</form>
		</div>
	</div>
@stop


@section('include-js')
	<script src="{{ asset('assets/js/dropzone.min.js') }}"></script>
@stop

@section('javascript')
<script type="text/javascript">
	$(document).ready(function(){
	try {
	  $(".dropzone").dropzone({
	  	url:"/restaurant/img-upload",
	    paramName: "file", // The name that will be used to transfer the file
	    maxFilesize: 1, // MB
	  	acceptedFiles: "image/*",
		addRemoveLinks : true,
		dictDefaultMessage :
		'<span class="bigger-150 bolder"><i class="icon-caret-right red"></i> 菜品图片上传</span> 直接拖拽文件进来 \
		<span class="smaller-80 grey">(或者点击)</span> <br /> \
		<i class="upload-icon icon-cloud-upload blue icon-3x"></i>'
	,	
		dictResponseError: '文件上传中发送错误',
		dictFileTooBig:'图片过大，最大请不要超过1M',
		dictInvalidFileType:'请上传图片类型文件',
		addRemoveLinks:'true',	
		dictFallbackMessage:'很抱歉，您的浏览器不支持此插件',
		dictFileTooBig:'抱歉，您上传的图片太大了，请不要超过1M',
		//change the previewTemplate to use Bootstrap progress bars
		previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"progress progress-small progress-striped active\"><div class=\"progress-bar progress-bar-success\" data-dz-uploadprogress></div></div>\n  <div class=\"dz-success-mark\"><span></span></div>\n  <div class=\"dz-error-mark\"><span></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>"
	  });
	} catch(e) {
	  alert('Dropzone.js does not support older browsers!');
	}
	
	});
</script>

@stop