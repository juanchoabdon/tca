@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">

		<h2>Conversatorios</h2>
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
	                <th>Numero #</th>
	                <th>Nombre</th>
	                <th>Fecha inscripcion </th>
	                <th>Contacto</th>
	            </tr>

            </thead>

            <tbody>
            <?php $i=1; ?>
             @foreach($inscribed as $inscribe)
	            <tr>
                <td><?php echo $i++; ?></td>
	                <td>{{$inscribe->users[0]->name }}</td>
	                <td>{{$inscribe->date}}</td>
	                <td>
                    <a class="btn btn-primary" href="#"> Ver <i class="fa fa-eye"></i></a>
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
