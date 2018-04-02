@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">

		<div class="pull-right">
			<a href="{{URL::to('admin/senales/add')}}" class="btn btn-primary">Añadir Señal <i class="fa fa-plus"></i></a>
		</div>
		<h2>Señales</h2>
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
                  <li><a href="senales/{{$señal->id}}"><i class="md md-edit"></i> Contenido de la señal </a></li>

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
