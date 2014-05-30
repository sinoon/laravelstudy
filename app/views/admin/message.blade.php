@extends('admin.base')

@section('content')

	<div class="col-xs-12">
		<form class="form-horizontal" role="form">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 接受者用户名 </label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" placeholder="用户名" class="col-xs-10 col-sm-5">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 标题 </label>

				<div class="col-sm-9">
					<input type="text" id="form-field-2" placeholder="站内信标题" class="col-xs-10 col-sm-5">
				</div>
			</div>
		</form>
	</div>

	<div class="space-24"></div>
	<div class="space-24"></div>
	<div class="space-24"></div>
<div class="hr hr-double dotted"></div>	
	<div class="col-xs-12">
		<div class="wysiwyg-editor" id="editor1"></div>

		<div class="hr hr-double dotted"></div>								<!-- PAGE CONTENT ENDS -->
	</div>



		

		<div class="clearfix form-actions">
			<div class="col-md-8 col-md-offset-4">
				<button id="submit" class="btn btn-info" type="button">
					<i class="icon-ok bigger-110"></i>
					提交
				</button>

				&nbsp; &nbsp; &nbsp;
				<button class="btn" type="reset">
					<i class="icon-undo bigger-110"></i>
					重置
				</button>
			</div>
		</div>

@stop

@section('javascript')
<script type="text/javascript">
jQuery(function($) {


	function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
		else {
			console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
	}


	$('#editor1').ace_wysiwyg({
		toolbar:
		[
		'font',
		null,
		'fontSize',
		null,
		{name:'bold', className:'btn-info'},
		{name:'italic', className:'btn-info'},
		{name:'strikethrough', className:'btn-info'},
		{name:'underline', className:'btn-info'},
		null,
		{name:'insertunorderedlist', className:'btn-success'},
		{name:'insertorderedlist', className:'btn-success'},
		{name:'outdent', className:'btn-purple'},
		{name:'indent', className:'btn-purple'},
		null,
		{name:'justifyleft', className:'btn-primary'},
		{name:'justifycenter', className:'btn-primary'},
		{name:'justifyright', className:'btn-primary'},
		{name:'justifyfull', className:'btn-inverse'},
		null,
		{name:'createLink', className:'btn-pink'},
		{name:'unlink', className:'btn-pink'},
		null,
		{name:'insertImage', className:'btn-success'},
		null,
		'foreColor',
		null,
		{name:'undo', className:'btn-grey'},
		{name:'redo', className:'btn-grey'}
		],
		'wysiwyg': {
			fileUploadError: showErrorAlert
		}
	}).prev().addClass('wysiwyg-style2');

	$('[data-toggle="buttons"] .btn').on('click', function(e){
		var target = $(this).find('input[type=radio]');
		var which = parseInt(target.val());
		var toolbar = $('#editor1').prev().get(0);
		if(which == 1 || which == 2 || which == 3) {
			toolbar.className = toolbar.className.replace(/wysiwyg\-style(1|2)/g , '');
			if(which == 1) $(toolbar).addClass('wysiwyg-style1');
			else if(which == 2) $(toolbar).addClass('wysiwyg-style2');
		}
	});

	$('#submit').click(function(){
		$.post('/admin/send-message',{
			'title':$('#form-field-2').val(),
			'content':$('#editor1').html(),
			'username':$('#form-field-1').val()
		},function(data,status){
			if( status != 'success' )
			{
				remodal_alert("网络传输错误");
				return -1;
			}
			if( data == 1 )
			{
				remodal_alert("站内信发送成功！");
			}
			else
			{
				remodal_alert("站内信发送失败！");
			}

		})
		
	})

});
</script>

@stop

@section('include-js')
<script src="{{ asset('assets/js/jquery.hotkeys.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-wysiwyg.min.js') }}"></script>
<script src="{{ asset('assets/js/bootbox.min.js') }}"></script>


@stop