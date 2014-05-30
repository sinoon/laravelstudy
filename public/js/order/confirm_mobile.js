
$(document).ready(function(){
	
	$("#send_code").click(function(){
		// var mobile = parseInt($("#mobile").innerHTMl);
		$.post("/order/send_confirm",{
			'mobile':1
		},function(data,status){
			if( status != "success" )
			{
				//没有加入别的判断条件
				remodal_alert("抱歉，网络传输失败！");
				return -1;
			}


			
			remodal_alert("验证码已发送到您的手机上，请注意查收");
			
		});
	});

	$("#submit").click(function(){
		$.post("/order/confirm_mobile",{
			"code":$("#code").val()
		},function(data,status){
			if( status != "success" )
			{
				remodal_alert("抱歉，网络传输失败！");
			}

			if( data == -1 )
			{
				remodal_alert("对不起，没有这个验证码。");
				return -1;
			}
			if( data == -2 )
			{
				remodal_alert("对不起，验证码错误。");
				return -2;
			}
			if( data == 1 )
			{
				window.location.href='order/startorder';
			}
		})
	});


});

