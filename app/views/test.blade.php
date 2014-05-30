{{-- users.index --}}

@extends('layout._base')

{{-- start css --}}
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
{{-- end of css --}}

{{--start top_nav --}}
@section('top_nav')

	<div id="wrap"> {{-- 为了让foot在页面底端 --}}
		{{-- top_nav --}}
		<div class="navbar navbar-default ">
		<div class="container">
			<div class="navbar-header">
				<a href="../" class="navbar-brand">速度订餐</a>
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navbar-main">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">A <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="themes">
							<li><a href="../default/">A-1</a></li>
							<li class="divider"></li>
							<li><a href="#">A-2</a></li>
							<li><a href="#">A-3</a></li>
							<li><a href="#">A-4</a></li>
							<li><a href="#">A-5</a></li>
							<li><a href="#">A-6</a></li>
							<li><a href="#">A-7</a></li>
							<li><a href="#/">A-8</a></li>
							<li><a href="#">A-9</a></li>
							<li><a href="#/">A-10</a></li>
							<li><a href="#">A-11</a></li>
							<li><a href="#">A-12</a></li>
							<li><a href="#">A-13</a></li>
							<li><a href="#">-A14</a></li>
							<li><a href="#">A-15</a></li>
							<li><a href="#">A-16</a></li>
						</ul>
					</li>
					<li>
						<a href="#">B</a>
					</li>
					<li>
						<a href="#">C</a>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">D <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="download">
							<li><a href="#">D-1</a></li>
							<li><a href="#">D-2</a></li>
							<li class="divider"></li> 
							<li><a href="#">D-3</a></li>
							<li><a href="#">D-4</a></li>
						</ul>
					</li>
				</ul>

				{{-- top_nav right side --}}
				<ul class="nav navbar-nav navbar-right">
					@if ($info!=null)
					<li><a href="#">欢迎回来！</a></li>
					{{-- 这里没有改变modal，以后再次点击应该进入用户信息界面 --}}
					<li><a href="#" target="_blank" data-toggle="modal" data-target="#myModal">{{$info->username}}</a></li>
					<li><a href="/logout" target="_self">登出</a></li>
					@else
						<li><a href="#" target="_blank" data-toggle="modal" data-target="#myModal">会员登录</a></li>
						<li><a href="/register" target="_self">会员注册</a></li>
						<li><a href="#" target="_blank">餐厅加入</a></li>
					@endif
				</ul>
				{{-- end of top_nav right side --}}

			</div>
		</div>
	</div>
	{{-- end of top_nav --}}	
@stop
{{-- end of top_nav --}}

{{-- start logo --}}
@section('logo')
		{{-- logo --}}
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<a href="#" class="thumbnail">
					<img src="http://test-web.oss-cn-hangzhou.aliyuncs.com/imgae/webording/food.jpg" alt="...">
				</a>
			</div>
			<div class="col-md-10 ">			
				<div class="input-group" style="margin:5%;">
					<span class="input-group-addon">搜索</span>
					<input type="text" class="form-control" placeholder="Username">
				</div>
			</div>
			
		</div>
	</div>
	{{-- end of logo --}}

@stop
{{-- end of logo --}}

@section('content')
	{{-- expr --}}
@stop

{{-- start login_from --}}
@section('login_from')
				<!-- Button trigger modal -->
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title" id="myModalLabel">会员登录</h4>
				      </div>
				      <div class="modal-body">
				      	{{ Form::open(array('class' => 'form-horizontal'))  }}
				      	{{$errors->first('username','<div class="alert alert-danger">:message</div>')}}
				      	{{$errors->first('password','<div class="alert alert-danger">:message</div>')}}
				      	{{$errors->first('captcha','<div class="alert alert-danger">:message</div>')}}
				      	@if (Session::get('error'))
				      		<div class="alert alert-danger">{{Session::get('error')}}</div>
				      	@endif
				          <div class="form-group">
				            <label for="inputEmail" class="col-sm-2 control-label">用户名</label>
				            <div class="col-sm-10">
				            	{{  Form::text('username','', array('class' => 'form-control','placeholder'=>'username')  )  }}
				            </div>
				          </div>
				          <div class="form-group">
				            <label for="inputPassword3" class=" col-sm-2 control-label">密码</label>
				            <div class="col-sm-10">
				            	{{Form::password('password',array('class'=> 'form-control','placeholder'=>'password'))}}
				            </div>
				          </div>
				          <div class="form-group">
				            <label for="autocode" class="col-sm-2 control-label">验证码</label>
				            <div class="col-sm-10">
				            	{{Form::text('captcha', '' ,array('class'=> 'form-control','placeholder'=>'captcha'))}}
				            	
				            </div>
				          </div>

						<div class="form-group">
						  
						  <div class="col-sm-offset-2 col-sm-5">
						  	<img src="{{Captcha::img()}}" alt="" id="code">
						  	<a href="javascript:void(change_code(this));">看不清</a>
						  </div>
						</div>

				          <div class="form-group">
				            <div class="col-sm-offset-2 col-sm-10">
				              <div class="checkbox">
				                <label>
				                	{{Form::checkbox('remeber')}}
				                	记住我
				                </label>
				              </div>
				            </div>
				          </div>
				          <div class="modal-footer">
				            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				            {{Form::submit("登入",array('class' => 'btn btn-primary'))}}
				          </div>
				          {{Form::close()}}
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
@stop
{{-- end of login_from --}}

{{-- start register_from --}}
@section('register_from')
		<div class="container">
			<div class="row">
				<form role="form" class="col-md-9 go-right">
					<h2>会员注册</h2>
					<p>快捷订餐，不需要等待！</p>
					<div class="form-group">
						<input id="name" name="name" type="text" class="form-control" required>
						<label for="name">用户名</label>
					</div>
					<div class="form-group">
						<input id="password" name="password" class="form-control" required></input>
						<label for="password">密码</label>
					</div>
					<div class="form-group">
						<input id="password" name="password" class="form-control" required></input>
						<label for="password">确认密码密码</label>
					</div>
					<div class="form-group">
						<input id="phone" name="phone" type="tel" class="form-control" required>
						<label for="phone">手机号</label>
					</div>
				</form>

			</div>
		</div>
	</div> {{-- 为了让foot在页面底端 --}}
@stop
{{-- end of register_from --}}

{{-- start foot --}}
@section('foot')

	<div id="modal-footer"> {{-- foot 样式有待改进 --}}
		<div class="container">
			<p>&copy; Copyright 2014 浙江财经大学 商楠</p>
			<p>
				For 毕业设计
			</p>
		</div>
	</div>

@stop
{{-- end of foot --}}

{{-- start js --}}
@section('js')
		{{-- js address --}}
		<script src="http://test-web.oss-cn-hangzhou.aliyuncs.com/mobile/jquery-2.1.0.js"></script>
		<script src="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/js/bootstrap.min.js"></script>
		<!-- stickUP -->
		<script src="http://test-web.oss-cn-hangzhou.aliyuncs.com/mobile/stickUp.min.js"></script>
		<script src="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/js/my.js"></script>
		{{-- end of js address --}}
		{{-- javascript --}}
		<script>
		jQuery(function($) {
			$(document).ready( function() {
				@if ((Session::get('error'))||($errors->first('username'))||($errors->first('password'))||($errors->first('captcha')))
					$('#myModal').modal('show');
				@endif
			});
		});
		</script>
		<script src="http://test-web.oss-cn-hangzhou.aliyuncs.com/css_js/js/sco.modal.js"></script>
	    {{-- end of javascript --}}
@stop
{{-- end of js --}}