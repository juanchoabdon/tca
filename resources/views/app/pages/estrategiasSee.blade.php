@extends("app.admin_app")

@section("content")
<div class="content">
					<h2 class="content-heading">{{$content->titulo}}</h2>

					
    <a href="{{ URL::previous() }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Atrás</a>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif
  <div class="panel panel-default panel-shadow">
    <div class="panel-body">
    <div class="col-md-10 col-md-offset-1">
      <div class="embed-responsive embed-responsive-16by9">
        <video autoplay controls class="embed-responsive-item">
          <source src="{{$content->ruta}}" type="video/mp4">
      </video>
    </div>
    <br>
      <div class="well">
        <b>Descripcion</b><br><br>
        {!! $content->descripcion !!}<br><br>
      </div>
    </div><br><br>
  </div>
  </div>


</div>








@endsection
