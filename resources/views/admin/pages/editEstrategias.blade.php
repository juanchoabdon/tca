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
	<form  action="/admin/training/add" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{$id}}">
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
	    <label>Titulo</label>
	    <input type="text" name="title" class="form-control" value="{{$estrategia->title}}" placeholder="Ejemplo, Bitcoins" required>
	    <br>
      <label>Subtitulo</label>
	    <input type="text" name="subtitle" class="form-control"  value="{{$estrategia->subtitle}}" placeholder="Ejemplo , Gana dinero con la moneda del Futuro" required>
	    <br>
      <label>Slug</label>
	    <input type="text" name="slug" class="form-control"   value="{{$estrategia->slug}}" placeholder="Ejemplo , bitcoin (en minisculas sin espacios)" required>
	    <br>

			<label>Cantidad de Estudiantes</label>
	    <input type="number" name="cantidad" class="form-control"  value="{{$estrategia->cantidad}}" placeholder="100 (estudiantes)" required>
	    <br>

	    <label>Descripcion</label>
	    <textarea class="form-control summernote" name="description" rows="5">{{$estrategia->description}}</textarea>
			<br>
			<label>Precio</label>
			<input type="text" id="number" name="price" class="form-control" value="{{$estrategia->price}}" required>
		  <br>
			<label>Video URL</label>
			<input type="text" id="video" name="video" class="form-control" value="{{$estrategia->video_url}}" required>
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
