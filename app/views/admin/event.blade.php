@extends('admin.base')

@section('content')
<div class="row">
	@foreach ($events as $event)
	<div class="widget-container-span ui-sortable">
		<div class="widget-box">
			<div class="widget-header">
				<h5 id="title" class="smaller"><a href="{{ asset('admin/change-event/'.$event->id) }}">{{$event->title}}</a></h5>
					
				<div class="widget-toolbar">
					<span class="label label-success">
						发布时间：{{$event->created_at}}
						<i class="icon-arrow-up"></i>
					</span>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main padding-6">

					<div id="content" class="alert alert-info">
						{{$event->content}}
					</div>
				</div>
			</div>
		</div>
	</div><!-- widget -->
	<div class="space-24"></div>
	@endforeach
	{{$events->links()}}
</div>
@stop
