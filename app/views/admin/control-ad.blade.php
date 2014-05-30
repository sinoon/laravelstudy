@extends('admin.base')

@section('content')
<div class="col-xs-12">
	<!-- <form class="form-horizontal" role="form"> -->
	{{Form::open(array('class' => 'form-horizontal','files' => true))}}
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 广告链接地址 </label>

			<div class="col-sm-9">
				<input name="link" type="text" id="form-field-1" placeholder="链接地址" class="col-xs-10 col-sm-5">
			</div>
		</div>
		<div class="col-sm-5 col-sm-offset-3">
			<input multiple="" name="adimg" type="file" id="id-input-file-3" />
			<input type="submit" class="btn btn-primary" value="提交">
		</div>
{{Form::close()}}
	<!-- </form> -->
</div>
@stop

@section('javascript1')
	<script>
		jQuery(function($) {

				$('#id-input-file-3').ace_file_input({
					url:'/test',
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'icon-cloud-upload',
					droppable:true,
					thumbnail:'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});


		});
	</script>
@stop