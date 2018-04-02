@extends("app.admin_app")

@section("content")

<div class="content">
			<h2 class="content-heading">Dashboard</h2>

<div class="row">
 <div class="col-sm-12 text-center" style="color: #666666">
	  <br>
	  @if($agc)
	  	<img src="{{ URL::asset('upload/'.getcong('site_logo')) }}" alt="" width="300px;">
	  @else
	  	<img src="{{ URL::asset('upload/'.getcong('site_logo')) }}" alt="" width="300px;">
	  @endif
	 <br>
	  <br>
	 <h1>¡Bienvenido {{ Auth::user()->name }}!</h1>
	 <br>
	 <h4>{{getcong('site_motivation')}}</h4>
 </div>


</div>

</div>

@endsection
