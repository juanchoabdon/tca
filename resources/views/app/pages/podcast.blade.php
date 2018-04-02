@extends("app.admin_app")

@section("content")
    <div class="content">
	 <h2 class="content-heading">Podcast</h2>
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
	@foreach($podcast as $podcast)
	@if(!empty($features))
			<a href="/app/podcast/{{$podcast->id}}">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">

	           <img style="img-responsive" src="/assets/images/podcast.jpg" data-holder-rendered="true">
						 <div class="caption">
							  <h3><b>{{$podcast->title}}</b></h3>
								 <p>{!! $podcast->description !!}</p>

	               <center>
	                 <br>
	               <div align="center" style="margin-bottom: 10%">
	                   <audio controls style="width: 100%" >
	                       <source src="{{$podcast->audio_url}}" type="audio/mpeg">
	                   </audio>
	               </div>


	             </center>

						 </div>

					</div>
			</a>
		 </div>
		 @endif
		@endforeach

    </div>

</div>

</div>



@endsection
