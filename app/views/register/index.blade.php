@extends('register._base')

@section('css')
	<link rel="stylesheet" href="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/css/register.css">

	<style type="text/css">

	  /* Sticky footer styles
	  -------------------------------------------------- */

	  html,
	  body {
	    height: 100%;
	    /* The html and body elements cannot have any padding or margin. */
	  }

	  /* Wrapper for page content to push down footer */
	  #wrap {
	    min-height: 100%;
	    height: auto !important;
	    height: 100%;
	    /* Negative indent footer by it's height */
	    margin: 0 auto -60px;
	  }

	  /* Set the fixed height of the footer here */
	  #push,
	  #footer {
	    height: 60px;
	  }
	  #footer {
	    background-color: #f5f5f5;
	  }

	  /* Lastly, apply responsive CSS fixes as necessary */
	  @media (max-width: 767px) {
	    #footer {
	      margin-left: -20px;
	      margin-right: -20px;
	      padding-left: 20px;
	      padding-right: 20px;
	    }
	  }



	  /* Custom page CSS
	  -------------------------------------------------- */
	  /* Not required for template or sticky footer method. */

	  #wrap > .container {
	    padding-top: 60px;
	  }
	  .container .credit {
	    margin: 20px 0;
	  }

	  code {
	    font-size: 80%;
	  }

	</style>
@stop

@section('register')


	<div class="container">
		 <div class="row"> 
		{{Form::open(array('class'=>'col-md-9 go-right'))}}
			{{--<form role="form" class="col-md-9 go-right">--}}
				<h2>会员注册</h2>
				<p>快捷订餐，不需要等待！</p>
					{{$errors->first('username','<div class="alert alert-danger">:message</div>')}}
				<div class="form-group">
					<input id="name" name="username"  type="text" class="form-control" required>
					<label for="name">用户名</label>
				</div>
					{{$errors->first('email','<div class="alert alert-danger">:message</div>')}}
				<div class="form-group">
					<input id="email" name="email" type="mail" mail-message="邮箱格式不正确！" class="form-control" required></input>
					<label for="email">邮箱</label>
				</div>
					{{$errors->first('password','<div class="alert alert-danger">:message</div>')}}
				<div class="form-group">
					<input id="password" name="password" type="password" class="form-control" required></input>
					<label for="password">密码</label>
				</div>
				<div class="form-group">
					<input id="password_confirmation" type="password"  name="password_confirmation" class="form-control" required></input>
					<label for="password_confirmation">确认密码</label>
				</div>
			{{$errors->first('mobile','<div class="alert alert-danger">:message</div>')}}
				<div class="form-group">
					<input id="mobile" name="mobile" type="tel" class="form-control" required>
					<label for="mobile">手机号</label>
				</div>
					{{$errors->first('captcha','<div class="alert alert-danger">:message</div>')}}
				<div class="form-group">
					<input id="captcha" name="captcha"  class="form-control" required>
				<label for="captcha">验证码</label>
				</div>
				<div class="form-group">
					<img src="{{Captcha::img()}}" alt="" id="code">
					<a href="javascript:void(change_code(this));">看不清</a>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">提交</button>
				</div>
				{{Form::close()}}
			{{--</form>--}}

		</div>
	</div>
</div>
@stop

@section('foot')
	


<div id="modal-footer">
	<div class="container">
		<p>&copy; Copyright 2014 浙江财经大学 商楠</p>
		<p>
			For 毕业设计
		</p>
	</div>
</div>

@stop