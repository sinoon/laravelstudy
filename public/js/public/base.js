/**
 * [change_code 更换验证码]
 * 这是每个前台页面都需要的。
 * @param  {[type]} obj [description]
 * @return {[type]}     [description]
 */
function change_code(obj) {
	$('#code').attr("src","http://localhost/captcha");
	return false;
};

	var r_alert = $.remodal.lookup[$('[data-remodal-id=remodal-alert]').data('remodal')];

	var j_alert  = $("div[data-remodal-id='remodal-alert']");

	function remodal_alert(content)
	{
	  //清空remodal对象里面的html
	  j_alert.empty();

	  //添加内容
	  var h3 = "<h3>"+content+"</h3>";
	  j_alert.append(h3);

	  //最后加上a标签
	  var a = "<a class='remodal-confirm' href='#''>恩，知道了~</a>";

	  j_alert.append(a);

	  r_alert.open();
	};

$(document).ready(function(){

	var r_alert = $.remodal.lookup[$('[data-remodal-id=remodal-alert]').data('remodal')];

	var j_alert  = $("div[data-remodal-id='remodal-alert']");



	$(window).bind("load", function() {
		var footerHeight = 0,
		footerTop = 0,
		$footer = $(".modal-footer");
		// alert($footer.height());
		positionFooter();
		//定义positionFooter function
		function positionFooter() 	{
			//取到div#footer高度
			footerHeight = $footer.height();
			//取到footer的宽度
			footerwidth = $(window).width()+"px";
			//div#footer离屏幕顶部的距离
			footerTop = ($(document.body).height()-footerHeight)+"px";
			 /*
				console.log("Document height: ", $(document.body).height());
				console.log("Window height: ", $(window).height());
				console.log("Window scroll: ", $(window).scrollTop());
				console.log("Footer height: ", footerHeight);
				console.log("Footer top: ", footerTop);
				console.log("-----------") */
				
			//如果页面内容高度小于屏幕高度，div#footer将绝对定位到屏幕底部，否则div#footer保留它的正常静态定位
			if ( $(document.body).height() < $(window).height()) {
				footerTop = ($(window).height()-footerHeight)+"px";
				$footer.css({
					position: "absolute",
					width:footerwidth,
					top: footerTop
				}); 

			} else {
				$footer.css({
					position: "static"
				});
			}
		}
		$(window).scroll(positionFooter).resize(positionFooter);

	
	});
	
	function remodal_alert(content)
	{
	  //清空remodal对象里面的html
	  jquery_alert.empty();

	  //添加内容
	  var h3 = "<h3>"+content+"</h3>";
	  jquery_alert.append(h3);

	  //最后加上a标签
	  var a = "<a class='remodal-confirm' href='#''>恩，知道了~</a>";

	  j_alert.append(a);

	  r_alert.open();
	}

});