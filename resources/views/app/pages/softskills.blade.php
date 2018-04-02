@extends("app.admin_app")

@section("content")
<div class="content">
			<h2 class="content-heading">Desarrollo personal</h2>


	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif




<div class="panel panel-default panel-shadow">
    <div class="panel-body">
		@if (count($softskills)>0)

		@foreach($softskills as $softskill)
	  <a href="/app/softskills/{{$softskill->id}}" style="outline: 0;text-decoration: none;color: black;">
	  <div class="row" style="margin-bottom:20px;">
		<div class="col-md-4 " style="background-color: #f8f8f8;">
			<div class="block-content block-content-full bg-image" style="background-image: url('https://www.westuc.com/files/Meeting%20at%20Table.jpg');">
					<img class="img-avatar img-avatar-thumb" src="http://tradingclubacademy.com/assets/images/play.png" alt="">
			</div>
		<div class="col-md-8"><br>
		<h4>{{$softskill->title}}</h4>
		<p>{!! $softskill->subtitle !!}</p>
		</div>
	  </div>
	  </div>
	  </a>
		@endforeach

		@else

		<div class="row">
			<div class="col-12 col-md-12 col-xl-12 offset-md-5">

				 <a class="block block-link-shadow text-center" href="javascript:void(0)">
					 <div class="block-content">
					 <p class="mt-5">
						 <i class="si si-badge fa-4x"></i>
					 </p>
						 <p class="font-w600">Próximamente encontrarás entrenamientos de desarrollo personal que te ayudarán a ser un trader profesional</p>
				 </div>
			 </a>
		 </div>

		</div>
		@endif

    </div>

</div>

</div>



@endsection
