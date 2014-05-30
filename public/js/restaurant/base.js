//active 这个是首要的
//写写个函数
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

	function judgement () {
		//先判断的条件是 id active_id 的父节点的class 是不是 sub-menu
		if( $("#"+active_id).parent().attr("class") == "submenu" )
		{
			//是子节点
			return 2;
		}
		else
		{
			return 1;
		}
	};

	/**
	 * [active_id 激活active，并写好面表屑]
	 * @type {[type]}
	 */
	if( judgement() == 1 )
	{
		active(active_id);
		var name = $("#"+ active_id + "> a > span").html();
		if( active_id != "dashboard")
		{
			$("#breadcrumb").html(name);
		}
		$("#page-breadcrumb").append(name+"<small id='sub-page-breadcrumb'><i class='icon-double-angle-right'></i></small>")
	}
	else
	{
		//<li id="sub-breadcrumb">2</li>
		sub_active(active_id);
		var sub_name = $("#"+active_id + "> a > i").attr("value");//取到子节点的名字
		var name = $("#"+active_id).parent().parent().children().find(".menu-text").html();
		$("#breadcrumb").html(name);
		$(".breadcrumb").append("<li id='sub-breadcrumb'>"+sub_name+"</li>")
		$("#page-breadcrumb").append(name+"<small id='sub-page-breadcrumb'><i class='icon-double-angle-right'></i>"+ sub_name +"</small>")
	}

	/**
	 * [active 激活active函数]
	 * @param  {[type]} menuid [menu_id]
	 * @return {[type]}        [description]
	 */
	function active (menuid) {
		$("#"+menuid).addClass("active");
		return 1;
	};

	/**
	 * [sub_active 给含有二级菜单的东西增加acitve]
	 * @param  {[type]} menuid [menu_id]
	 * @return {[type]}        [description]
	 */
	function sub_active (menuid) {
		$("#"+menuid).addClass("active");
		$("#"+menuid).parent().parent().addClass("active open");
		return 1;
	}

	//之后应该写控制面包屑的了
	//
	
});

