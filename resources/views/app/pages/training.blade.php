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
			<h2 class="content-heading">Contenido de {{$training->title}}</h2>

	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

	@if(!empty($live))
	@if($live->status=="1")
	<div class="row">

	  <script src="https://unpkg.com/video.js/dist/video.js"></script>
	  <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.min.js"></script>
	  <script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>
	<body onLoad="Check()">

		<div class="col-md-7 col-md-offset-1" id="flash" style="display:none;">
		<h3><b>En Vivo</b></h3>
		<video id="Video" class="video-js vjs-default-skin video-responsive" controls autoplay
		 width="auto" height="410px"
		data-setup='{"techOrder": ["flash"], "nativeControlsForTouch": false,
		"controlBar": { "muteToggle": false, "volumeControl": false, "timeDivider": false,
		"durationDisplay": false, "progressControl": false } }'>
		<source src="{{$stream}}" type='rtmp/mp4'/>
		</div>

		<div class="col-md-8  col-md-ofsset-1" id="noflash">
			<object width="auto" height="410px" id="elementID">
			<param name="movie" value="somefilename.swf">
			<embed src="/support/somefilename.swf" width="550" height="400">
			</embed>
		</div>

		<script type="text/javascript">
			function Check() {
			var hasFlash = false;
			try {
			var fo = new ActiveXObject('ShockwaveFlash.ShockwaveFlash');
			if(fo) hasFlash = true;
			}catch(e){
			if(navigator.mimeTypes ["application/x-shockwave-flash"] != undefined){
			  hasFlash = true;
			    var x = document.getElementById('flash');
				   x.style.display = 'block';
					var z = document.getElementById('noflash');
					 z.style.display = 'none';
			  }
			}
		}


		</script>

		</object>



</div>
		<div class="col-md-3">
			<iframe src="/chatTca/chat.php?id={{Auth::user()->id}}&name={{Auth::user()->name}}&room={{$id}}" width="350" height="500"></iframe>
		</div>

</body>
@endif
@endif
<br>


 <div class="row">
  @foreach($contents as $content)

	 				<div class="col-md-6 col-xl-3">
						<a class="block block-rounded block-link-pop text-center" href="/app/entrenamiento/ver/{{$content->id}}">
								<div class="block-content block-content-full bg-image" style="background-image: url('http://www.forexsignal.today/wp-content/uploads/2016/07/108.jpg');">
										<img class="img-avatar img-avatar-thumb" src="http://tradingclubacademy.com/assets/images/play.png" alt="">
								</div>
								<div class="block-content block-content-full">
										<div class="font-w600 mb-5">{{$content->titulo}}</div>
										<!-- <div class="font-size-sm text-muted">  {!! $content->descripcion !!}</div> -->
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
