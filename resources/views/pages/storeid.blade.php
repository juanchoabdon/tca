@extends("app")

@section('head_title', 'Tienda Mircol | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")

 <!-- begin:header -->
    <div id="header" class="heading" style="background-image: url({{ URL::asset('assets/img/img01.jpg') }});">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-12">
            <div class="page-title">
              <h2>Tienda</h2>
            </div>
            <ol class="breadcrumb">
              <li><a href="{{ URL::to('/') }}">Home</a></li>
              <li class="active">Tienda</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- end:header -->

    <!-- begin:content -->
    <div id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5 col-md-offset-1">
            <img class="img-responsive" src="{{ URL::asset('upload/properties/'.$producto->img.'-b.png') }}"  alt="person">
        </div>
        <div class="col-md-4">
          <h2>{{$producto->title}}</h2>
          <div class="container">
            <div class="row"><h3><p>$ {{$producto->price}} COP
              @if(empty(Auth::user()))
            </h3><a href="/login">Ingresa para hacer compras</a> o  <a href="/register">Regístrate aqui.</a>
              @else
              <a  class="btn btn-success" style="background-color :#a6c307 !important;border-color:#a6c307 !important;"href="/store/buy/{{$producto->id}}"> Paga con PayU</a>
              <a  class="btn btn-success" style="background-color :#3661a5 !important;border-color:#3661a5 !important;"href="https://www.zonapagos.com/t_cmmircolombia"> Paga con PSE</a>


            </p></h3>
              @endif
              </div>
              </div>

            {!! $producto->description!!}
            <br>
            <br>



          <br>
          <br>

        </div>
      </div>
    </div>
    <!-- end:content -->

@endsection
