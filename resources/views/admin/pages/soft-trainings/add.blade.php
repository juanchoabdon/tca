@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
  		<h2>Añadir Entrenamiento blando</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
	<form  action="/admin/soft-trainings/add" method="post" enctype="multipart/form-data">
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label>Tipo</label>
			<select class="form-control" name="tipo">
				@foreach($tipos as $tipo)
				<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
				@endforeach
			</select>
			<br>
	    <label>Titulo</label>
	    <input type="text" name="title" class="form-control" placeholder="Ejemplo, Bitcoins" required>
	    <br>
      <label>Subtitulo</label>
	    <input type="text" name="subtitle" class="form-control" placeholder="Ejemplo , Gana dinero con la moneda del Futuro" required>
	    <br>
      <label>Slug</label>
	    <input type="text" name="slug" class="form-control" placeholder="Ejemplo , bitcoin (en minisculas sin espacios)" required>
	    <br>

			<label>Cantidad de Estudiantes</label>
	    <input type="number" name="cantidad" class="form-control" placeholder="100 (estudiantes)" required>
	    <br>

	    <label>Descripcion</label>
	    <textarea class="form-control summernote" name="description" rows="5"></textarea>
			<br>
			<label>Precio</label>
			<input type="text" id="number" name="price" class="form-control" required>
		  <br>
		  <label>Video</label>
		  <input type="text" id="video" name="video" class="form-control" >
		  <br>
			<label>Imagen</label>
			<input type="file" name="img" >
			<br>
			<center><input type="submit" value="Agregar" class="btn btn-primary"> </center>
	    </div>
		</form>
    <div class="clearfix"></div>
</div>

</div>





@endsection
