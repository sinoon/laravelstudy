var alertremodel = $.remodal.lookup[$('[data-remodal-id=alertremodel]').data('remodal')];
var remodelsuccess = $.remodal.lookup[$('[data-remodal-id=remodelsuccess]').data('remodal')];
var remodelfalis = $.remodal.lookup[$('[data-remodal-id=remodelfalis]').data('remodal')];
var gotowork = $.remodal.lookup[$('[data-remodal-id=gotowork]').data('remodal')];
var notowork = $.remodal.lookup[$('[data-remodal-id=notowork]').data('remodal')];

$("#profilechange1").click(function(){
	alertremodel.open();
	$.post("restaurant/profile-change-left" ,{
		'restaurantname' : $("input[name=restaurantname]").val(),
		'moring' 	 : $("input[name=moring]").val(),
		'night'	     : $("input[name=night]").val(),
		'describe'   : $("textarea[name=describe]").val(),
		'mobile'     : $("input[name=mobile]").val(),
		'phone'      : $("input[name=phone]").val(),
	} , function(data,status) {
		alertremodel.close();
		if(data == 1)
		{
			window.location.reload();//重载页面
			remodelsuccess.open();//提示成功
		}
		if(data == -1)
		{
			remodelfalis.open();
		}
	} )
})

$("#profilechange2").click(function(){
	alertremodel.open();
	$.post("restaurant/profile-change-right" ,{
		'typeofdemand' : $("select#form-field-select-1").val(),
		'demandfornum' 	 : $("input[name=demandfornum]").val(),
		'demandformoney'	     : $("input[name=demandformoney]").val(),
		'address'   : $("textarea[name=address]").val(),
	} , function(data,status) {
		alertremodel.close();
		if(data == 1)
		{
			window.location.reload();//重载页面
			remodelsuccess.open();//提示成功
		}
		if(data == -1)
		{
			remodelfalis.open();
		}
	} )
})

//时间选择器
$('#moring').timepicker({
	minuteStep: 1,
	showSeconds: false,
	showMeridian: false
}).next().on(ace.click_event, function(){
	$(this).prev().focus();
});

$('#night').timepicker({
	minuteStep: 1,
	showSeconds: false,
	showMeridian: false
}).next().on(ace.click_event, function(){
	$(this).prev().focus();
});


$("#changestatus").click(function(){
	var data = 1;
	$.post("restaurant/changestatus" ,{
		'restaurantname' : $("input[name=restaurantname]").val(),
	} , function(data,status) {
		alertremodel.close();
		if(data == 1)
		{
			window.location.reload();//重载页面
			gotowork.open();//提示成功
		}
		if(data == -1)
		{
			window.location.reload();//重载页面
			notowork.open();
		}
	} )
})


$("select#form-field-select-1").change(function(){
  if($(this).val() == '1')    //有起送要求
  {
    $("div#demandfornum").slideDown();
    $("div#demandformoney").slideUp();
  }
  else if($(this).val() == '2') //无起送要求
  {
    $("div#demandformoney").slideDown();
    $("div#demandfornum").slideUp();
  }
  else  //其他情况
  {
  	$("div#demandformoney").slideUp();
  	$("div#demandfornum").slideUp();
  }
  // alert($(this).val());
})

