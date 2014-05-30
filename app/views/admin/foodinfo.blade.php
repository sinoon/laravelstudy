@extends('admin.base')

@section('include-css')
<link rel="stylesheet" href="{{ asset('js/public/bootstrap3-editable/css/bootstrap-editable.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}" />

@stop


@section('content')
<div class="profile-user-info profile-user-info-striped">
	<div class="profile-info-row">
		<div class="profile-info-name"> 菜品ID </div>

		<div class="profile-info-value">
			<span class="editable" id="food_id"> {{$food->id}} </span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> 名字 </div>

		<div class="profile-info-value">
			<span class="editable" id="name"> {{$food->name}}  </span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> 价格 </div>

		<div class="profile-info-value">
			<span class="editable" id="price"> {{$food->price}} </span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> 库存数量 </div>

		<div class="profile-info-value">
			<span class="editable" id="stock"> {{$food->stock}} </span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> 菜品介绍 </div>

		<div class="profile-info-value">
			<span class="editable" id="note"> {{$food->note}} </span>
		</div>
	</div>

    <div class="profile-info-row">
        <div class="profile-info-name"> 菜品状态 </div>

        <div class="profile-info-value">
            <span class="editable" id="status"> {{$food->status}} </span>
        </div>
    </div>
</div>

@stop


@section('javascript')
<script type="text/javascript">

$(document).ready(function(){
    var food_id = $("#food_id").html();
	//弹出方式
	$.fn.editable.defaults.mode = 'popup';
    // //菜品ID
    //  $('#food_id').editable({
    //     url: '/admin/control-food',
    //     type: 'text',
    //     pk:food_id,
    //     name: 'food_id',

    // });
	  //菜品名字
	  $('#name').editable({
        url: '/admin/control-food',
	  	type:'text',
	  	name:'name',
        pk:food_id
	  });
      
      //价格
      $('#price').editable({
        url: '/admin/control-food',
        type:'text',
        name:'price',
        pk:food_id
      });

	  //库存数量
	  $('#stock').editable({
        url: '/admin/control-food',
	  	type:'text',
        pk:food_id,
	  	name:'stock'
	  });

	  //菜品介绍
	  $('#note').editable({
        url: '/admin/control-food',
      mode: 'inline',
      type: 'textarea',
      pk:food_id,
      name : 'note',
	  			//回调函数
	  			success: function(response, newValue) {

	  			}
	  		});

      $('#status').editable({
        prepend: "not selected",
        url: '/admin/control-food',
        name:'status',
        pk:food_id,
        type:"select",
        source: [
            {value: 'Yes', text: '上线'},
            {value: 'No', text: '下线'}
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