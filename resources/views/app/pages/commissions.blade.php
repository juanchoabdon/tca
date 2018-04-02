@extends("app.admin_app")

@section("content")

<div class="content">
  <h2 class="content-heading">Comisiones</h2>


  @if (count($commissions)> 0)
  <table class="table table-responsive table-bordered">
    <tr>


      <th>id</th>
      <th>Monto (USD)</th>
      <th>Monto (BTC)</th>
      <th>Fecha</th>
      <th>Estado</th>
      <th>Observacion</th>

    </tr>
    <tr>

      @foreach($commissions as $commission)
      <td>
        {{$commission->id}}
      </td>
      <td>
        <p style="color:green;">  + $ {{$commission->amount}}</p>
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

  </table>

  @else


      <div class="row">
          <div class="col-12 col-md-12 col-xl-12 offset-md-5">

                   <a class="block block-link-shadow text-center" href="javascript:void(0)">
                       <div class="block-content">
                       <p class="mt-5">
                           <i class="fa fa-frown-o fa-4x"></i>
                       </p>
                       <p class="font-w600">Aún no tienes comisiones por venta</p>
                   </div>
               </a>
           </div>
      </div>

  @endif
</div>


@endsection
