@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
  		<h2>Añadir Capítulo de Pßodcast</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
	<form  action="/admin/podcast/add" method="post" enctype="multipart/form-data">
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<br>
	    <label>Titulo</label>
	    <input type="text" name="title" class="form-control" placeholder="Ej: Capítulo 1 - Como invertir" required><br>
			<label>Descripcion</label>
		  <textarea class="form-control summernote" name="description" rows="5"></textarea>
		  <br>
			Audio
			<input type="file" name="audio" >
			<br>

			<center><input type="submit" class="btn btn-primary"> </center>
	    </div>
		</form>
    <div class="clearfix"></div>
</div>

</div>





@endsection
