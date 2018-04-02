@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		<h2>Transacciones</h2>
	</div>
	@if(Session::has('flash_message'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
		</button>
				 {{ Session::get('flash_message') }}
 </div>
	@endif
  <div class="container-fluid">
    <table class="table table-bordered table-responsive">
      <tr>
        <th>id</th>
        <th>Cedula</th>
        <th>Estado</th>
        <th style="white-space: nowrap;">Valor</th>
        <th>Fecha</th>
        <th>Tipo</th>
        <th>Producto</th>
      <!--  <th>Comision</th>-->

        <th>Borrar</th>
      </tr>
      @foreach($transacciones as $transaccion)
        <tr>
          <td>
            {{$transaccion->id}}
          </td>
          <td>

						<a href="/admin/users/adduser/{{$transaccion->user_id}}" target="_blank">
							<i class="fa fa-user" aria-hidden="true"></i>
							{{$transaccion->user_id}}
						</a>

          </td>
          <td>
            @if($transaccion->estado->name == "APROBADA")<p style="color:green;">{{$transaccion->estado->name}}@else {{$transaccion->estado->name}} </p>@endif

          </td>
          <td>
          $ {{money($transaccion->price)}}
          </td>
          <td>
            {{$transaccion->date}}
          </td>
          <td>
            @if($transaccion->type == 1) {{ "Suscripcion" }}   @endif
            @if($transaccion->type == 2) {{ "Entrenamiento" }}   @endif
            @if($transaccion->type == 3) {{ "Estrategia" }}   @endif
            @if($transaccion->type == 4) {{ "Señales" }}   @endif
						@if($transaccion->type == 5) {{ "AGC" }}   @endif

          </td>

          <td>{{$transaccion->titulo}}</td>
          <!--<td>$ {{$transaccion->comision}}</td>-->

          <td>
            <a href="transacciones/delete/{{$transaccion->id}}" onclick="return confirm('Estas seguro?.')" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
          </td>
        </tr>
      @endforeach

    </table>

    {!! $transacciones->render() !!}

  </div>

<br>
</div>
@endsection
