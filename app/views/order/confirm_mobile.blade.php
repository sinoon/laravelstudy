@extends('layout.base')

@section('title')
	<title>快捷订餐系统 for 毕业设计 -- 验证手机号</title>
@stop

@section('content')
<div class="container">
	<div class="row">
		<h2>验证手机号</h2>
		<hr>
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="row">
				<div class="col-md-12 text-center">
					<span class="alert alert-info">
						您尚未验证手机号，请先验证手机号再进行订单操作
					</span>
				</div>
				
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12 text-center">
					
				<div class="form-horizontal" >
					<div class="form-group">
						<label for="mobile" class="col-sm-2 control-label">手机号</label>
						<div class="col-sm-8 clearfix">
							<p class="col-xs-8 control-label-static" style="margin: 3px 0 0 0;">
								{{$customer->mobile}}
							</p>
							<a href="###"  id="send_code" class="col-xs-4 btn btn-primary">发送验证码</a>
						</div>
					</div>
					<div class="form-group">
						<label for="confirm_code" class="col-sm-2 control-label">验证码</label>
						<div class="col-sm-8">
							<input id="code" type="" class="form-control" name="confirm_code" id="confirm_code" placeholder="">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="text-center">
							<button id="submit" type="" class="btn btn-info">确认</button>
							<button type="" class="btn">重置</button>
					</div>
				</div>
				
				</div>
				
			</div>
		</div>
	</div>
</div>
@stop

@section('include-js')
	<script src="{{asset('js/order/confirm_mobile.js')}}" ></script>
@stop