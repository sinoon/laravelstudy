@extends('restaurant.base')

@section('include-css')
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-timepicker.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/public/jquery.remodal.css') }}">
@stop

@section('content')
	<div class="row">
		<div class="col-xs-6">
			<div class="widget-box">
				<div class="widget-header">
					<h4>
						基本设置
					</h4>
					<div class="widget-toolbar">
						<a href="#" data-action="collapse">
							<i class="icon-chevron-up"></i>
						</a>
					</div>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<!-- <form action="" class="form-horizontal" > -->
						<div action="" class="form-horizontal" >
							<div class="form-group">
								<label for="" class="col-sm-3">
									餐厅名字
								</label>
								<div class="col-sm-9">
									<input name="restaurantname" type="text" placeholder="未填写" class="col-sm-6" value="{{ $restaurant->restaurantname ? $restaurant->restaurantname : '' }}">
								</div>
							</div>

							<div class="form-group">
								<label for="" class="col-sm-3">
									营业时间
								</label>
								<div class="col-sm-9 input-group">
									<input id="moring" name="moring" type="text" placeholder="未填写"  value="{{ $restaurant->moring ? $restaurant->moring : '' }}">
									至
									<input id="night" name="night" type="text" placeholder="未填写" value="{{ $restaurant->night ? $restaurant->night : '' }}">
								</div>
							</div>

							<div class="form-group">
								<label for="" class="col-sm-3">
									餐厅简介
								</label>
								<div class="col-sm-9">
									<textarea name="describe" class="form-control limited" maxlength="250" placeholder="这家店主很懒，什么都没有留下......">{{ $restaurant->describe ? $restaurant->describe : '' }}</textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label for="" class="col-sm-3">
									手机号
								</label>
								<div class="col-sm-9">
									<input name="mobile" type="text" placeholder="未填写" value="{{ $restaurant->mobile ? $restaurant->mobile : '' }}">
								</div>
							</div>

							<div class="form-group">
								<label for="" class="col-sm-3">
									座机号码
								</label>
								<div class="col-sm-9">
									<input name="phone" type="text" placeholder="未填写" value="{{ $restaurant->phone ? $restaurant->phone : '' }}">
								</div>
							</div>

							<div class="form-action center">
								<button id="profilechange1" class="btn btn-success">
									提交修改
								</button>
							</div>
						<!-- </form> -->
						</div>
					</div>
				</div>
			</div>
		</div> <!-- 基本设置  -->
		<div class="col-xs-6">
			<div class="widget-box">
				<div class="widget-header">
					<h4>
						额外配置
					</h4>
					<div class="widget-toolbar">
						<a href="#" data-action="collapse">
							<i class="icon-chevron-up"></i>
						</a>
					</div>
				</div>
				<div class="widget-body">
					<div class="widget-main">
					<div action="" class="form-horizontal" >
						<div class="form-group">
							<label for="" class="col-sm-3">
								起送要求
							</label>
							
							<div class="col-sm-6 input-group">
								<select name="typeofdemand" class="form-control " id="form-field-select-1">
									<option value="0">&nbsp;</option>
									<option value="1"{{ ($restaurant->typeofdemand == 1 ) ? 'selected="selected"':'' }} >数量</option>
									<option value="2" {{ ($restaurant->typeofdemand == 2 ) ? 'selected="selected"':'' }}>金额</option>
								</select>
							</div>
						</div>
						<div name="demandfor" class="form-group" {{ ($restaurant->typeofdemand == 1 )  ? '':'style="display:none;"' }}   id="demandfornum">
							<label for="" class="col-sm-3">
								要求数量
							</label>
							<div  class="col-sm-9 input-group">
								<input  name="demandfornum" type="text" placeholder="未填写"  value="{{$restaurant->demandfornum}}">
								
								
							</div>
						
						</div>
						
						<div class="form-group" {{ ($restaurant->typeofdemand == 2 )  ? '':'style="display:none;"' }} id="demandformoney">
							<label for="" class="col-sm-3">
								要求消费底线
							</label>
							<div class="col-sm-9 input-group">
								<input  name="demandformoney" type="text" placeholder="未填写" value="{{$restaurant->demandformoney}}">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3">
								餐厅地址
							</label>
							<div class="col-sm-9">
								<textarea name="address" class="form-control limited" maxlength="250" placeholder="这家店主很懒，什么都没有留下......">{{ $restaurant->address }}</textarea>
							</div>
						</div>

						<div class="form-action center">
							<button id="profilechange2" class="btn btn-success">
								提交修改
							</button>
						</div>
					<!-- </form> -->
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>

	<div class="space-24"></div>

	<div class="row">
		<div class="center">
			<a id="changestatus" href="###" class="btn btn-app {{ $restaurant->status ? 'btn-primary':'btn-default' }} ">
				<i class="icon-shopping-cart bigger-160"></i>
			    {{ $restaurant->status ? '餐厅下线': '餐厅上线' }}	
			</a>
		</div>
	</div>

	<!-- remodel -->
	<div id="alertremodel" class="remodal" data-remodal-id="alertremodel">
		<h1>正在提交您修改的信息</h1>
		<a class="remodal-confirm" href="#">恩，知道了~</a>
	</div>

	<div id="alertremodel" class="remodal" data-remodal-id="remodelsuccess">
		<h1>信息修改成功</h1>
		<a class="remodal-confirm" href="#">恩，知道了~</a>
	</div>

	<div id="alertremodel" class="remodal" data-remodal-id="remodelfails">
		<h1>不好意思，信息修改失败</h1>
		<a class="remodal-confirm" href="#">恩，知道了~</a>
	</div>

	<div id="alertremodel" class="remodal" data-remodal-id="gotowork">
		<h1>您的餐厅已经上线</h1>
		<a class="remodal-confirm" href="#">恩，知道了~</a>
	</div>

	<div id="alertremodel" class="remodal" data-remodal-id="notowork">
		<h1>您的餐厅已经下线</h1>
		<a class="remodal-confirm" href="#">恩，知道了~</a>
	</div>
	<!-- /.remodel -->
@stop

@section('include-js')
	<script type="text/javascript" src="{{ asset('js/public/jquery.remodal.min.js') }}"></script>
	<script src="{{ asset('assets/js/date-time/bootstrap-timepicker.min.js') }}"></script>
	<script src="{{ asset('js/restaurant/profile.js') }}"></script>
@stop