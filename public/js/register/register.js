// function change_code(obj) {
// 	$('#code').attr("src","http://localhost/captcha");
// 	return false;
// }

// $("a#captcha").click(function(){
// 	$("#code").attr("src","/captcha");
// });

/**************************************验证码*****************************************************************/



// (function(e,t,n,r){function o(t,n){this.$element=e(t);this.settings=e.extend({},s,n);this.init()}var i="floatlabel",s={slideInput:true,labelStartTop:"20px",labelEndTop:"10px",transitionDuration:.3,transitionEasing:"ease-in-out",labelClass:"",typeMatches:/text|password|email|number|search|url/};o.prototype={init:function(){var e=this;var n={"-webkit-transition":"all "+this.settings.transitionDuration+"s "+this.settings.transitionEasing,"-moz-transition":"all "+this.settings.transitionDuration+"s "+this.settings.transitionEasing,"-o-transition":"all "+this.settings.transitionDuration+"s "+this.settings.transitionEasing,"-ms-transition":"all "+this.settings.transitionDuration+"s "+this.settings.transitionEasing,transition:"all "+this.settings.transitionDuration+"s "+this.settings.transitionEasing};if(this.$element.prop("tagName").toUpperCase()!=="INPUT"){return}if(!this.settings.typeMatches.test(this.$element.attr("type"))){return}var r=this.$element.attr("id");if(!r){r=Math.floor(Math.random()*100)+1;this.$element.attr("id",r)}var i=this.$element.attr("placeholder");var s=this.$element.data("label");var o=this.$element.data("class");if(!o){o=""}if(!i||i===""){i="You forgot to add placeholder attribute!"}if(!s||s===""){s=i}this.inputPaddingTop=parseFloat(this.$element.css("padding-top"))+10;this.$element.wrap('<div class="floatlabel-wrapper" style="position:relative"></div>');this.$element.before('<label for="'+r+'" class="label-floatlabel '+this.settings.labelClass+" "+o+'">'+s+"</label>");this.$label=this.$element.prev("label");this.$label.css({position:"absolute",top:this.settings.labelStartTop,left:this.$element.css("padding-left"),display:"none","-moz-opacity":"0","-khtml-opacity":"0","-webkit-opacity":"0",opacity:"0"});if(!this.settings.slideInput){this.$element.css({"padding-top":this.inputPaddingTop})}this.$element.on("keyup blur change",function(t){e.checkValue(t)});t.setTimeout(function(){e.$label.css(n);e.$element.css(n)},100);this.checkValue()},checkValue:function(e){if(e){var t=e.keyCode||e.which;if(t===9){return}}var n=this.$element.data("flout");if(this.$element.val()!==""){this.$element.data("flout","1")}if(this.$element.val()===""){this.$element.data("flout","0")}if(this.$element.data("flout")==="1"&&n!=="1"){this.showLabel()}if(this.$element.data("flout")==="0"&&n!=="0"){this.hideLabel()}},showLabel:function(){var e=this;e.$label.css({display:"block"});t.setTimeout(function(){e.$label.css({top:e.settings.labelEndTop,"-moz-opacity":"1","-khtml-opacity":"1","-webkit-opacity":"1",opacity:"1"});if(e.settings.slideInput){e.$element.css({"padding-top":e.inputPaddingTop})}},50)},hideLabel:function(){var e=this;e.$label.css({top:e.settings.labelStartTop,"-moz-opacity":"0","-khtml-opacity":"0","-webkit-opacity":"0",opacity:"0"});if(e.settings.slideInput){e.$element.css({"padding-top":parseFloat(e.inputPaddingTop)-10})}t.setTimeout(function(){e.$label.css({display:"none"})},e.settings.transitionDuration*1e3)}};e.fn[i]=function(t){return this.each(function(){if(!e.data(this,"plugin_"+i)){e.data(this,"plugin_"+i,new o(this,t))}})}})(jQuery,window,document)

$(document).ready(function(){
  //Floatlabel
  // $('input').floatlabel();
  // // $('a, button').click(function(e){
  // //   e.preventDefault();
  });

/**************************************输入框提示**********************************************************************/

var TempForUsernameTips;

//   $("span#for-username").hover(
//   	function(){
//   		TempForUsernameTips = layer.tips('你瞧那远古的光/裸露空荡/无穷无尽是你深邃的眼/传递遐想 ——《远与暗》 写于2012·春·杭州', this, {
//   		        guide: 2,
//   		        // time: 0,
//   		        style: ['background-color:#F26C4F; color:#fff', '#F26C4F'],
//   		        maxWidth:240
//   		        });
//   	},
//   	function(){
//   		layer.close(TempForUsernameTips);
//   		// layer.tips('Hello tips!', '#test5', {time: 2});
//   	}
// )

////////////////////////////////////////////username///////////////////////////////////////////////////////////////////
$("input#username").focus(function(){
	  		TempForUsernameTips = layer.tips('用户名可以采用字母、数字等组合，最短6位，最长12位', this, {
  		        guide: 2,
  		        // time: 0,
  		        style: ['background-color:#F26C4F; color:#fff', '#F26C4F'],
  		        maxWidth:240
  		        });
})

$("input#username").blur(function(){
	layer.close(TempForUsernameTips);
})
////////////////////////////////////////////end of username//////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var TempForPasswordTips;

$("input#password").focus(function(){
	  		TempForPasswordTips = layer.tips('密码可以采用字母、数字等组合，最短6位，最长12位', this, {
  		        guide: 2,
  		        // time: 0,
  		        style: ['background-color:#F26C4F; color:#fff', '#F26C4F'],
  		        maxWidth:240
  		        });
})

