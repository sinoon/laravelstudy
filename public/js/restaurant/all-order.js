$(document).ready(function(){
	var button = $("button[value]");
	
	button.click(function(){
		$.post("delivery",{
			"orderid":$(this).attr("value")
		},function(data,status){
			if( status != "success" )
			{
				return -1;
			}
			if( data == 1 )
			{
				remodal_alert("订单状态修改成功：正在配送中");
			}
			else
			{
				remodal_alert("出现错误");
			}
		});
	});
});