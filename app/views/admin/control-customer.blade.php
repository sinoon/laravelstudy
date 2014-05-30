@extends('admin.base')

@section('content')
<!-- profile -->
<div class="profile content-text">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">用户信息</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-3">
					<img class="pic-profile img-circle"
					src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100"
					alt="User Pic">
				</div>
				<div class="col-md-9" style="background:none;">
					<strong>{{--$info->username--}}</strong><br>
					<table class="table table-condensed table-responsive table-user-information">
						<tbody>
							<tr>
								<td>用户等级:</td>
								<td>{{-- 待定的呦~ --}}</td>
							</tr>
							<tr>
								<td>用户名:</td>
								<td id="username">{{$customer->username}}</td>
							</tr>
							<tr>
								<td>手机号</td>
								<td id="registmobile">{{$customer->mobile}}</td>
							</tr>
							<tr>
								<td>生日</td>
								<td id="birthday">{{$customer->birthday}}</td>
							</tr>
							<tr>
								<td>性别</td>
								@if ($customer->sex == "")
								<td id="sex">未填写</td>
								@else
								<td id="sex">{{$customer->sex}}</td>
								@endif
							</tr>
							<tr>
								<td>邮箱：</td>
								<td id="email">{{$customer->email}}</td>
							</tr>
							<tr>
								<td>注册时间:</td>
								<td>{{$customer->created_at}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<button id="changeinfo" class="btn  btn-primary" type="button"
			data-toggle="tooltip"
			data-original-title="修改个人信息"><i class="icon-edit"></i></button>
			<button style="display:none;" id="donechange" class="btn  btn-primary" type="button"
			data-toggle="tooltip"
			data-original-title="修改生效"><i class="icon-save"></i></button>
			<button style="display:none;" id="cancel" class="btn btn-danger" type="button"
			data-toggle="tooltip"
			data-original-title="取消编辑"><i class="icon-undo"></i></button>

		</div>
	</div>
</div>
<!-- end of profile -->
@stop

@section('include-js')
	<script src="{{ asset('js/admin/control-customer.js') }}"></script>
@stop