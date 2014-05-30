$(document).ready(function(){



	$("#search").keydown(function(e){
		if(e.keyCode == 13)
		{
			window.location.href='search/'+$(this).val();
			// alert($(this).val());
		}
	  });

	$("a[href=#gaifan]").click(function(){
		$(this).parent().removeClass('active');
		$(this).parent().addClass('active');
		$("a[href=#chaocai]").parent().removeClass('active');
	});

	$("a[href=#chaocai]").click(function(){
		$(this).parent().removeClass('active');
		$(this).parent().addClass('active');
		$("a[href=#gaifan]").parent().removeClass('active');
	});

});