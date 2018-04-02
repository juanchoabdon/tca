@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
  		<h2>Añadir Estrategia</h2>
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
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<br>
	    <label>Titulo</label>
	    <input type="text" name="titulo" class="form-control" placeholder="Ejemplo, Bitcoins" required>
      <label>Descripcion</label>
	    <textarea class="form-control summernote" name="descripcion" rows="5"></textarea>
			<br>
      <label>Slug</label>
	    <input type="text" name="slug" class="form-control" placeholder="Ejemplo , bitcoin (en minisculas sin espacios)" required>
	    <br>

			<label>Precio</label>
			<input type="text" id="number" name="precio" class="form-control" required>
		  <br>
			<label>Video URL</label>
			<input type="text" id="video" name="video" class="form-control" value="" required>
			<br>
      <label>Fecha</label>
      <input type="date" class="form-control" name="fecha">
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
