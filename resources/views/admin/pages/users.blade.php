@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">

		<div class="pull-right">
			<!--<a href="{{URL::to('admin/users/addcsv')}}" class="btn btn-primary">Añadir Aportes <i class="fa fa-plus">			</i></a>-->
			<a href="{{URL::to('admin/users/adduser')}}" class="btn btn-primary">Añadir usuario <i class="fa fa-plus"></i></a>
		</div>
		<h2>Usuarios</h2>
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
	                <th>Tipo</th>
	                <th>CC</th>
	                <th>Nombre</th>
	                <th>Email</th>
					        <th>Teléfono</th>
	                <th class="text-center width-100">Acción</th>
	            </tr>
            </thead>

            <tbody>
            @foreach($allusers as $i => $users)
         	   <tr>
            	<td>{{ $users->usertype }}</td>
            	<td>{{ $users->id }} </td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email}}</td>
                <td>{{ $users->phone}}</td>
                <td class="text-center">
                <div class="btn-group">
								<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Acciones<span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="{{ url('admin/users/adduser/'.$users->id) }}"><i class="md md-edit"></i> Editar</a></li>

									<li><a onclick="return confirm('Estas seguro?.')" href="{{ url('admin/users/delete/'.$users->id) }}"><i class="md md-delete"></i> Eliminar</a></li>

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
