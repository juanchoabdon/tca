@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
  		<h2>Añadir Suscripcion</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
	<form  action="/admin/subscription/add" method="post" enctype="multipart/form-data">
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<br>
	    <label>Titulo</label>
	    <input type="text" name="name" class="form-control"  required>
	    <br>

	    <label>Descripcion</label>
	    <textarea class="form-control summernote" name="description" rows="5"></textarea>
			<br>
			<label>Precio</label>
			<input type="text" id="number" name="cost" class="form-control" required>
		  <br>
			<h4>Entrenamientos</h4>
			@foreach($trainings as $training)
			<input type="checkbox"  name="trainings[]" value="{{$training->id}}"> {{$training->title}}<br>
			@endforeach
			<br>
			<h4>Estrategias</h4>
			@foreach($estrategias as $estrategia)
			<input type="checkbox"  name="estrategias[]" value="{{$estrategia->id}}"> {{$estrategia->titulo}}<br>
			@endforeach

			<br>
			<h4>Señales</h4>
			@foreach($señales as $señal)
			<input type="checkbox"  name="senales[]" value="{{$señal->id}}"> {{$señal->titulo}}<br>
			@endforeach
<br><br><br>


			<center><input type="submit" class="btn btn-primary"> </center>
	    </div>
		</form>
    <div class="clearfix"></div>
</div>

</div>





@endsection
