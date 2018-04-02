@extends("app")

@section(getcong('site_name') )
@section('head_url', Request::url())

@section("content")
<!-- begin:header -->
    <div id="header" class="heading" style="background-image: url({{ URL::asset('assets/img/img01.jpg') }});">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-12">
            <div class="page-title">
              <h2>Transacciones</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end:header -->
<!-- begin:content -->
    <div id="content">
      <div class="row">
        @if(Auth::check())
        @if(Auth::user()->usertype == "Owner")
        <center><a href="{{ URL::to('bricks/') }}" style="color: #4fc1e9;">
           Actualmente tienes
           <i class="fa fa-cube" aria-hidden="true"></i>
           @if(getUserBricks(Auth::user()->id)=="")
           {{'0-'}}
           @else
            {{getUserBricks(Auth::user()->id)}}


           @endif

           Ladrillos
        </a>
      </center>
        @endif
        @endif
      </div><br>

      <div class="container">
          <table class="table table-bordered table-responsive">

            <tr>
              <th>
                Numero de transaccion
              </th>
              <th>
                Estado
              </th>
              <th>
                Descripcion
              </th>
              <th>
                Producto
              </th>
              <th>
                Precio
              </th>
              <th>Cantidad</th>
              <th>
                Fecha
              </th>
            </tr>
            @foreach($transacciones as $transaccion)
            <tr>
              <td>
                {{$transaccion->id}}
              </td>
             <td>@if($transaccion->estado->name == "APROBADA")<p style="color:green;">{{$transaccion->estado->name}}@else {{$transaccion->estado->name}} </p>@endif

              </td>

              <td>
                {{$transaccion->titulo}}
              </td>
              <td>
                @if($transaccion->type == 1) {{ "Paquete de ladrillos" }}   @endif
                @if($transaccion->type == 2) {{ "Póliza" }}   @endif
                @if($transaccion->type == 3) {{ "Seguro" }}   @endif
                @if($transaccion->type == 4) {{ "Fondos de ahorro e inversión" }}   @endif

              </td>
              <td>
                $ {{$transaccion->bricks}}
              </td>
              <td>
                {{$transaccion->cantidad}}
              </td>

              <td>
                {{$transaccion->date}}
              </td>


            </tr>


            @endforeach
          </table>
      </div>
    </div>
    <!-- end:content -->

@endsection
