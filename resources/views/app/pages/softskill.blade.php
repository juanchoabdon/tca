@extends("app.admin_app")

@section("content")
<link rel="stylesheet" href="https://cdn.plyr.io/2.0.13/plyr.css">

<style media="screen">
	.plyr__progress--played, .plyr__volume--display {
		z-index: 1;
		color:  #E3CE11 !important;
		background: 0 0;
		transition: none;
	}
	.plyr__play-large {
    background:  #E3CE11 !important;
    color: #fff;
  }

	.plyr--video .plyr__controls button.tab-focus:focus, .plyr--video .plyr__controls button:hover {
    background:  #E3CE11 !important;
    color: #fff;
   }

	 .plyr input[type=range]::-ms-fill-lower {
	     height: 8px;
	     border: 0;
	     border-radius: 4px;
	     -ms-user-select: none;
	     user-select: none;
	     background:  #E3CE11 !important;
	 }

	 .plyr input[type=range]:active::-webkit-slider-thumb {
	     background:  #E3CE11 !important;
	     border-color: #fff;
	     transform: scale(1.25)
	 }

	 .plyr input[type=range]:active::-moz-range-thumb {
	     background:  #E3CE11 !important;
	     border-color: #fff;
	     transform: scale(1.25)
	 }
	 .plyr input[type=range]:active::-ms-thumb {
	     background:  #E3CE11 !important;
	     border-color: #fff;
	     transform: scale(1.25)
	 }

	 .video-js .vjs-big-play-button {
	 display: none;
	 }

</style>
<div class="content">
			<h2 class="content-heading">Contenido de {{$softskill->title}}</h2>

	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif
<br>


 <div class="row">
  @foreach($contents as $content)

	 				<div class="col-md-6 col-xl-3">
						<a class="block block-rounded block-link-pop text-center" href="/app/softskills/ver/{{$content->id}}">
								<div class="block-content block-content-full bg-image" style="background-image: url('https://s3.amazonaws.com/tjn-blog-images/wp-content/uploads/2015/12/19235447/what-does-your-handshake-say-about-you-810x540.jpg');">
								  <img class="img-avatar img-avatar-thumb" src="http://tradingclubacademy.com/assets/images/play.png" alt="">
								</div>
								<div class="block-content block-content-full">
										<div class="font-w600 mb-5">{{$content->titulo}}</div>
										<!-- <div class="font-size-sm text-muted">  {!! $content->description !!}</div> -->
								</div>
						</a>
		      </div>


  @endforeach
	 </div>



	 <script src="https://cdn.plyr.io/2.0.13/plyr.js"></script>
	 <script type="text/javascript">
	 	plyr.setup({
	     debug: true,
	 		autoplay: true,
		  controls: ['mute', 'volume','fullscreen']
	   });
	 </script>



	 <style>
 	.vjs-hidden, .vjs-play-control, .vjs-current-time ,.vjs-volume-panel,.vjs-remaining-time-display, .vjs-control-bar   {
 	display: none;
 	}
 	</style>
@endsection
