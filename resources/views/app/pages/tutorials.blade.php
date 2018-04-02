@extends("app.admin_app")

@section("content")
<div class="content">
			<h2 class="content-heading">Tutoriales</h2>


	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif




<div class="panel panel-default panel-shadow">
    <div class="panel-body">

			@foreach($tutorials as $tutorial)
		  <a href="/app/tutorials/ver/{{$tutorial->id}}" style="outline: 0;text-decoration: none;color: black;">
		  <div class="row" style="margin-bottom:20px;">
		    <div class="container" style="background-color: #f8f8f8;">
		    <div class="col-md-2" style="padding-left: 0px;">
		      <img src="http://retreat.guru/images/placeholder-video.png" class="img-responsive">
		    </div>
		    <div class="col-md-8"><br>
		    <h4>{{$tutorial->title}}</h4>
		    </div>
		  </div>
		  </div>
		  </a>
			@endforeach
			@if (count($tutorials)< 1)
			<div class="row">
				<div class="col-12 col-md-12 col-xl-12 offset-md-5">

					 <a class="block block-link-shadow text-center" href="javascript:void(0)">
						 <div class="block-content">
						 <p class="mt-5">
							 <i class="si si-badge fa-4x"></i>
						 </p>
						 <p class="font-w600">Próximamente encontrarás tutoriales que te ayudarán a manejar la plataforma de AGC</p>
					 </div>
				 </a>
			 </div>

			</div>

			@endif


    </div>

</div>

</div>



@endsection
