﻿$(function(){
    
$("#welcome").fadeIn().delay(5000).fadeOut('slow',function(){
    $("#telltologin").fadeIn().delay(5000).fadeOut(1000);
});
    
var textfield = $("input[name=user]");
            $('button[type="submit"]').click(function(e) {
                e.preventDefault();
                //little validation just to check username
                if (textfield.val() != "") {
                    $.post('simplylogin',{ 
                        username : $("#username").val(),
                        password : $("#password").val() 
                    },
                        function(data,status){
                            if(data == 1 )
                            {
                                $("#output").addClass("alert alert-success animated fadeInUp").html("欢迎回来 ，" + "<span style='text-transform:uppercase'>" + textfield.val() + "</span>");
                                $("#output").removeClass(' alert-danger');
                                $("input").css({
                                "height":"0",
                                "padding":"0",
                                "margin":"0",
                                "opacity":"0"
                                });
                                //change button text 
                                $('button[type="submit"]').html("continue")
                                .removeClass("btn-info")
                                .addClass("btn-default").click(function(){
                                     self.location='/';
                                });
                                
                                //show avatar
                                $(".avatar").css({
                                    "background-image": "url('http://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/twDq00QDud4/s120-c/photo.jpg')"
                                });
                            }
                            else
                            {
                                $("#output").removeClass(' alert alert-success');
                                $("#output").addClass("alert alert-danger animated fadeInUp").html("用户名或密码错误");
                            }
                    });



                } else {
                    //remove success mesage replaced with error message
                    $("#output").removeClass(' alert alert-success');
                    $("#output").addClass("alert alert-danger animated fadeInUp").html("请输入用户名 ");
                }
                //console.log(textfield.val());

            });

/************************************************************************************************/

$.post('simplylogin',{ 
    username : $("#username").val(),
    password : $("password").val() 
},
    function(data,status){

});

/************************************************************************************************/

});
