$("#backtofood").click(function(){
	location.href = "../../food/"+foodid;//location.href实现客户端页面的跳转  
})




var spinner = $(".table :input");

var total = $('.total');





spinner.bind("change",function(){
	var num = parseInt($(this)[0].value);
	// alert( isNaN(num));
	if( num <= 1 || isNaN(num))
	{
		num = 1;
	}
	$(this)[0].value = num;
	var price = parseFloat($(this).parent().prev().get(0).innerHTML);
	$(this).parent().next().get(0).innerHTML = num * price + " 元";
})

spinner.bind("keyup",function(){
	// alrt($(this)[0].value);
	var num = parseInt($(this)[0].value);
	if( num <= 1 || isNaN(num))
	{
		num = 1;
	}
	$(this)[0].value = num;
	var price = parseFloat($(this).parent().prev().get(0).innerHTML);
	$(this).parent().next().get(0).innerHTML = num * price + " 元";
})
// for (var i = total.length - 1; i >= 0; i--) {
// 	alert(total[i].innerHTML);
// };

$("td>a").click(function(){
	alert($(this).attr('id'));
	var id = $(this).attr('id')
	$.post("/order/deletefood",{
		'id':id
	},function(data,status){
		//闭包返回函数
		alert("删除成功");
		location.reload();
	})
})