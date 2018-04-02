@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		<h2>Añadir Transacciones Csv</h2>
	</div>
	@if(Session::has('flash_message'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
		</button>
				 {{ Session::get('flash_message') }}
 </div>
	@endif
	<form method="POST" action="addcsv" accept-charset="UTF-8">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="container-fluid">
		<div class="pull-right"><button class="add_field_button btn btn-info" style="margin-bottom:10px;">Añadir Fila</button></div>
		<div class="input_fields_wrap">
		<table class="table table-bordered table-responsive">
			<tr>
				<td>
						<label>Cedula</label>
						<input type="number" class="form-control" name="cedula[]" required="El campo cedula es requerido">
				</td>
				<td>
						<label>Producto</label>
						<select class="form-control" name="producto[]" required="El campo Producto es requerido">
							<option value=""></option>
						@foreach($productos as $producto)
							<option value="{{$producto->id}}">{!!$producto->title!!}</option>
						@endforeach
						</select>
				</td>
				<td>
						<label>Comision</label>
						<input type="text" class="form-control" name="comision[]" required="El campo Comision es requerido">
				</td>
			</tr>
		</table>
		</div>
	</div>
	<center>
	<input type="submit" class="btn btn-success" value="Guardar">
  </center>
	</form>

<script type="text/javascript">
$(document).ready(function() {
	var max_fields      = 5; //maximum input boxes allowed
	var wrapper         = $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID

	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
			e.preventDefault();
			if(x < max_fields){ //max input box allowed
					x++; //text box increment
					$(wrapper).append('<div class="remove"><table class="table table-bordered table-responsive"><tr><td><label>Cedula</label><input type="number" class="form-control" name="cedula[]" required></td><td><label>Producto</label><select class="form-control" name="producto[]" required><option value=""></option>@foreach($productos as $producto)<option value="{{$producto->id}}">{!!$producto->title!!}</option>@endforeach</select></td><td><label>Comision</label><input type="text" class="form-control" name="comision[]" required></td><td><a href="#" class="remove_field btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a></td></tr></table></div>'); //add input box
			}
	});

	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
			e.preventDefault(); $(this).closest('table').remove(); x--;
	})
});
</script>










<!--
<div class="well" style="background-color: white;">
  Plantilla con archivo  <a href="{{URL::to('assets/img/masivo.csv')}}" class="btn btn-primary"> csv <i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
<p><b>Instrucciones</b>
<br>
- Llenar <b>todos</b> los campos<br>
- Los campos no deben llevar puntos ni comas.<br>
- En el campo tipo de producto <br>
		&nbsp;&nbsp; <b>1</b> : Paquete de ladrillos<br>
		&nbsp;&nbsp; <b>2</b> : Póliza<br>
		&nbsp;&nbsp; <b>3</b> : Seguro<br>
		&nbsp;&nbsp; <b>4</b> : Fondos de ahorro e inversión<br>
- El campo id_producto se puede obtener en la tienda<br>
	<img src="{{URL::to('assets/img/tutorial.PNG')}}" alt="">




</p>

</div>-->
<!--
<form method="POST" action="addcsv" accept-charset="UTF-8" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="container">
<label>Cargar archivo .csv </label>
<input type="file" name="file"><br>
<input type="submit" class="btn btn-primary" value="Cargar">
</div>
</form>-->
<br>
</div>
@endsection
