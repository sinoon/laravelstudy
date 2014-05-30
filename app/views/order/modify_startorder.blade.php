@extends('layout.base')

@section('title')
	<title>快捷订餐系统 for 毕业设计 -- 开始启动订单页面</title>
@stop

@section('content')
<div class="container">
	<div class="row">
		<h3>填写送餐地址</h3>
		<hr>
	</div>
	<div class="row">
		{{Form::open()}}
		<div class="row">
			<h5>保存的地址</h5>
			<div class="radio">
			  <label>
			    <input type="radio" name="address" id="optionsRadios1" value="addressid-1" checked>
			    成蹊苑1#101
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="address" id="optionsRadios2" value="address-2">
			    成蹊苑1#102
			  </label>
			</div>
		</div>
		<div class="row">
			<h5>
				使用新地址
			</h5>
			<div class="radio">
			  <label>
			    <input type="radio" name="address" id="optionsRadios2" value="newaddress">
			    <input type="text" name="newaddress" value="">
			  </label>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<h5>
			订单详情
		</h5>
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
					<tr>
						<td>
							菜品名称
						</td>
						<td class="price">
							1 元
						</td>
						<td id="num">
							<input type="text"  id="spinner" name="food22" value="1" />
							份
						</td>
						<td class="total">
							1 元
						</td>
						<td>
							<a id="" href="###" class="btn btn-danger">删除</a>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="row">
				<div class="well">
					总价 12 元
				</div>
			</div>
			<div class="row pull-right">
				{{Form::submit("下单",array('class' => 'btn btn-primary'))}}
			</div>
	</div>
	{{Form::close()}}
</div>
@stop

