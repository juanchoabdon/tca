@extends("app.admin_app")

@section("content")
<div class="content">
			<h2 class="content-heading">Contenido</h2>


	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif


  @foreach($contents as $content)
  <a href="/app/estrategias/ver/{{$content->id}}" style="outline: 0;text-decoration: none;color: black;">
  <div class="row" style="margin-bottom:20px;">
    <div class="container" style="background-color: #f8f8f8;">
    <div class="col-md-2" style="padding-left: 0px;">
      <img src="http://www.ie.edu/entre/static_files/img/slides/video.jpg?1494979200045" class="img-responsive">
    </div>
    <div class="col-md-8"><br>
    <b>{{$content->titulo}}</b><br>
    {!! $content->descripcion !!}
    </div>
  </div>
  </div>
  </a>

  @endforeach
</div>



</div>



@endsection
