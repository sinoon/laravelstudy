$(document).ready(function(){
  //post地址暂时未改
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
      "username":$("td#username").html(),//用户名
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

});