@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">

		<div class="pull-right">
			<a href="{{URL::to('admin/properties/addproperty')}}" class="btn btn-primary">Añadir Inmueble <i class="fa fa-plus"></i></a>

			<a href="{{ URL::to('admin/types') }}" class="btn btn-primary"><i class="fa fa-tags"></i>Tipos de Inmuebles</a>

			<a href="{{ URL::to('admin/cities') }}" class="btn btn-primary"><i class="md md-location-city"></i>Ciudades</a>

		</div>
		<h2>Inmuebles</h2>
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
	                <th>ID</th>
	                <th>Agente</th>
	                <th>Nombre</th>
					<th>Tipo</th>
					<th>Proposito</th>
	                <th class="text-center">Estado</th>
	                <th class="text-center width-100">Acción</th>
	            </tr>
            </thead>

            <tbody>
            @foreach($propertieslist as $i => $property)
         	   <tr>

				<td>{{ $property->id }}</td>
				<td>{{ getUserInfo($property->user_id)->name }}</td>
                <td>{{ $property->property_name }}</td>
				<td>{{ getPropertyTypeName($property->property_type)->types }}</td>
				<td>{{ $property->property_purpose }}</td>
				<td class="text-center">
						@if($property->status==1)
							<span class="icon-circle bg-green">
								<i class="md md-check"></i>
							</span>
						@else
							<span class="icon-circle bg-orange">
								<i class="md md-close"></i>
							</span>
						@endif
            	</td>
                <td class="text-center">
                <div class="btn-group">
								<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Acciones <span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="{{ url('admin/properties/addproperty/'.$property->id) }}"><i class="md md-edit"></i> Editar</a></li>


									<li>
										@if($property->featured_property==0)
					                	<a href="{{ url('admin/properties/featuredproperty/'.$property->id) }}"><i class="md md-star"></i> Poner en destacado</a>
					                	@else
					                	<a href="{{ url('admin/properties/featuredproperty/'.$property->id) }}"><i class="md md-check"></i> Quitar destacado</a>
					                	@endif
									</li>


									<li>
										@if($property->status==1)
					                	<a href="{{ url('admin/properties/status/'.$property->id) }}"><i class="md md-close"></i> No publicar</a>
					                	@else
					                	<a href="{{ url('admin/properties/status/'.$property->id) }}"><i class="md md-check"></i> Publicar</a>
					                	@endif
									</li>
									<li><a href="{{ url('admin/properties/delete/'.$property->id) }}" onclick="return confirm('Estas seguro?.')"><i class="md md-delete"></i> Eliminar</a></li>
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
