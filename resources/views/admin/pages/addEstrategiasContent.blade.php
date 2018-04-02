@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
  		<h2>Añadir Modulo</h2>
			<a href="/admin/estrategias/{{$id}}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Atrás</a>

	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
	<form  action="/admin/estrategias/content/add/{{$id}}" method="post" enctype="multipart/form-data">
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<br>
	    <label>Titulo</label>
	    <input type="text" name="titulo" class="form-control" placeholder="Ejemplo, Introduccion al Bitcoin" required>
	    <br>
	    <label>Descripcion</label>
	    <textarea class="form-control summernote" name="descripcion" rows="5"></textarea>
			<br>
			video
			<input type="file" name="video" >
			<br>
			<center><input type="submit" class="btn btn-primary"> </center>
	    </div>
		</form>
    <div class="clearfix"></div>
</div>

</div>





@endsection
