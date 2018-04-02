@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">

		<div class="pull-right">
      <a href="{{URL::to('admin/multinivel/nivel/add')}}" class="btn btn-primary">Nivel <i class="fa fa-plus"></i></a>


		</div>
		<h2>Rangos</h2>
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

	                <th>id</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Miembros Activos</th>
                  <th>Recompensa</th>
	                <th class="text-center width-100">Acción</th>
	            </tr>
            </thead>

            <tbody>
            @foreach($levels as $level)
         	   <tr>

                <td>{{ $level->id}}</td>
                <td>{{ $level->nombre}}</td>
                <td>{{ $level->descripcion}}</td>
                <td>{{ $level->active_membres}}</td>
                <td>{{ $level->recompensa}}</td>
                <td class="text-center">
                <div class="btn-group">
								<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Acciones<span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="{{ url('admin/multinivel/nivel/edit/'.$level->id) }}"><i class="md md-edit"></i> Editar</a></li>
									<li><a href="{{ url('admin/multinivel/delete/'.$level->id) }}"><i class="md md-delete"></i> Eliminar</a></li>
								</ul>
							</div>

            </td>

            </tr>
           @endforeach

            </tbody>
        </table>
    </div>
    <div class="clearfix"></div>
</div>

</div>



@endsection
