$(document).ready(function(){

	var jquery_alertremodel  = $("div[data-remodal-id='alertremodel']");
	var alertremodel = $.remodal.lookup[$('[data-remodal-id=alertremodel]').data('remodal')];
	var register_submit = $.remodal.lookup[$('[data-remodal-id=register_submit]').data('remodal')];

	function add_content(content)
	{
	  //清空remodal对象里面的html
	  jquery_alertremodel.empty();

	  //添加内容
	  var h3 = "<h3>"+content+"</h3>";
	  jquery_alertremodel.append(h3);

	  //最后加上a标签
	  
	  var a = "<a class='remodal-confirm' href='#''>恩，知道了~</a>";

	  jquery_alertremodel.append(a);

	  alertremodel.open();
	}

	$("#register-submit").click(function(){
	// register_submit = $('div#signup-box input[name=aggrement]').is(':checked');
	// alert(register_submit);
	register_submit.open();
	$.post('/restaurant/register',{
		'email':$('div#signup-box input[name=email]').val(),
		'username':$('div#signup-box input[name=username]').val(),
		'password':$('div#signup-box input[name=password]').val(),
		'password_confirmation':$('div#signup-box input[name=password_confirm]').val(),
		'aggrement':$('div#signup-box input[name=aggrement]').is(':checked')
	},function(data,status){
		var temp1,temp2,temp3,temp4,temp5,temp6;
		var st = 0;
		$("#alertremodel").empty();
		if(data.email)
		{
			temp = $("<h1></h1>").text("抱歉，您输入的注册信息有误");
			$("#alertremodel").append(temp2);
			temp = $("<p></p>").text(data.email);
			$("#alertremodel").append(temp);
			alertremodel.open();
			st = 1;
		}
		if(data.username)
		{
			temp = $("<p></p>").text(data.username);
			$("#alertremodel").append(temp)
			st = 1;
		}
		if(data.password)
		{
			temp = $("<p></p>").text(data.password);
			$("#alertremodel").append(temp);
			st = 1;
		}
		if(data.aggrement)
		{
			temp = $("<p></p>").text(data.aggrement);
			$("#alertremodel").append(temp);
			st = 1;
		}

		if( st == 1 )
		{
			temp = "<a>恩，知道了~</a>";
			$("#alertremodel").append(temp);
			$("#alertremodel a:last").addClass("remodal-confirm");
			$("#alertremodel a:last").attr('href','#');
			alertremodel.open();
		}
		if( st == 0 )
		{
			temp = $("<p></p>").text("恭喜，注册成功，有一封邮箱确认信即将发送到您的邮箱中，请注意查收！");
			$("#alertremodel").append(temp);
			register_submit.close();
			alertremodel.open();
			location.href ="/restaurant/index";
			// delay(1500).(location.href ="restaurant-index");
		}
	},"json")
})

$("#restaurant-login").click(function(){
	$.post("/restaurant/login" , {
		'username':$("div#login-box input[name=username]").val(),
		'password':$("div#login-box input[name=password]").val(),
		'remember':$("div#login-box input[name=remember]").is(':checked')
	} ,function(data,status){
		
		if( status != "success" )
		{
			//如果没有成功的话，那么就是传输错误
			add_content("不好意思，网络出现错误");
			return 0;
		}
		if(data == -1)
		{
			add_content("用户名或密码错误");
			return 0;
		}
		else if( data == 1 )
		{
			add_content("恭喜您，登陆成功，正在跳转");
			location.href ="/restaurant/index";
		}
		else
		{
			var temp = data.username+ "<br />" + data.password;
			add_content(temp);
		}
	} )
})

$("#sendemail").click(function(){
	$.post("/restaurant/reset" , {
		'email': $("div#forgot-box input[name=email]").val()
	} , function(data,status){
		if(data == 1)
		{
			$("#alertremodel").empty();
			temp = $("<p></p>").text("重置密码的邮件已经发送，可能需要过几分钟才会到达您的邮箱，请检查您的邮箱");
			$("#alertremodel").append(temp);
			temp = "<a>恩，知道了~</a>";
			$("#alertremodel").append(temp);
			$("#alertremodel a:last").addClass("remodal-confirm");
			$("#alertremodel a:last").attr('href','#');
			alertremodel.open();
		}
		else
		{
			$("#alertremodel").empty();
			temp = $("<p></p>").text("不好意思，没有找到您输入的邮件，请检查后重试");
			$("#alertremodel").append(temp);
			temp = "<a>恩，知道了~</a>";
			$("#alertremodel").append(temp);
			$("#alertremodel a:last").addClass("remodal-confirm");
			$("#alertremodel a:last").attr('href','#');
			alertremodel.open();
		}
	} )
})

});