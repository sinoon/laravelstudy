
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>会员登录</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/public/bootstrap.min.css')}}" rel="stylesheet">
    <style type="text/css">
        body{
    background: url({{ asset('img/background/back.png') }});
    background-color: #444;
    background: url({{ asset('img/background/pinlayer2.png') }}) ,url({{asset('img/background/pinlayer1.png')}}),url({{ asset('img/background/back.png') }});    
}

.vertical-offset-100{
    padding-top:100px;
}    </style>
    <script src="{{asset('js/public/jquery-1.10.2.min.js')}}"></script>
    <script src="{{asset('js/public/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/public/changecode.js')}}"></script>
</head>
<body>
<script src="{{asset('js/public/TweenLite.min.js')}}"></script>
<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">请登录</h3>
                </div>
                <div class="panel-body">
                    <!-- <form accept-charset="UTF-8" role="form"> -->
                       {{ Form::open(array('action' => 'UsersController@login'))  }}
                    <fieldset>
                        {{$errors->first('username','<div class="alert alert-danger">:message</div>')}}
                        {{$errors->first('password','<div class="alert alert-danger">:message</div>')}}
                        {{$errors->first('captcha','<div class="alert alert-danger">:message</div>')}}
                        <div class="form-group">
                            <input class="form-control" placeholder="用户名" name="username" type="text" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="密码" name="password" type="password" value="" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="验证码" name="captcha" type="text" required>
                        </div>
                        <div class="form-group">
                           <img src="{{Captcha::img()}}" alt="" id="code">
                           <a href="javascript:void(change_code(this));">看不清</a>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me"> 记住我
                            </label>
                        </div>
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="登录">
                    </fieldset>
                    {{Form::close()}}
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div><script type="text/javascript">
$(document).ready(function(){
  $(document).mousemove(function(e){
     TweenLite.to($('body'), 
        .5, 
        { css: 
            {
                'background-position':parseInt(event.pageX/8) + "px "+parseInt(event.pageY/12)+"px, "+parseInt(event.pageX/15)+"px "+parseInt(event.pageY/15)+"px, "+parseInt(event.pageX/30)+"px "+parseInt(event.pageY/30)+"px"
            }
        });
  });
});</script>
</body>
</html>
