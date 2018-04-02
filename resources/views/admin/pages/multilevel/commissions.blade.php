@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		<div class="pull-right">
			<a href="{{URL::to('admin/multilevel/download/commissions')}}" class="btn btn-primary">Descargar Comisiones &nbsp;<i class="fa fa-download" aria-hidden="true"></i></a>
		</div>
		<h2>Comisiones</h2>
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
		      <th>Cedula</th>
					<th>Nombres</th>
					<!--<th>Transaccion Pagada por</th>-->
          <th>Monto (USD)</th>
          <th>Monto (BTC)</th>
          <th>Fecha</th>
          <th>Estado</th>
          <th>Observacion</th>
        </tr>
	</thead>
	<tbody>
        <tr>

          @foreach($commissions as $commission)
          <td>
            {{$commission->id}}
          </td>
					<td>
						{{$commission->multilevel_users_id}}
					</td>
					<td>
						{{$commission->user->name}}
					</td>
					<!-- <td>
						@if($commission->transaction)
						{{$commission->transaction->user->name}}
						@endif
					</td> -->
          <td>
            <p ><span style="color:green;">  + ${{ $commission->amount}}</span>
							<?php

							if ($commission->multilevel_users_id!=$id_user) {
								$id_user = $commission->multilevel_users_id;
								$treintayCinco = 1;
								$quince = 1;
								$diez = 1;
							}
							if ($commission->amount == "35") {
								echo '<span class="badge" style="background-color:#0B0B3B;">'. $treintayCinco++ . '</span>';
							}
							if ($commission->amount == "15") {
								echo '<span class="badge" style="background-color:#FF8000;">'. $quince++ . '</span>';
							}
							if ($commission->amount == "10") {
								echo '<span class="badge" style="background-color:#5FB404;">'. $diez++ . '</span>';
							}


							 ?>

						</p>
          </td>
          <td>
            {{$commission->amount_btc}}
          </td>
          <td>
            {{$commission->date}}
          </td>
          <td>
            @if($commission->status=="1")
            {{"Pagada"}}
            @else
            {{"Pendiente por Pagar"}}
            @endif
          </td>
          <td>
            {{$commission->observacion}}
          </td>

					</tr>

          @endforeach
    </tbody>
</table><br><br>
			<div class="row">
			<div class="col-md-4"><b>Total - Ultimo corte (corte cada 28)</b>
				<table class="table table-bordered">
				<tr>
					<td>Total a pagar en USD: </td>
					<td>{{$amount}}</td>
				</tr>
				<tr>
					<td>Total a pagar en BTC: </td>
					<td>{{$amount_BTC}}</td>

				</tr>
				<tr>
					<td>Total Ganancias</td>
					<td>${{$ganancias}}</td>
				</tr>
				<tr>
					<td>Total Ventas</td>
					<td>${{$ventas}}</td>
				</tr>

			</table>
			</div>
		</div>
    </div>

    <div class="clearfix"></div>
</div>

</div>



@endsection
