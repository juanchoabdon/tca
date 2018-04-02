@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">

		<div class="pull-right">
			<a href="{{URL::to('admin/master-accounts/add')}}" class="btn btn-primary">Añadir Cuenta <i class="fa fa-plus"></i></a>
		</div>
		<h2>Cuentas Madre</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="content">
    <div class="panel-body">
       <table id="data-table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
            <thead>
	             <tr>
					<th>Título</th>
					<th>Server</th>
					<th>URL</th>
	            </tr>
            </thead>

            <tbody>
            @foreach($accounts as $account)
	            <tr>
					<td>{{$account->title}}</td>
	                <td>{{$account->mt4_server}}</td>
					 <td>{{$account->url}}</td>
	                <td>

                		<div class="btn-group">
								<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Acciones <span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">

			                  <li><a href="master-accounts/edit/{{$account->id}}"><i class="md md-edit"></i> Editar </a></li>
							<li><a href="master-accounts/delete/{{$account->id}}" onclick="return confirm('Estas seguro?.')"><i class="fa fa-trash"></i> Eliminar</a></li>

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
