@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
  		<h2>Editar Señal</h2>
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
    <input type="hidden" name="id" value="{{$id}}">
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
	    <label>Titulo</label>
	    <input type="text" name="titulo" class="form-control" value="{{$señal->titulo}}" placeholder="Ejemplo, Bitcoins" required>
	    <br>
	    <label>Descripcion</label>
	    <textarea class="form-control summernote" name="descripcion" rows="5">{{$señal->descripcion}}</textarea>
			<br>
      <label>Fecha</label>
      <input type="date" class="form-control" name="fecha" value="{{$señal->fecha}}">
      <br>
      <label>¿Cuantos meses dura?</label>
      <input type="text" class="form-control" name="meses" value="{{$señal->meses}}" placeholder="Ejemplo, 5">
      <br>
			<label>Precio</label>
			<input type="text" id="number" name="precio" class="form-control" value="{{$señal->precio}}" required>
		  <br>
			<label>Video URL</label>
			<input type="text" id="video" name="video" class="form-control" value="{{$señal->video}}" required>
			<br>

			<label>Imagen</label>
			<input type="file" name="img" >
      <br>
      <img src="/upload/training/{{$señal->img}}-s.jpg"  class="img-responsive" style="width: 250px;">

			<br>
			<center><input type="submit" class="btn btn-primary"> </center>
	    </div>
		</form>
    <div class="clearfix"></div>
</div>

</div>





@endsection
