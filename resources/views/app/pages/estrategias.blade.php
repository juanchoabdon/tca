@extends("app.admin_app")

@section("content")
<div class="content">
			<h2 class="content-heading">Estrategias</h2>


	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif




<div class="panel panel-default panel-shadow">
    <div class="panel-body">
	@foreach($estrategias as $estrategia)
	@if(in_array($estrategia->id,$features)||($agc && in_array($estrategia->id,$strategies_id)))
			<a href="/app/estrategias/{{$estrategia->id}}">
				<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img style="img-responsive" src="/upload/training/{{$estrategia->img}}-s.jpg" data-holder-rendered="true">
					 <div class="caption">
						  <h3><b>{{$estrategia->titulo}}</b></h3>
							 <p>{!! $estrategia->descripcion !!}</p>
					 </div>

				</div>
			</a>
		 </div>
		 @endif
		@endforeach

    </div>

</div>

</div>



@endsection
