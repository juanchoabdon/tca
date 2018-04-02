@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
  		<h2>Añadir Análisis</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>

	@endif


<div class="panel panel-default panel-shadow">
	<form  action="/admin/analisis/add" method="post" enctype="multipart/form-data">
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<br>
	    <label>Titulo</label>
	    <input type="text" name="title" class="form-control" placeholder="Ej: Analisis semanal viernes 24 de septiembre" required><br>


		<br>
		<label>Artis global Club</label>
		<select class="form-control" onchange="setOption()" id="agc-status" name="agc-status">
			<option  selected value="2">Selecciona</option>
			<option  value="1">Activo</option>
			<option  value="0">Inactivo</option>
		</select><br>


			<label>Video URL</label>
			<input type="text" id="video" name="video_url" class="form-control" value="" required>
			<br>

			<center><input type="submit" class="btn btn-primary"> </center>
	    </div>
		</form>
    <div class="clearfix"></div>
</div>

</div>





@endsection
