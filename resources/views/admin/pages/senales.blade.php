@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		<h2>Correo</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif
	@if(Session::has('flash_error'))
					<div class="alert alert-warning">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
						{{ Session::get('flash_error') }}
					</div>
	@endif
	<div class="col-sm-10 col-xl-8">
	<h3>Envía una señal o correo a :</h3><br><br>
	{!! Form::open(['url' => 'admin/email','method' => 'post','enctype' => 'multipart/form-data']) !!}

	<select class="form-control" onchange="setOption()" id="users" name="users">
		<option selected id="op0" value="4">Selecciona</option>
		<option  id="op1" value="1">Todos los usuarios</option>
		<option id="op2" value="2">Usuarios con membresía activa</option>
		<option id="op2" value="3">Usuarios con membresía inactiva</option>
	</select><br>

		<label>Asunto</label>
		<input type="text" name="subject" class="form-control"><br><br>
		<label>Contenidol</label>
		 <textarea class="form-control summernote" name="content" rows="8"></textarea><br>
		<center>
		   <button type="submit" class="btn btn-success">Enviar</button>
	   </center>
   </div>


	{!! Form::close() !!}

<!--
<div class="panel panel-default panel-shadow">
    <div class="panel-body">
       <table id="data-table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
            <thead>

	            <tr>
	              <th>Titulo</th>
				  <th>Precio</th>
                  <th>Fecha</th>
                  <th>Duracion</th>
				  <th>Editar</th>
	            </tr>

            </thead>

            <tbody>
            @foreach($señales as $señal)
	            <tr>
	                <td>{{$señal->titulo}}</td>
	                <td>{{$señal->precio}}</td>
                    <td>{{$señal->meses}}</td>
                    <td>{{$señal->fecha}}</td>
	                <td>

                		<div class="btn-group">
								<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Acciones <span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">

                  <li><a href="senales/edit/{{$señal->id}}"><i class="md md-edit"></i> Editar </a></li>

                </ul>
						</div>

            		</td>



	            </tr>
	            @endforeach


            </tbody>
        </table>

    </div>

</div>

</div>-->



@endsection
