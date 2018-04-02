@extends("app.admin_app")

@section("content")
<div class="content">
			<h2 class="content-heading">Entrenamientos</h2>




	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif




		<!--	<div class="panel panel-default panel-shadow">
			    <div class="panel-body">

				@foreach($trainings as $training)

				@if(in_array($training->id,$features))
						<a href="/app/entrenamiento/{{$training->id}}">
							<div class="col-sm-6 col-md-4">
							<div class="thumbnail">
								@if(in_array($training->id,$live))
								<div style="padding-top: 5px;padding-bottom: 5px;position:absolute;">
									<center style="background-color: rgba(255, 255, 255, 0.83);margin-left: 5px;padding-left: 5px;padding-right: 5px;">
										<i class="fa fa-circle" style="color:red" aria-hidden="true"></i> {{"En vivo"}}
								  </center>
								</div>
								@endif
								<img style="img-responsive" src="/upload/training/{{$training->img}}-s.jpg" data-holder-rendered="true">
								 <div class="caption">
									  <h3><b>{{$training->title}}</b></h3>
										<h5>{{$training->subtitle}}</h5>
										 <p>{{$training->description}}</p>
								 </div>
							</div>
						</a>
					 </div>
					 @endif
					@endforeach

			    </div>

			</div> -->
			<div class="panel panel-default panel-shadow">
			    <div class="panel-body">

				@if (!empty($trainings_id))

				@foreach($trainings as $training)
						@if(in_array($training->id,$features)||($agc && in_array($training->id,$trainings_id)))
		      		<div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
		          <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
		              <img class="img-fluid options-item" src="/upload/training/{{$training->img}}-s.jpg" alt="">
		              <div class="options-overlay bg-black-op-75">
		                  <div class="options-overlay-content">
		                      <h4 class="h4 text-white mb-5">{{$training->title}}</h4>
		                      <h4 class="h6 text-white-op mb-15">{{$training->subtitle}}</h4>
		                      <a class="btn btn-tca btn-sm btn-rounded btn-noborder min-width-75 img-lightbox" href="/app/entrenamiento/{{$training->id}}">
		                          <i class="fa fa-search-plus"></i> Ver
			                        </a>
			                    </div>
			                </div>
			            </div>
			        </div>
						 @endif
				  @endforeach



       </div>
			  @else
	   <div class="row">
		   <div class="col-12 col-md-12 col-xl-12 offset-md-5">

				<a class="block block-link-shadow text-center" href="javascript:void(0)">
					<div class="block-content">
					<p class="mt-5">
						<i class="si si-badge fa-4x"></i>
					</p>
					 <p class="font-w600">Próximamente encontrarás entrenamientos técnicos que te ayudarán a ser un trader profesional</p>
				</div>
			</a>
		</div>

	   </div>


	  @endif

</div>
</div>



@endsection
