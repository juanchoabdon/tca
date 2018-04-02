@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
  		<h2>Añadir Señal</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
	<form  action="/admin/senales/add" method="post" enctype="multipart/form-data">
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<br>
	    <label>Titulo</label>
	    <input type="text" name="titulo" class="form-control" placeholder="Ejemplo, Bitcoins" required><br>
      <label>Descripcion</label>
	    <textarea class="form-control summernote" name="descripcion" rows="5"></textarea>
			<br>
      <label>Fecha</label>
			<input type="date" id="fecha" name="fecha" class="form-control" required>
		  <br>
      <label>¿Cuantos meses dura?</label>
      <input type="text" class="form-control" name="meses" placeholder="Ejemplo, 5">
      <br>
			<label>Precio</label>
			<input type="number" id="number" name="precio" class="form-control" required>
		  <br>
			<label>Video URL</label>
			<input type="text" id="video" name="video" class="form-control" value="" required>
			<br>
			<label>Imagen</label>
			<input type="file" name="img">
			<br>



			<center><input type="submit" class="btn btn-primary"> </center>
	    </div>
		</form>
    <div class="clearfix"></div>
</div>

</div>





@endsection
