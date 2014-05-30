<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>会员注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/public/bootstrap.min.css" rel="stylesheet">
    <link href="/css/register/register.css" rel="stylesheet">
    <link href="/css/public/jquery.calendarPicker.css" rel="stylesheet">
    <link href="/css/public/jquery-ui-1.9.2.custom.min.css" rel="stylesheet">
    <link href="/css/public/jquery.ui.theme.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/public/jquery.remodal.css">

<body>
<div class="container auth">
    {{$errors->first('username','<div class="alert alert-danger">:message</div>')}}
    {{$errors->first('password','<div class="alert alert-danger">:message</div>')}}
    {{$errors->first('email','<div class="alert alert-danger">:message</div>')}}
    {{$errors->first('captcha','<div class="alert alert-danger">:message</div>')}}
    {{$errors->first('mobile','<div class="alert alert-danger">:message</div>')}}
    <h1 class="text-center">欢迎来到快捷订餐<span>It's nice!</span> </h1>
    <div id="big-form" class="well auth-box">
      <!-- <form> -->
        <!-- <fieldset> -->
        <div id="calendarFilterBox1"></div>
        <div id="calendarFilterBox2"></div>
          <!-- Form Name -->
          <legend>会员注册</legend>

<!--           <div class="btn-group">
            <a href="index.html" class="btn btn-default">All</a>
            <a href="example1.html" class="btn btn-default">example 1</a>
            <a href="example2.html" class="btn btn-default">example 2</a>
          </div> -->

          {{Form::open(array())}}
          <!-- Text input-->
          <div class="form-group">
            <label class=" control-label" for="textinput">用户名</label>  
            <div class="">
              <input id="username" name="username" placeholder="Username" class="form-control input-md" type="text">
              <span id="for-username" class="help-block">help</span>
            </div>
          </div>

          <!-- Password input-->
          <div class="form-group">
            <label class=" control-label" for="password">密码</label>
            <div class="">
              <input id="password" name="password" placeholder="Password" class="form-control input-md" type="password">
              <span class="help-block">help</span>
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class=" control-label" for="district">地区</label>
            <div class="">
              <select id="selectbasic" name="district" class="form-control">
                <option value="1">下沙</option>
                <option value="2">其他</option>
              </select>
            </div>
          </div>

          <!-- 性别选择Multiple Radios -->
          <div class="form-group">
            <label class=" control-label" for="radios">性别</label>
            <div class="">
              <div class="radio">
                <label for="radios-0">
                  <input name="male" id="radios-0" value="1" checked="checked" type="radio">
                  男
                </label>
              </div>
              <div class="radio">
                <label for="radios-1">
                  <input name="female" id="radios-1" value="2" type="radio">
                  女
                </label>
              </div>
            </div>
          </div>
          
          
          <!-- 生日 Text input-->
          <div class="form-group">
             
            <div id="calendar">
              
            </div>
            <div class="">
              <label class="control-label" for="mydate">生日:</label> 
            <input id="mydate" name="birthday"  class="form-control input-md" type="text">
              <!-- <span class="help-block">help</span>   -->
            </div>
          </div>


          <!-- 邮箱 Text input-->
          <div class="form-group">
            <label class=" control-label" for="textinput">邮箱</label>  
            <div class="">
              <input id="textinput" name="email" placeholder="E-mail" class="form-control input-md" type="text">
              <!-- <span class="help-block">help</span>   -->
            </div>
          </div>


          <!-- 手机号 Text input-->
          <div class="form-group">
            <label class=" control-label" for="textinput">手机号</label>  
            <div class="">
              <input id="textinput" name="mobile" placeholder="mobile" class="form-control input-md" type="text">
              <!-- <span class="help-block">help</span>   -->
            </div>
          </div>


          <!-- Button -->
<!--           <div class="form-group">
            <label class=" control-label" for="singlebutton">Do you like this button</label>
            <div class="">
              <button id="singlebutton" name="singlebutton" class="btn btn-primary">Button</button>
            </div>
          </div>
          <div class="form-group">
            <label class=" control-label" for="singlebutton">And this?</label>
            <div class="">
              <button id="singlebutton" name="singlebutton" class="btn btn-default">Button</button>
            </div>
          </div> -->
            
            <!-- 验证码 Text input-->
            <div class="form-group">
                <img src="{{Captcha::img()}}" alt="" id="code">
                <a id="captcha" href="javascript:void();">看不清</a>
            </div>
            <div class="form-group">
              <!-- <label class=" control-label" for="captcha">验证码</label>   -->
              <div class="">
                <input id="captcha" name="captcha" placeholder="验证码" class="form-control input-md" type="text">
                <!-- <span class="help-block">help</span>   -->
              </div>
            </div>

          <!-- Button (Double) -->
          <div class="form-group">
            <!-- <label class=" control-label pull-right" for="button1id">填写完毕</label> -->
            
              <!-- <button  type="submit"    class="btn btn-success pull-right">提交</button> -->
              <button id="submitok" type="submit"  class="btn btn-primary btn-block">提交</button>
              <!-- <button id="button2id" name="button2id" class="btn btn-danger">重置</button> -->
            
          </div>
            {{Form::close()}}
          <!-- File Button --> 
