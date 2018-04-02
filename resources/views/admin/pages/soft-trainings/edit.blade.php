@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
  		<h2>Editar Entrenamiento</h2>
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
    <input type="hidden" name="id" value="{{$id}}">
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label>Tipo</label>
			<select class="form-control" name="tipo">
				@foreach($tipos as $tipo)
				<option value="{{$tipo->id}}" @if($training->tipo == $tipo->id){{"selected"}}@endif>{{$tipo->descripcion}}</option>
				@endforeach
			</select>
			<br>
	    <label>Titulo</label>
	    <input type="text" name="title" class="form-control" value="{{$training->title}}" placeholder="Ejemplo, Bitcoins" required>
	    <br>
      <label>Subtitulo</label>
	    <input type="text" name="subtitle" class="form-control"  value="{{$training->subtitle}}" placeholder="Ejemplo , Gana dinero con la moneda del Futuro" required>
	    <br>
      <label>Slug</label>
	    <input type="text" name="slug" class="form-control"   value="{{$training->slug}}" placeholder="Ejemplo , bitcoin (en minisculas sin espacios)" required>
	    <br>

			<label>Cantidad de Estudiantes</label>
	    <input type="number" name="cantidad" class="form-control"  value="{{$training->cantidad}}" placeholder="100 (estudiantes)" required>
	    <br>

	    <label>Descripcion</label>
	    <textarea class="form-control summernote" name="description" rows="5">{{$training->description}}</textarea>
			<br>
			<label>Precio</label>
			<input type="text" id="number" name="price" class="form-control" value="{{$training->price}}" required>
		  <br>
			<label>Video</label>
			<textarea class="form-control summernote" id="video" name="video" rows="2" required>{{$training->video_url}}</textarea>
			<br>
			<label>Imagen</label>
			<input type="file" name="img" >
      <br>
      <img src="/upload/training/{{$training->img}}-s.jpg"  class="img-responsive" style="width: 250px;">

			<br>
			<center><input type="submit" value="Editar" class="btn btn-primary"> </center>
	    </div>
		</form>
    <div class="clearfix"></div>
</div>

</div>





@endsection
