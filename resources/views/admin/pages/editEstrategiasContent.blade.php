@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
  		<h2>Editar Clase</h2>
      <a href="/admin/estrategias/{{$id}}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Atrás</a>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<br><br>
<div class="panel panel-default panel-shadow">

	<form  action="/admin/estrategias/content/add/{{$id}}" method="post" enctype="multipart/form-data">

	    <div class="panel-body">
        <input type="hidden" value="{{$id}}" name="ide">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<br>
	    <label>Titulo</label>
	    <input type="text" name="titulo" class="form-control" value="{{$content->titulo}}" placeholder="Ejemplo, Introduccion al Bitcoin" required>
	    <br>
	    <label>Descripcion</label>
	    <textarea class="form-control summernote" name="descripcion" rows="5">{{$content->descripcion}}</textarea>
			<br>
			video
			<input type="file" name="video" >
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
      <center>
        <br>
      <div align="center" class="embed-responsive embed-responsive-16by9">
          <video controls class="embed-responsive-item">
              <source src="{{$content->ruta}}" type="video/mp4">
          </video>
      </div>



    </center>
    </div>
  </div>
			<br>
			<center><input type="submit" class="btn btn-primary"> </center>
	    </div>
		</form>
    <div class="clearfix"></div>
</div>

</div>





@endsection
