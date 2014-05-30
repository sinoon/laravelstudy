@extends('admin.base')

@section('include-css')
<link rel="stylesheet" href="{{ asset('js/public/bootstrap3-editable/css/bootstrap-editable.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}" />

@stop


@section('content')
<div class="profile-user-info profile-user-info-striped">
	<div class="profile-info-row">
		<div class="profile-info-name"> 用户名 </div>

		<div class="profile-info-value">
			<span class="editable" id="username"> {{$restaurant->username}} </span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> 营业时间 </div>

		<div class="profile-info-value">
			<span class="editable" id="moring"> {{$restaurant->moring}}  </span>点
			至
			<span class="editable" id="night"> {{$restaurant->night}} </span>点
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> 手机号 </div>

		<div class="profile-info-value">
			<span class="editable" id="mobile"> {{$restaurant->mobile}} </span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> 座机号码 </div>

		<div class="profile-info-value">
			<span class="editable" id="phone"> {{$restaurant->phone}} </span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> 餐厅介绍 </div>

		<div class="profile-info-value">
			<span class="editable" id="about"> {{$restaurant->describe}} </span>
		</div>
	</div>
</div>

@stop


@section('javascript')
<script type="text/javascript">

$(document).ready(function(){
    var rest_id = {{$rest_id}}
	//弹出方式
	$.fn.editable.defaults.mode = 'popup';
    //用户名
     $('#username').editable({
        url: '/admin/control-restaurant',
        type: 'text',
        pk:rest_id,
        name: 'username',

    });
	  //手机号码
	  $('#mobile').editable({
        url: '/admin/control-restaurant',
	  	type:'text',
	  	name:'mobile',
        pk:rest_id,
        pk:rest_id
	  });

	  //座机号码
	  $('#phone').editable({
        url: '/admin/control-restaurant',
	  	type:'text',
        pk:rest_id,
	  	name:'phone'
	  });

	  //餐厅介绍
	  $('#about').editable({
        url: '/admin/control-restaurant',
      mode: 'inline',
      type: 'textarea',
      pk:rest_id,
      name : 'describe',
	  			//回调函数
	  			success: function(response, newValue) {

	  			}
	  		});

      $('#night').editable({
        prepend: "not selected",
        url: '/admin/control-restaurant',
        name:'night',
        pk:rest_id,
        type:"select",
        source: [
        {value: '01:00', text: '01:00 '},
        {value: '02:00', text: '02:00 '},
        {value: '03:00', text: '03:00 '},
        {value: '04:00', text: '04:00 '},
        {value: '05:00', text: '05:00 '},
        {value: '06:00', text: '06:00 '},
        {value: '07:00', text: '07:00 '},
        {value: '08:00', text: '08:00 '},
        {value: '09:00', text: '09:00 '},
        {value: '10:00', text: '10:00 '},
        {value: '11:00', text: '11:00 '},
        {value: '12:00', text: '12:00 '},
        {value: '13:00', text: '13:00 '},
        {value: '14:00', text: '14:00 '},
        {value: '15:00', text: '15:00 '},
        {value: '16:00', text: '16:00 '},
        {value: '17:00', text: '17:00 '},
        {value: '18:00', text: '18:00 '},
        {value: '19:00', text: '19:00 '},
        {value: '20:00', text: '20:00 '},
        {value: '21:00', text: '21:00 '},
        {value: '22:00', text: '22:00 '},
        {value: '23:00', text: '23:00 '}
        ]
    });    

      $('#moring').editable({
        prepend: "not selected",
        url: '/admin/control-restaurant',
        type:"select",
        pk:rest_id,
        name:'moring',
        source: [
        {value: '01:00', text: '01:00 '},
        {value: '02:00', text: '02:00 '},
        {value: '03:00', text: '03:00 '},
        {value: '04:00', text: '04:00 '},
        {value: '05:00', text: '05:00 '},
        {value: '06:00', text: '06:00 '},
        {value: '07:00', text: '07:00 '},
        {value: '08:00', text: '08:00 '},
        {value: '09:00', text: '09:00 '},
        {value: '10:00', text: '10:00 '},
        {value: '11:00', text: '11:00 '},
        {value: '12:00', text: '12:00 '},
        {value: '13:00', text: '13:00 '},
        {value: '14:00', text: '14:00 '},
        {value: '15:00', text: '15:00 '},
        {value: '16:00', text: '16:00 '},
        {value: '17:00', text: '17:00 '},
        {value: '18:00', text: '18:00 '},
        {value: '19:00', text: '19:00 '},
        {value: '20:00', text: '20:00 '},
        {value: '21:00', text: '21:00 '},
        {value: '22:00', text: '22:00 '},
        {value: '23:00', text: '23:00 '}
        ]
    });  

  });

</script>
@stop

@section('include-js')
<script src="{{ asset('assets/js/bootstrap-wysiwyg.min.js') }}"></script>
<script src="{{ asset('js/public/bootstrap3-editable/js/bootstrap-editable.min.js') }}"></script>
<script src="{{ asset('assets/js/x-editable/ace-editable.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
@stop