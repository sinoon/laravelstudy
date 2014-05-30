@extends('layout.base')

@section('title')
	<title>快捷订餐系统 for 毕业设计 -- 下单成功页面</title>
@stop

@section('content')
<div class="container">
	<div class="row">
		<span class="col-md-12 alert alert-success">
			下单成功！
		</span>
		<span class="col-md-12 alert alert-success">
			恭喜您，linoon，您的订单已生效！
		</span>
	</div>
	<h3>
		订单详情
	</h3>
	<hr>
</div>
<div class="container">
	<!-- panel -->
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>餐品名称</th>
							<th>价格</th>
							<th>购买份数</th>
							<th>总共</th> 
						</tr>
					</thead>
					<tbody>
						<!-- 准备foreach -->
						{{--@foreach ($fullcart as $cart)--}}
						<tr>
							<td> $cart->name </td> 
							<td class="price"> $cart->price 元 </td> 
							<td id="num">
								$cart->num 份
							</td>
							<td class="total"> $cart->price*$cart->num 元 </td>
						</tr>
						{{--@endforeach--}}
						<!-- 结束foreach -->
						<tr>
							<td> $cart->name </td> 
							<td class="price"> $cart->price 元 </td> 
							<td id="num">
								$cart->num 份
							</td>
							<td class="total"> $cart->price*$cart->num 元 </td>
						</tr>
						<tr>
							<td> $cart->name </td> 
							<td class="price"> $cart->price 元 </td> 
							<td id="num">
								$cart->num 份
							</td>
							<td class="total"> $cart->price*$cart->num 元 </td>
						</tr>
						<tr>
							<td> $cart->name </td> 
							<td class="price"> $cart->price 元 </td> 
							<td id="num">
								$cart->num 份
							</td>
							<td class="total"> $cart->price*$cart->num 元 </td>
						</tr>
						<tr>
							<td> $cart->name </td> 
							<td class="price"> $cart->price 元 </td> 
							<td id="num">
								$cart->num 份
							</td>
							<td class="total"> $cart->price*$cart->num 元 </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- /.panel -->
	<!-- /.row -->
	<div class="row">
		<div class="col-md-12">
			<!-- well -->
			<div class="well well-lg">
				<dl class="dl-horizontal">
					<!-- 从这里开始foreach -->
					<dt>
						订单号
					</dt>
					<dd>
						1
					</dd>
					<br>
					<dt>
						送餐地址
					</dt>
					<dd>
						成蹊苑1#101
					</dd>
					<br>
					<dt>
						金额
					</dt>
					<dd>
						12元
					</dd>
					<br>
					<dt>
						购买份数
					</dt>
					<dd>
						1份
					</dd>
					<br>
					<dt>
						订单状态
					</dt>
					<dd>
						1：已经下单
					</dd>

					<!-- /.结束foreach -->
				</dl>
			</div>
			<!-- /.well -->
		</div>
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-md-12">
			<button class="btn btn-primary">查看订单</button>
		</div>
	</div>
</div>
@stop

