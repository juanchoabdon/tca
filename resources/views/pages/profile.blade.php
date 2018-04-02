@extends("app")

@section('head_title', 'Transacciones | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
<!-- begin:header -->
    <div id="header" class="heading" style="background-image: url({{ URL::asset('assets/img/img01.jpg') }});">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-12">
            <div class="page-title">
              <h2>Perfil</h2>
            </div>
            <ol class="breadcrumb">
              <li><a href="{{ URL::to('/') }}">Home</a></li>
              <li class="active">Perfil</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- end:header -->
<!-- begin:content -->
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="blog-container">
              <div class="blog-content" style="padding-top:0px;">
                
              <form method="post" action="profile">
               		<div class="blog-text" style="padding-top:0px;">
                  <label>Cédula</label>
                  <input type="text" class="form-control" value="{{Auth::user()->id}}">
                  <br>
                  <label>Nombre</label>
                  <input type="text" class="form-control" value="{{Auth::user()->name}}">
                  <br>
                  <label>Email</label>
                  <input type="text" class="form-control" value="{{Auth::user()->email}}">
                  <br>
                  <label>Telefono</label>
                  <input type="text" class="form-control" value="{{Auth::user()->phone}}">
                  <br>
                  <label>Dirección</label>
                  <input type="text" class="form-control" value="{{Auth::user()->address}}">
                  <br>
                  <label>Ciudad</label>
                  <input type="text" class="form-control" value="{{Auth::user()->city}}">
                  <br>
                  <center>
                    <input type="submit" class="btn btn-primary" value="Actualizar">
                  </center>
					         </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end:content -->

@endsection
