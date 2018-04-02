@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">

		<div class="pull-right">
			<a href="{{URL::to('admin/cities/addcity')}}" class="btn btn-primary">Añadir ciudad <i class="fa fa-plus"></i></a>
		</div>
		<h2>Ciudades</h2>
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

	                <th class="text-center width-100">Acción</th>
	            </tr>
            </thead>

            <tbody>
            @foreach($allcities as $i => $city)
         	   <tr>

                <td>{{ $city->city_name }}</td>

                <td class="text-center">
                <div class="btn-group">
								<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Acciones <span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li>
										@if($city->status==1)
					                	<a href="{{ url('admin/cities/status/'.$city->id) }}"><i class="md md-close"></i> No publicar</a>
					                	@else
					                	<a href="{{ url('admin/cities/status/'.$city->id) }}"><i class="md md-check"></i> Publicar</a>
					                	@endif
									</li>
									<li><a href="{{ url('admin/cities/addcity/'.$city->id) }}"><i class="md md-edit"></i> Editar</a></li>
									<li><a href="{{ url('admin/cities/delete/'.$city->id) }}"><i class="md md-delete"></i> Eliminar</a></li>
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
