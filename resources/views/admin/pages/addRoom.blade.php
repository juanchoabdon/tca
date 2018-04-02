@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
  		<h2>Añadir Sala</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
	<form  action="/admin/rooms/add" method="post" enctype="multipart/form-data">
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<br>
	    <label>Titulo</label>
	    <input type="text" name="name" class="form-control" required><br>
      <label>Descripción</label>
	    <textarea class="form-control summernote" name="description" rows="2"></textarea>
			<br>

      <label>Estado</label>
      <select class="form-control" onchange="setOption()"  name="status">
          <option   value="0">Selecciona</option>
          <option   value="1">Activo</option>
          <option   value="0">Inactivo</option>
      </select>
		  <br>
      <label>Código</label>
	   <textarea class="form-control" name="video" rows="10"></textarea>
      <br>
			<center><input type="submit" class="btn btn-primary"> </center>
	    </div>
		</form>
    <div class="clearfix"></div>
</div>

</div>





@endsection
