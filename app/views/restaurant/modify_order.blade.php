@extends('restaurant.base')

@section('include-css')
	<link rel="stylesheet" href="{{ asset('assets/css/ui.jqgrid.css') }}" />
@stop


@section('content')
<div class="row">
	<!-- order -->
	<div class="order">
		<table class="table table-bordered">
			@foreach ($order as $key => $order)
			<tbody>
				<tr>
					<td colspan="18">
						<span>订单编号：{{$order->id}}</span>
						<span>成交时间：{{$order->created_at}}</span>
						<span>送餐地址：{{$order->address}}</span>
					</td>
				</tr>
				@if (count($fullorder) == 1)
					<tr>
						<td colspan="5"> 
							<div class="col-md-2">
								<img src="{{ asset('restaurant/'.$fullorder->belongto.'/foodimg/'.$fullorder->savename()) }}" class="img-responsive" alt="{{$fullorder->name}}">
							</div>
							{{$fullorder->name}}
						</td>
						<td colspan="2">
							{{$fullorder->price}}
						</td>
						<td colspan="2">
							{{$fullorder->num}}
						</td>
						<td colspan="2">
							{{$order->money}}
						</td>
						<td colspan="4">
							@if ($order->status == 1)
							<span>已下单</span>
							<a href="###" class="btn btn-primary">取消订单</a>
							@endif
							@if ($order->status == 2)
							<span>正在配送中</span>
							@endif
							@if ($order->status == 3)
							<a href="###" class="btn btn-primary">评价</a>
							@endif
						</td>
					</tr>
				@else
					@foreach ($fullorder as $key2 => $fullorders)
					<tr>
						<td colspan="5"> 
								<div class="col-md-2">
									<img src="{{ asset('restaurant/'.$fullorders->belongto.'/foodimg/'.$fullorders->savename()) }}" class="img-responsive" alt="{{$fullorders->name}}">
								</div>
								{{$fullorders->name}}
							</td>
							<td colspan="2">
								{{$fullorders->price}}
							</td>
							<td colspan="2">
								{{$fullorders->num}}
							</td>
							@if ($key2 == 0)
								{{-- 如果是第一次 --}}
								<td rowspan="{{count($fullorder)}}">
									{{$order->money}}
								</td>
								<td rowspan="{{count($fullorder)}}">
									@if ($order->status == 1)
										<span>已下单</span>
										<a href="###" class="btn btn-primary">取消订单</a>
									@endif
									@if ($order->status == 2)
										<span>正在配送中</span>
									@endif
									@if ($order->status == 3)
										<a href="###" class="btn btn-primary">评价</a>
									@endif
								</td>
							@endif
						</tr>
					@endforeach
				@endif
			</tbody>
			@endforeach
			
		</table>
	</div>
	<!-- end of order -->
</div>
@stop
