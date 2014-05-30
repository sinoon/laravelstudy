@extends('restaurant.base')

@section('include-css')
	<link rel="stylesheet" href="{{ asset('assets/css/ui.jqgrid.css') }}" />
@stop


@section('content')

<!-- test -->
<div class="row">
	@foreach ($order as $key => $orders)
	<div class="col-xs-12 col-sm-12 widget-container-span ui-sortable">
		<div class="widget-box">
			<div class="widget-header 
			@if ($orders->status == 1)
				header-color-blue
			@endif
			@if ($orders->status == 2)
				header-color-orange
			@endif">
				<h5 class="bigger lighter">
					<span>订单编号：{{$orders->oid}}　　</span> |
					<span>　　成交时间：{{$orders->created_at}}　　</span>|
					<span>　　送餐地址：{{$orders->address}}</span>
				</h5>
			</div>

			<div class="widget-body">
				<div class="widget-toolbox">
					<div class="btn-toolbar">
						<div class="btn-group center-block">
							@if ($orders->status == 1)
								<button value="{{$orders->oid}}" class="btn btn-sm btn-success">
									<i class="icon-ok bigger-110"></i>
									开始配送
								</button>

								<button class="btn btn-sm btn-danger">
									<i class="icon-remove bigger-110"></i>
									取消订单
								</button>
							@endif
							@if ($orders->status == 2)
								<button class="btn btn-sm btn-info">
									<i class="icon-fighter-jet bigger-110"></i>
									正在配送
								</button>
								<span class="label label-xlg label-success arrowed center-blcok">开始配送时间：{{$orders->updated_at}}</span>
							@endif
							@if ($orders->status == 3)
								{{-- expr --}}
							@endif
							@if ($orders->status == 4)
								{{-- expr --}}
							@endif
						</div>
					</div>
				</div>
				<div class="widget-main padding-16">
					<div class="order" >
						<table class="table table-striped table-bordered table-hover">
							
							<tbody>
								<tr class="center">
									<td>
										菜品名字
									</td>
									<td>
										单价
									</td>
									<td>
										购买份数
									</td>
									<td>
										总计金额
									</td>
									<td>
										状态
									</td>
								</tr>
							@if (count($fullorder[$key]) == 1)
								<tr class="center">
									<td colspan=""> 
										<div class="col-md-2">
											<img src="{{ asset('restaurant/'.$fullorder->username.'/foodimg/'.$fullorder->savename) }}" class="img-responsive" alt="{{$fullorder->name}}">
										</div>
										<h5>
											{{$fullorder->name}}
										</h5>
									</td>
									<td colspan="">
										<h5>
											{{$fullorder->price}}
										</h5>
									</td>
									<td colspan="">
										<h5>
											{{$fullorder->num}}
										</h5>
									</td>
									<td colspan="">
										<h5>
											{{ $fullorder->price * $fullorder->num }}
										</h5>
									</td>
									<td style="height: 4em;line-height: 4em;overflow: hidden;" colspan="4">
										@if ($orders->status == 1)
										<div class="alert alert-info">
											<span>已下单</span>
											<a href="###" class="btn btn-primary">取消订单</a>
										</div>
										@endif
										@if ($orders->status == 2)
											<div class="alert alert-warning">
												<span>正在配送中</span>
											</div>
										@endif
										@if ($orders->status ==3 || $orders->status == 4)
											<div class="alert alert-success">
												<span>订单完成</span>
											</div>
										@endif
									</td>
								</tr>
							@else
								@foreach ($fullorder[$key] as $key2 => $fullorders)
									<tr class="center" style="">
										<td colspan=""> 
											<div class="">
												<img style="width:120px;height:120px;" src="{{ asset('restaurant/'.$fullorders['username'].'/foodimg/'.$fullorders['savename']) }}" class="img-responsive" alt="{{$fullorders['name']}}">
											</div>
											<h5>
												{{$fullorders['name']}}
											</h5>
											
										</td>
										<td colspan="">
											<h5>
												{{$fullorders['price']}} 元
											</h5>
										</td>
										<td colspan="">
											<h5>
												{{$fullorders['num']}} 份
											</h5>
											
										</td>
										@if ($key2 == 0)
											{{-- 如果是第一次 --}}
											<td rowspan="{{count($fullorder[0])}}">
												<h5>
													{{$orders->money}} 元
												</h5>
											</td>
											<td style="height: 50px;line-height: 50px;overflow: hidden;" rowspan="{{count($fullorder[0])}}">
												@if ($orders->status == 1)
												<div class="alert alert-info">
													<span class="text-primary">已下单</span>
												</div>
													
												@endif
												@if ($orders->status == 2)
												<div class="alert alert-warning">
													<span>正在配送中</span>
												</div>
												@endif
												@if ($orders->status == 3 || $orders->status == 4)
													<div class="alert alert-success">
														<span>订单完成</span>
													</div>
												@endif
											</td>
										@endif
									</tr>
								@endforeach
							@endif
						</tbody>
					
				</table>
			</div>
		</div>
	</div>
	</div>
	</div>
	@endforeach
</div>
<!-- /.test -->

@stop

@section('include-js')
	<script src="{{ asset('assets/js/jqGrid/jquery.jqGrid.min.js') }}"></script>
	<script src="{{ asset('assets/js/jqGrid/i18n/grid.locale-en.js') }}"></script>

	<script src="{{ asset('js/restaurant/all-order.js') }}"></script>
@stop

@section('javascript')

@stop