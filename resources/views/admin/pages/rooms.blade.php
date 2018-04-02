@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">

		<div class="pull-right">
			<a href="{{URL::to('admin/rooms/add')}}" class="btn btn-primary">Añadir Sala <i class="fa fa-plus"></i></a>
		</div>
		<h2>Trading en vivo</h2>
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
	                <th>Nombre</th>
					<th>Descripción</th>
                    <th>Estado</th>
					<th>Acciones</th>
	            </tr>

            </thead>

            <tbody>
            @foreach($rooms as $room)
	            <tr>
	                <td>{{$room->name}}</td>
	                <td>{{$room->description}}</td>
                    @if($room->status==1)
                    <td>Activa</td>
                    @else
                    <td>Inactiva</td>
                    @endif

	                <td>

                		<div class="btn-group">
								<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Acciones <span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">

                                  <li><a href="rooms/edit/{{$room->id}}"><i class="md md-edit"></i>Editar</a></li>
                                  <li><a href="rooms/delete/{{$room->id}}"><i class="md md-delete"></i>Eliminar</a></li>

                                 @if($room->status==1)
                                  <li><a href="rooms/status/{{$room->id}}"><i class="md md-stop"></i> Desactivar</a></li>
                                  @else
                                   <li><a href="rooms/status/{{$room->id}}"><i class="md md-play-arrow"></i> Activar</a></li>
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
