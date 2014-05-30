var num = null;

$('#spinner1').ace_spinner({value:0,min:0,max:200,step:1, btn_up_class:'btn-info' , btn_down_class:'btn-info' ,icon_up:'glyphicon glyphicon-chevron-up', icon_down:'glyphicon glyphicon-chevron-down'})
.on('change', function(){
	num = this.value;
});

$("#nowtoorder").click(function(){
	if( num > 0 )
	{
		$.post('addincart',{
			'foodid':foodid,
			'num':num
		},function(data,status){
			if( data == 1 )
			{
				alert('添加成功');
				location.reload();//刷新页面
			}
		})
		// location.href = "../order/"+foodid+"/"+num;//location.href实现客户端页面的跳转  
	}
	else
	{
		alert("抱歉，您还未选择购买数量");	
	}
	// alert(num);
})