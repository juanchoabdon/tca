@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">


		<h2>Agregar Productos</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
	<form  action="addproduct" method="post" enctype="multipart/form-data">
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label>Tipo de Producto</label>
			<select class="form-control" name="tipo">
				@foreach($tipos as $tipo)
				<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
				@endforeach
			</select>
			<br>
	    <label>Titulo</label>
	    <input type="text" name="title" class="form-control" required>
	    <br>

			<label>Cantidad</label> <small style="color:red">Si son 100 ladrillos poner en cantidad 100, si es una poliza poner 1.</small>
	    <input type="number" name="cantidad" class="form-control" value="" required>
	    <br>

	    <label>Descripcion</label>
	    <textarea class="form-control summernote" name="description" rows="10"></textarea>
			<br>
			<label>Precio</label>
			<input type="text" id="number" name="price" class="form-control" required>
		  <br>
			<label>Imagen</label>
			<input type="file" name="featured_image" >
			<br>
			<center><input type="submit" class="btn btn-primary"> </center>
	    </div>
		</form>
    <div class="clearfix"></div>
</div>

</div>





@endsection
