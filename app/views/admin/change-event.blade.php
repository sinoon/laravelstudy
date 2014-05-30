@extends('admin.base')

@section('content')

	<div class="col-xs-12">
		<form class="form-horizontal" role="form">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 标题 </label>

				<div class="col-sm-9">
					<input value="{{$event->title}}" type="text" id="form-field-2" placeholder="网站活动标题" class="col-xs-10 col-sm-5">
				</div>
			</div>
		</form>
	</div>

	<div class="space-24"></div>
	<div class="space-24"></div>
	<div class="space-24"></div>

	<div class="hr hr-double dotted"></div>	

	<div class="col-xs-12">
		<div class="wysiwyg-editor" id="editor1">
			{{$event->content}}
		</div>

		<div class="hr hr-double dotted"></div>								<!-- PAGE CONTENT ENDS -->
	</div>

	<div class="clearfix form-actions">
		<div class="col-md-8 col-md-offset-4">
			<button id="submit" class="btn btn-info" type="button">
				<i class="icon-ok bigger-110"></i>
				提交
			</button>

			&nbsp; &nbsp; &nbsp;
			<button id="delete" class="btn" type="reset">
				<i class="icon-undo bigger-110"></i>
				删除该活动
			</button>
		</div>
	</div>

@stop

@section('javascript')
<script type="text/javascript">
jQuery(function($) {

	var event_id = {{$event_id}}

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
		$.post('/admin/change-event',{
			'title':$('#form-field-2').val(),
			'content':$('#editor1').html(),
			'event_id':event_id
		},function(data,status){
			if( status != 'success' )
			{
				remodal_alert("网络传输错误");
				return -1;
			}
			if( data == 1 )
			{
				remodal_alert("网站活动修改成功！");
			}
			else
			{
				remodal_alert("网站活动修改失败！");
			}

		});
	});

	$("#delete").click(function(){

		$.post('/admin/delete-event',{
			'event_id':event_id
		},function(data,status){
			if( status != "success" )
			{
				remodal_alert("网络传输错误");
				return -1;
			}

			if( data == 1 )
			{
				//成功删掉
				//跳转  带 / 表示从根目录算
				window.location.href='/admin/event';
			}

			if( data == 2 )
			{
				remodal_alert("删除活动失败");
				return -1;
			}

		});
	});
});
</script>

@stop

@section('include-js')
<script src="{{ asset('assets/js/jquery.hotkeys.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-wysiwyg.min.js') }}"></script>
<script src="{{ asset('assets/js/bootbox.min.js') }}"></script>


@stop