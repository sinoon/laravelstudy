$("start").click(function(){
	//1、订单信息里面是否有菜品
	//	1、判断table里面有没有信息
	//	
	//2、然后应该判断，在用户之前没有地址的情况下，又没有填写地址，是不行的
	$.post("/order/address",{
		
	},function(data,status){
		
	})
})