



$(document).ready(function(){

  //$.browser.msie jquery 1.9以上版本不支持这个了


  var remodal_change_password = $.remodal.lookup[$('[data-remodal-id=change_password]').data('remodal')];

  var jquery_change_password  = $("div[data-remodal-id='change_password']");

  /**
   * [add_content 弹出模态框]
   * @param {[type]} content [description]
   */
  function add_content(content)
  {
    // var modal = $.remodal.lookup[$('[data-remodal-id='+modal_id+']').data('remodal')];
    // var jmodal = $("div[data-remodal-id='"+modal_id+"']");

    //清空remodal对象里面的html
    jquery_change_password.empty();

    //添加内容
    var h3 = "<h3>"+content+"</h3>";
    jquery_change_password.append(h3);

    //最后加上a标签
    
    var a = "<a class='remodal-confirm' href='#''>恩，知道了~</a>";

    jquery_change_password.append(a);

    remodal_change_password.open();
  }



 $('[data-toggle="tooltip"]').tooltip();



/***************************************************************************************************/
  var slideIn  = 1;


if( window.location.hash != "")
{
  fast_show_active(window.location.hash);
}

function fast_show_active (sin) {
  $(".message").hide();
  $(".order").hide();
  $(".profile").hide();
  $(".security").hide();
  $(".comment").hide();

  sin = sin.replace(/[^a-zA-Z]/g,'');

  $("."+sin).show();

  $("[href=#order]").parent().removeClass("active");//取消掉别的active
  $("[href=#profile]").parent().removeClass("active");
  $("[href=#security]").parent().removeClass("active");
  $("[href=#comment]").parent().removeClass("active");
  $("[href=#message]").parent().removeClass("active");//

  $("[href=#"+sin+"]").parent().addClass("active");//把自己设置为active
}


  function show_active (sin) {
    $(".message").slideUp();
    $(".order").slideUp();
    $(".profile").slideUp();
    $(".security").slideUp();
    $(".comment").slideUp();

    sin = sin.replace(/[^a-zA-Z]/g,'');

    $("."+sin).slideDown();

    $("[href=#order]").parent().removeClass("active");//取消掉别的active
    $("[href=#profile]").parent().removeClass("active");
    $("[href=#security]").parent().removeClass("active");
    $("[href=#comment]").parent().removeClass("active");
    $("[href=#message]").parent().removeClass("active");//

    $("[href=#"+sin+"]").parent().addClass("active");//把自己设置为active
  }

	$("[href=#message]").click(function(){
    show_active("#message");
  })

	$("[href=#order]").click(function(){
    show_active("#order");
  })

	$("[href=#profile]").click(function(){
    show_active("#profile");
  })

	$("[href=#security]").click(function(){
    show_active("#security");
  })

  $("[href=#comment]").click(function(){
    show_active("#comment");
  })
/***************************************************************************************************/
var arr=[];
var sum=0;

$("#allcheck").click(function(){
    $("#inbox").find("input").each(function(){
        // $(this).removeAttr("checked");
        $(this).prop("checked",true);
    })
})

$("#falsecheck").click(function(){
    $("#inbox").find("input").each(function(){
        if($(this).prop("checked"))
        {
            $(this).prop("checked",false);
        }
        else
        {
            $(this).prop("checked",true);
        }
    });
})



$("#inbox #delete").click(function(){
    //第零，先问用户是否真的要删除，如果要，进行后边的，如果不要，取消操作
    //应该先判断用户是否选中了什么东西
    sum=0;
     $("#inbox").find("input").each(function(){
        // alert("进去判断了~"+"sum的值："+sum);
        if($(this).prop("checked"))
        {
            sum++;
        }
    })

     if(sum==0)
     {
          // alert("什么都没有选啊"+sum);
          joke.open();
          return -1;
     }

    confirm.open();

    $(document).on('open', '.remodal', function () {
         console.log('open');
     });

    $(document).on('confirm', '.remodal', function () {
      console.log('confirm');
     arr.length=0;
     var i = 0;
     $("#inbox").find("input").each(function(){
        if($(this).prop("checked"))
        {
            arr[i++]=($(this).attr("id"));
        }
    })
     $.post("usersDeleteMsg",{
        delete : arr                //要转化为对应关系数组才可以
    },function(data , status){
        if(status)
        {
            alert("提交成功");
        }                  //判断是否提交
        else
        {

            alert("提交失败");
        }
        if(data==1)                 //返回 -1 代表删除失败
        {
            alert("删除成功");
            window.location.reload();
        }
        else
        {
            alert("删除失败");
        } 
    })
    //第一，找到inbox里面所有选中的ID
    
    })
    
    //第二，把所有选中的ID提交给服务器
    //第三，从服务器json返回的信息里面找到是否删除成功
    //第四，告诉用户是否删除成功
})


function reload()
{
    
}

/***************************************************************************************************/

$("#inbox a").click(function(){
    ////////////////////////////////
    // alert($(this).attr("id")); //
    ////////////////////////////////
    var temp = $(this).attr("id");
    temp = insertString(temp,"#","inbox");
    $("div"+temp).slideToggle();
})



/****************************************字符串操作函数***********************************************************/

function getFront(mainStr,searchStr){  
    foundOffset=mainStr.indexOf(searchStr);  
    if(foundOffset==-1){  
       return null;  
    }  
    return mainStr.substring(0,foundOffset);  
}  


function insertString(mainStr,searchStr,insertStr){  
    var front=getFront(mainStr,searchStr);  
    var end=getEnd(mainStr,searchStr);  
    if(front!=null && end!=null){  
       return front+searchStr+insertStr+end;  
    }  
    return null;  
} 

function getEnd(mainStr,searchStr){  
    foundOffset=mainStr.indexOf(searchStr);  
    if(foundOffset==-1){  
       return null;  
    }  
    return mainStr.substring(foundOffset+searchStr.length,mainStr.length);  
} 


/******************************************字符串操作函数*********************************************************/





/****************************************moadl函数***********************************************************/

    // $(document).on('open', '.remodal', function () {
    //     // console.log('open');
    // });

    // $(document).on('opened', '.remodal', function () {
    //     // console.log('opened');
    // });

    // $(document).on('close', '.remodal', function () {
    //     // console.log('close');
    // });

    // $(document).on('closed', '.remodal', function () {
    //     // console.log('closed');
    // });

    // $(document).on('confirm', '.remodal', function () {
    //     // console.log('confirm');
    // });

    // $(document).on('cancel', '.remodal', function () {
    //     // console.log('cancel');
    // });

   // You can open or close it like this:
   var confirm = $.remodal.lookup[$('[data-remodal-id=confirm]').data('remodal')];
   var joke = $.remodal.lookup[$('[data-remodal-id=joke]').data('remodal')];
   var confirmemail = $.remodal.lookup[$('[data-remodal-id=placeconfirmemail]').data('remodal')];
   // inst.open();
   // inst.close();

   // Or init in this way:
   //var inst = $('[data-remodal-id=modal2]').remodal();
   // inst.open();

/******************************************moadl函数********************************************************/


/**********************************************************************************************************/
var sfs;
$("#ineedconfirmeamil").click(function(){
  // alert("you touched me");
  // confirm.open();
  confirmemail.open();
  sfs = 1;
  $.post("placeconfirmemail",sfs , function(data,status){
    if(data == 1)
    {
      confirmemail.close();
    }
    else
    {
      alert("不好意思，向服务器发送验证失败");
    }
  })
});

$("#confirm_mobile").click(function(){
  $.post("confirm_mobile",{
    "data":1
  },function(data,status){
    if( status == "success" )
    {
      add_content(data);
    }
  })
})

$("#check_confirm_mobile").click(function(){
  if($("#confirm_code").val() == "")
  {
    //如果没有输入
    add_content("您没有输入任何验证码，请输入后再试。");
    return 0;
  }
  //感觉没有精力去校验位数了
  $.post("check_confirm_mobile",{
    "confirm_code":$("#confirm_code").val()
  },function(data,status){
    if(status == "success")
    {
      add_content(data);
    }
  })
})

/**********************************************************************************************************/

var mobile;
var birthday;
var sex;
var email;

$("#changeinfo").click(function(){
  mobile = $("#registmobile").html();
  birthday = $("#birthday").html();
  email = $("#email").html();
  if($("#sex").html() == "未填写")
  {
    sex = "未填写";
    $("#sex").html("<select><option value ='0'>未填写</option><option value ='1'>男</option><option value ='2'>女</option></select>" );
  }
  else
  {
    sex = $("#sex").html();
    if(sex == "男")
    {
      $("#sex").html("<select><option value ='0'>未填写</option><option value ='1' selected='selected'>男</option><option value ='2'>女</option></select>" );
    }
    else
    {
      $("#sex").html("<select><option value ='0'>未填写</option><option value ='1' >男</option><option value ='2' selected='selected'>女</option></select>" );
    }
  }

  $("#registmobile").html("<input type='text' value='"+mobile+"'>" );
  $("#birthday").html("<input type='text' value='"+birthday+"'>" );
  $("#email").html("<input type='text' value='"+email+"'>" );
  
  //显示确定编辑和取消编辑
  $(this).hide();
  $("#donechange").show();
  $("#cancel").show();
})

$("#cancel").click(function(){
  // mobile = $("#registmobile input").attr("value");
  // birthday = $("#birthday input").attr("value");
  // sex = $("#sex select").val();
  // if("")

  $("#registmobile").html(mobile);
  $("#birthday").html(birthday);
  $("#sex").html(sex);
  $("#email").html(email);

  $(this).hide();
  $("#donechange").hide();
  $("#changeinfo").show();
})

$("#donechange").click(function(){
  cmobile = $("#registmobile input").val();
  cbirthday = $("#birthday :input").val();
  cemail = $("#email :input").val();
  // csex = $("#sex select").find("option:selected").text();
  csex = $("#sex select").val();
  

  //取得三个值之后
  //应该post了，不过先把保存的效果写出来
  
  $.post("changeinfo",{
    "mobile":cmobile,
    "birthday":cbirthday,
    "sex":csex,
    "email":cemail
  },function(data,status){
    csex = $("#sex select").find("option:selected").text();
    if( status == 'success' )
    {
      if( data == 1 )
      {
        alert("信息修改成功")
        $("#registmobile").html(cmobile);
        $("#birthday").html(cbirthday);
        $("#sex").html(csex);
        $("#email").html(cemail);

      }
      else
      {
        alert("信息修改失败");
        $("#registmobile").html(mobile);
        $("#birthday").html(birthday);
        
        $("#sex").html(csex);
        $("#email").html(email);
        alert(data);
      }
    }

  })

  //赋值写好了


  //然后该隐藏了
  $(this).hide();
  $("#cancel").hide();

  //显示
  $("#changeinfo").show();
})

/**********************************************************************************************************/

$("#confirm_password").get(0).addEventListener("input",function(o){
  if( $("#newpassword").val() == $(this).val() )
  {
        if( $("#newpassword").val() != "" )
        {
              //两个地方就加上calss has-success
              $(this).parent().addClass("has-success");
              $("#newpassword").parent().addClass("has-success");

              $(this).parent().removeClass("has-error");
              $("#newpassword").parent().removeClass("has-error");
        }
    }
    else
    {

      $(this).parent().removeClass("has-success");
      $("#newpassword").parent().removeClass("has-success");

      $(this).parent().addClass("has-error");
      $("#newpassword").parent().addClass("has-error");
      }
    },false);





// alert(remodal_change_password.html());

function add_content(content)
{
  // var modal = $.remodal.lookup[$('[data-remodal-id='+modal_id+']').data('remodal')];
  // var jmodal = $("div[data-remodal-id='"+modal_id+"']");

  //清空remodal对象里面的html
  jquery_change_password.empty();

  //添加内容
  var h3 = "<h3>"+content+"</h3>";
  jquery_change_password.append(h3);

  //最后加上a标签
  
  var a = "<a class='remodal-confirm' href='#''>恩，知道了~</a>";

  jquery_change_password.append(a);

  remodal_change_password.open();
}

$("#changepassword").click(function(){

  var old_password = $("#old_password").val();
  var new_password = $("#newpassword").val();
  var confirm_password = $("#confirm_password").val();

  if( old_password == "" )
  {
    add_content("请输入原来的密码");
    return -1;
  }
  else if( new_password != confirm_password )
  {
    //如果不一样，直接拜拜了~
    add_content("两次密码不一致，请重新输入后再试");
    return -1;
  }
  else if( new_password == "")
  {
    add_content("新密码不能为空");
    return -1;
  }
  //都搞定之后，再往后台post数据
  $.post("changepassword",{
    "old_password":old_password,
    "password":new_password,
    "confirm_password":confirm_password
  },function(data,status){
    add_content(data);
  })
})





/**********************************************************************************************************/

var btn = $("button[value]");

btn.click(function(){
  $.post("getmeal",{
    "orderid":$(this).attr("value")
  },function(data,status){
    if( status != "success" )
    {
      remodal_alert("网络传输出现错误");
      return -1;
    }

    if( data == 1 )
    {
      window.location.reload();
      remodal_alert("订单状态修改成功：收到外卖");

      return 1;
    }
  })
})

/**********************************************************************************************************/

$("button#comment").click(function(){

});

/**********************************************************************************************************/
});