<!--           <div class="form-group">
            <label class=" control-label" for="filebutton">Avatar</label>
            <div class="">
              <input id="filebutton" name="filebutton" class="input-file" type="file">
            </div>
          </div>
 -->
          <!-- Select Multiple -->
<!--           <div class="form-group">
            <label class=" control-label" for="selectmultiple">Category</label>
            <div class="">
              <select id="selectmultiple" name="selectmultiple" class="form-control" multiple="multiple">
                <option value="1">Option one</option>
                <option value="2">Option two</option>
              </select>
            </div>
          </div> -->

          <!-- Multiple Radios (inline) -->
<!--           <div class="form-group">
            <label class=" control-label" for="radios">Do you like pie?</label>
            <div class=""> 
              <label class="radio-inline" for="radios-0">
                <input name="radios" id="radios-0" value="1" checked="checked" type="radio">
                yes
              </label> 
              <label class="radio-inline" for="radios-1">
                <input name="radios" id="radios-1" value="2" type="radio">
                No
              </label> 
              <label class="radio-inline" for="radios-2">
                <input name="radios" id="radios-2" value="3" type="radio">
                what is pie?
              </label> 
              <label class="radio-inline" for="radios-3">
                <input name="radios" id="radios-3" value="4" type="radio">
                I hate it!
              </label>
            </div>
          </div> -->

          <!-- Multiple Checkboxes -->
<!--           <div class="form-group">
            <label class=" control-label" for="checkboxes">Extra features</label>
            <div class="">
              <div class="checkbox">
                <label for="checkboxes-0">
                  <input name="checkboxes" id="checkboxes-0" value="1" type="checkbox">
                  Paper plains
                </label>
              </div>
              <div class="checkbox">
                <label for="checkboxes-1">
                  <input name="checkboxes" id="checkboxes-1" value="2" type="checkbox">
                  Iron man
                </label>
              </div>
            </div>
          </div> -->

          <!-- Multiple Checkboxes (inline) -->
<!--           <div class="form-group">
            <label class=" control-label" for="checkboxes">Any more?</label>
            <div class="">
              <label class="checkbox-inline" for="checkboxes-0">
                <input name="checkboxes" id="checkboxes-0" value="1" type="checkbox">
                One
              </label>
              <label class="checkbox-inline" for="checkboxes-1">
                <input name="checkboxes" id="checkboxes-1" value="2" type="checkbox">
                Two
              </label>
              <label class="checkbox-inline" for="checkboxes-2">
                <input name="checkboxes" id="checkboxes-2" value="3" type="checkbox">
                Drum and bass
              </label>
              <label class="checkbox-inline" for="checkboxes-3">
                <input name="checkboxes" id="checkboxes-3" value="4" type="checkbox">
                Dub
              </label>
            </div>
          </div> -->

          <!-- Search input-->
<!--           <div class="form-group">
            <label class=" control-label" for="searchinput">Search Input</label>
            <div class="">
              <input id="searchinput" name="searchinput" placeholder="placeholder" class="form-control input-md" type="search">
              <p class="help-block">help</p>
            </div>
          </div> -->

          <!-- Textarea -->
<!--           <div class="form-group">
            <label class=" control-label" for="textarea">Text Area</label>
            <div class="">                     
              <textarea class="form-control" id="textarea" name="textarea">default text</textarea>
            </div>
          </div>

        </fieldset>
      </form>
    </div>
    <div class="clearfix"></div>
  </div> -->

<!-- model -->
<!-- 确实是否删除模态框 -->
<div class="remodal" data-remodal-id="submit">
  <h1>谢谢您的参与</h1>
  <p>
    注册信息已经提交，请耐心等待~！
  </p>
  <br>
</div>
<!-- 结束——确实删除模态框 -->
<!-- /.model -->


<script src="/js/public/jquery-2.1.0.min.js"></script>
<script src="/js/public/bootstrap.min.js"></script>
<script src="/js/public/layer/layer.min.js"></script>
<script type="text/javascript" src="/js/public/jquery.remodal.min.js"></script>
<script src="/js/public/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/js/register/register.js"></script>

<script type="text/javascript">
@if ($errors->first('username'))
    layer.tips({{$errors->first('username')}}, $("input#username"), {
                    guide: 2,
                    time: 5,
                    style: ['background-color:#F26C4F; color:#fff', '#F26C4F'],
                    maxWidth:240
                    });
@endif

</script>



</body>

</html>

