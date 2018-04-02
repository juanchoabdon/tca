@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">

		<div class="pull-right">
				@if(Auth::User()->usertype=="Admin")
			<a href="{{URL::to('admin/soft-trainings/add')}}" class="btn btn-primary">Crear Entrenamiento <i class="fa fa-plus"></i></a>
			@endif
		</div>
		<h2>Entrenamientos en habilidades blandas</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
    <div class="panel-body">
       <table id="data-table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
            <thead>

	            <tr>
	                <th>Titulo</th>
									<th>Clases</th>
									<th>Inscritos</th>
	                <th>Precio</th>
	                <th>Acción</th>
	            </tr>

            </thead>

            <tbody>
            @foreach($trainings as $training)
	            <tr>
	                <td>{{$training->title}}</td>
									<td>3</td>
									<td>{{$training->cantidad}}</td>
	                <td>{{$training->price}}</td>
	                <td>

                		<div class="btn-group">
								<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Acciones <span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="soft-trainings/edit/{{$training->id}}"><i class="md md-edit"></i> Editar Informacion General</a></li>
									<li><a href="soft-trainings/{{$training->id}}"><i class="md md-edit"></i> Contenido del Entrenamiento</a></li>
									<!-- <li><a href="training/streaming/{{$training->id}}"><i class="fa fa-eye"></i> Transmitir en vivo</a></li> -->
										@if(Auth::User()->usertype=="Admin")
										<li><a href="soft-trainings/delete/{{$training->id}}" onclick="return confirm('Estas seguro?.')"><i class="md md-delete"></i> Eliminar</a></li>
										@endif
								</ul>
						</div>

            		</td>



	            </tr>
	            @endforeach


            </tbody>
        </table>

    </div>

</div>

</div>



@endsection
