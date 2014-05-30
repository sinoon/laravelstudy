@extends('layout.base')

@section('title')
	<title>快捷订餐系统 for 毕业设计 -- 购物车页面</title>
@stop

@section('content')
<div class="container">
	<div class="row">
		<h1>
			购物车
		</h1>
	</div>

	<hr>

	<div class="row">
		<div class="panel-panel-info">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>
							餐品名称
						</th>
						<th>
							价格
						</th>
						<th>
							购买份数
						</th>
						<th>
							总共
						</th>
						<th>
							操作
						</th>
					</tr>
				</thead>
				<tbody>
					{{--Form::open()--}}
						<!-- 准备foreach -->
						@foreach ($fullcart as $cart)
							<tr>
								<td>
									{{$cart->name}}
								</td>
								<td class="price">
									{{$cart->price}} 元
								</td>
								<td id="num">
									<input type="text"  id="spinner" name="food{{ $cart->foodid }}" value="{{$cart->num}}" />
									 份
								</td>
								<td class="total">
									{{$cart->price*$cart->num}} 元
								</td>
								<td>
									<a id="{{$cart->foodid}}" href="###" class="btn btn-primary">删除</a>
								</td>
							</tr>
						@endforeach
						<!-- 结束foreach -->
				</tbody>
			</table>

			<hr>

			<div class="row">
				<div class="well">
					@foreach ($restnum as $key => $restnum)
					<span>在 <strong>{{$restnum->restaurantname}}</strong> 餐厅订餐 {{ $foodnum[$key] }}份，共计 {{ $money[$key] }} 元</span>

					@if ($restaurant[$key]->typeofdemand == 1)
						<span>起送要求：{{ $restaurant[$key]->demandfornum }} 份起送</span>
					@else
						<span>起送要求：消费{{ $restaurant[$key]->demandformoney }} 元起送</span>
					@endif
					<br>
					@endforeach
				</div>
			</div>

			<div class="space-6"></div>

			<div class="row">
				<div class="pull-right">
					<a id="backtofood" href="/" class="btn btn-warning">继续选择菜品</a>

					<a href="{{ asset('order/startorder') }}" class="btn btn-success">确定下单</a>
					{{--Form::submit("结算",array('class' => 'btn btn-primary'))--}}
				</div>
			</div>
			{{-- Form::close() --}}
		</div>
	</div>
</div>

@stop

@section('include-js')
	<script src="{{ asset('js/order/order.js') }}" ></script>
@stop

