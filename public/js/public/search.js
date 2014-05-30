$(document).ready(function(){
	$("#search").keydown(function(e){
		if(e.keyCode == 13)
		{
			window.location.href=$(this).val();
		}
	});
});