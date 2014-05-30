@extends('admin.base')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 广告链接地址 </label>

				<div class="col-sm-9">
					@if (isset($ad->link))
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{$ad->link}} </label>
					@else
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 暂时没有 </label>
					@endif
					
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 创建时间 </label>

				<div class="col-sm-9">
					@if (isset($ad->created_at))
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{$ad->created_at}} </label>
					@else
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 暂时没有 </label>
					@endif
					
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 上次更新时间 </label>

				<div class="col-sm-9">
					@if (isset($ad))
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{$ad->updated_at}} </label>
					@else
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 暂时没有 </label>
					@endif
					
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 广告图片 </label>

				<div class="col-sm-9">
					@if (!isset($ad))
						<img src="{{ asset('img/暂无图片.jpg') }}" alt="111" class="img-responsive">
					@else
					<img src="../advertisement/{{$ad->imgaddress}}" alt="111" class="img-responsive">		
					@endif
				</div>
			</div>

		</div>
	</div>
</div>
@stop