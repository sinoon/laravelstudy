<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Bootstrap form theme - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/public/bootstrap.min.css" rel="stylesheet">
    <link href="/css/register/register.css" rel="stylesheet">

<body>
<div class="container auth">
    <h1 class="text-center">欢迎来到快捷订餐<span>It's nice!</span> </h1>
    <div id="big-form" class="well auth-box">
      <form>
        <fieldset>

          <!-- Form Name -->
          <legend>会员注册</legend>

<!--           <div class="btn-group">
            <a href="index.html" class="btn btn-default">All</a>
            <a href="example1.html" class="btn btn-default">example 1</a>
            <a href="example2.html" class="btn btn-default">example 2</a>
          </div> -->


          <!-- Text input-->
          <div class="form-group">
            <label class=" control-label" for="textinput">用户名</label>  
            <div class="">
              <input id="textinput" name="username" placeholder="Username" class="form-control input-md" type="text">
              <span class="help-block">help</span>  
            </div>
          </div>

          <!-- Password input-->
          <div class="form-group">
            <label class=" control-label" for="passwordinput">密码</label>
            <div class="">
              <input id="passwordinput" name="password" placeholder="Password" class="form-control input-md" type="password">
              <span class="help-block">help</span>
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class=" control-label" for="selectbasic">地区</label>
            <div class="">
              <select id="selectbasic" name="selectbasic" class="form-control">
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


          <!-- Button (Double) -->
          <div class="form-group">
            <!-- <label class=" control-label pull-right" for="button1id">填写完毕</label> -->
            <div class="">
              <button id="button1id" name="button1id" class="btn btn-success pull-right">提交</button>
              <!-- <button id="button2id" name="button2id" class="btn btn-danger">重置</button> -->
            </div>
          </div>

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




<script scr="/js/public/bootstrap.min.js"></script>
<script scr="/js/public/jquery-2.1.0.min.js"></script>

</body>

</html>

