@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">

		<div class="pull-right">
			<!--<a href="{{URL::to('admin/users/addcsv')}}" class="btn btn-primary">Añadir Aportes <i class="fa fa-plus">			</i></a>-->
			<a href="{{URL::to('admin/multinivel/nivel')}}" class="btn btn-primary">Rangos</i></a>
			<a href="{{URL::to('admin/multinivel/comisiones')}}" class="btn btn-primary">Comisiones</i></a>
		</div>
		<h2>Equipos</h2>
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

	                <th>Cedula</th>
									<th>Nombre</th>
									<th>Nivel</th>
	                <th class="text-center width-100">Acción</th>
	            </tr>
            </thead>

            <tbody>
            @foreach($networkers as $networker)
         	   <tr>
							 <td> {{ $networker->user_id}}</td>
                <td>
									@if($networker->user)
									{{$networker->user->name}}
									@endif
									</td>

								<td>
									@if($networker->nivel)
										{{ $networker->nivel->nombre}}
								 @endif
								</td>

                <td class="text-center">
                <div class="btn-group">
								<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Acciones<span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="{{ url('/admin/users/adduser/'.$networker->user_id) }}"><i class="md md-edit"></i>Ver/Editar</a></li>
									<li><a href="{{ url('/admin/multinivel/team/'.$networker->id) }}"><i class="fa fa-users"></i> Equipo</a></li>

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
