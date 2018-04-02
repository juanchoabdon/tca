@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
  		<h2>Añadir Entrenamiento</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
	<form  action="/admin/estrategias/add" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{$id}}">
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
	    <label>Titulo</label>
	    <input type="text" name="titulo" class="form-control" value="{{$estrategia->titulo}}" placeholder="Ejemplo, Bitcoins" required>
	    <br>
      <label>Slug</label>
	    <input type="text" name="slug" class="form-control"   value="{{$estrategia->slug}}" placeholder="Ejemplo , bitcoin (en minisculas sin espacios)" required>
	    <br>
	    <label>Descripcion</label>
	    <textarea class="form-control summernote" name="descripcion" rows="5">{{$estrategia->descripcion}}</textarea>
			<br>
			<label>Precio</label>
			<input type="text" id="number" name="precio" class="form-control" value="{{$estrategia->precio}}" required>
		  <br>
			<label>Video URL</label>
			<input type="text" id="video" name="video" class="form-control" value="{{$estrategia->video}}" required>
			<br>
      <label>Fecha</label>
      <input type="date" class="form-control" name="fecha" value="{{$estrategia->fecha}}">
      <br>
			<label>Imagen</label>
			<input type="file" name="img" >
      <br>
      <img src="/upload/training/{{$estrategia->img}}-s.jpg"  class="img-responsive" style="width: 250px;">

			<br>
			<center><input type="submit" class="btn btn-primary"> </center>
	    </div>
		</form>
    <div class="clearfix"></div>
</div>

</div>





@endsection