$("input#password").blur(function(){
	layer.close(TempForPasswordTips);
})

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/************************************结束输入框提示************************************************************************/

  $("span#for-username").click(function(){
  	// $("div#for-username").fadeToggle();


  })
  

/************************************日历************************************************************************/



  // var calendarPicker1 = $("#calendarFilterBox1").calendarPicker({
  //   monthNames:["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
  //   dayNames: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
  //   //useWheel:true,
  //   //callbackDelay:500,
  //   //years:1,
  //   //months:3,
  //   //days:4,
  //   //showDayArrows:false,
  //   callback:function(cal) {
  //     $("#wtf").html("Selected date: " + cal.currentDate);
  //   }});

  // var calendarPicker2 = $("#calendarFilterBox2").calendarPicker({
  //   monthNames:["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
  //   dayNames: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
  //   // useWheel:true,
  //   //callbackDelay:500,
  //   years:2,
  //   months:4,
  //   days:5,
  //   showDayArrows:false,
  //   callback:function(cal) {
  //     $("#wtf").html("Selected date: " + cal.currentDate);
  //   }});

$(function() {
    $("#mydate").datepicker({
    	changeMonth: true,
      changeYear: true,
      yearRange:'c-50:c+0'  ,       //找了好久啊！早说啊 范例中都没有这说明
      dateFormat: "yy-mm-dd"        //设置日期格式
    });
  });
/************************************************************************************************/


var TempForRestaurantnameTips;

$("input#restaurantname").focus(function(){
        TempForRestaurantnameTips = layer.tips('请输入餐厅的名字，24个字符，一个汉字占2个字符', this, {
              guide: 2,
              // time: 0,
              style: ['background-color:#F26C4F; color:#fff', '#F26C4F'],
              maxWidth:240
              });
})

$("input#restaurantname").blur(function(){
  layer.close(TempForRestaurantnameTips);
})


/************************************************************************************************/

var TempForDemandForNumTips;

$("input#demandfornum").focus(function(){
        TempForDemandForNumTips = layer.tips('请输入起送要求的数量即可，只接受数字', this, {
              guide: 2,
              // time: 0,
              style: ['background-color:#F26C4F; color:#fff', '#F26C4F'],
              maxWidth:240
              });
})

$("input#demandfornum").blur(function(){
  layer.close(TempForDemandForNumTips);
})

/************************************************************************************************/

var TempForDemandForMoneyTips;

$("input#demandformoney").focus(function(){
        TempForDemandForMoneyTips = layer.tips('请输入起送要求的价钱，只接受数字，单位：元', this, {
              guide: 2,
              // time: 0,
              style: ['background-color:#F26C4F; color:#fff', '#F26C4F'],
              maxWidth:240
              });
})

$("input#demandformoney").blur(function(){
  layer.close(TempForDemandForMoneyTips);
})

/************************************************************************************************/


var TempForEmailTips;

$("input[name=email]").focus(function(){
        TempForEmailTips = layer.tips('请输入一个正确的邮箱，用于后面的验证使用，不正确的邮箱格式会被退回的', this, {
              guide: 2,
              // time: 0,
              style: ['background-color:#F26C4F; color:#fff', '#F26C4F'],
              maxWidth:240
              });
})

$("input[name=email]").blur(function(){
  layer.close(TempForEmailTips);
})

/************************************************************************************************/


var TempForMobileTips;

$("input[name=mobile]").focus(function(){
        TempForMobileTips = layer.tips('请输入一个有效的手机号，在后面验证的时候回用到', this, {
              guide: 2,
              // time: 0,
              style: ['background-color:#F26C4F; color:#fff', '#F26C4F'],
              maxWidth:240
              });
})

$("input[name=mobile]").blur(function(){
  layer.close(TempForMobileTips);
})

/************************************************************************************************/


var TempForPhoneTips;

$("input[name=phone]").focus(function(){
        TempForPhoneTips = layer.tips('请输入一个有效的座机号码，不知道什么时候回用上呢~  ^_^', this, {
              guide: 2,
              // time: 0,
              style: ['background-color:#F26C4F; color:#fff', '#F26C4F'],
              maxWidth:240
              });
})

$("input[name=phone]").blur(function(){
  layer.close(TempForPhoneTips);
})

/************************************************************************************************/


//当isdemand选择框的值变化的时候，判断起送要求有没有变化
$("select#isdemand").change(function(){
  if($(this).val() == 1)    //有起送要求
  {
    $("div#ofserves").slideDown();
    $("div#fornum").slideUp();
    $("div#formoney").slideUp();
  }
  else if($(this).val() == 2) //无起送要求
  {
    $("div#ofserves").slideUp();
    $("div#fornum").slideUp();
    $("div#formoney").slideUp();
  }
  else  //其他情况
  {
    $("div#ofserves").slideUp();
    $("div#fornum").slideUp();
    $("div#formoney").slideUp();
  }
  // alert($(this).val());
})

//如果选择了有起送要求
$("select#yesfordemand").change(function(){
  if($(this).val() == 1)
  {
    $("div#fornum").fadeIn();
    $("div#formoney").slideUp();
  }
  else if ($(this).val() == 2)
  {
    $("div#fornum").slideUp();
    $("div#formoney").fadeIn();
  }
  else
  {
    $("div#fornum").fadeOut();
    $("div#formoney").fadeOut();
  }
})

//当焦点离开isdemand选择框的时候，弹出被选择的值
// $("select#isdemand").blur(function(){
//   alert($(this).val()); 
// })

/************************************************************************************************/

//验证码更换
$("a#captcha").click(function(){
  $("#code").attr("src","/captcha");
})




/************************************************************************************************/

var submit = $.remodal.lookup[$('[data-remodal-id=submit]').data('remodal')];

$("button#submitok").click(function(){
  submit.open();
})

/************************************结束 日历************************************************************************/
// });