@extends("admin.admin_app")

@section("content")


  <link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
  <script src="https://unpkg.com/video.js/dist/video.js"></script>
  <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.min.js"></script>
  <script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>
<body onLoad="Check()">

	<div class="page-header">

		<div class="pull-right">


			@if($livestatus==null)
			<a href="/admin/training/live/enable/{{$id}}" class="btn btn-success " style="background-color:#5cb85c !important">
			Activar EN VIVO
			</a>
			@else
			@if($livestatus->status==0)
			<a href="/admin/training/live/enable/{{$id}}" class="btn btn-success " style="background-color:#5cb85c !important">
			Activar EN VIVO
			</a>
			@else
			<a href="/admin/training/live/disable/{{$id}}" class="btn btn-success " >
			Desactivar EN VIVO
			</a>
			@endif
			@endif
			<a href="{{URL::to('admin/bricks/addbricks')}}" class="btn btn-primary">Crear Entrenamiento <i class="fa fa-plus"></i></a>

		</div>
		<h2>Entrenamientos</h2>





	</div>
	@if(Session::has('flash_message'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button>
				{{ Session::get('flash_message') }}
	</div>
	@endif
	<p>Para emitir en este canal conectese a obs<br>
	url: <b>rtmp://tradingclubacademy.com/live</b><br>
	Clave de retrasmision <b> {{ $training->slug }} </b>

	</p>


	<style>
	.video-js .vjs-big-play-button {
	display: none;
	}
	</style>


	<div class="col-md-8" id="flash" style="display:none;">
	<h3><b>En Vivo</b></h3>
	<video id="Video" class="video-js vjs-default-skin video-responsive" controls autoplay
	 width="auto" height="410px"
	data-setup='{"techOrder": ["flash"], "nativeControlsForTouch": false,
	"controlBar": { "muteToggle": false, "volumeControl": false, "timeDivider": false,
	"durationDisplay": false, "progressControl": false } }'>
	<source src="{{$stream}}" type='rtmp/mp4'/>
	</div>

	<div class="col-md-8" id="noflash">
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
	<div class="col-md-2">

		<iframe src="/chatTca/chat.php?id={{Auth::user()->id}}&name={{Auth::user()->name}}&room={{$id}}" width="350" height="500"></iframe>
	</div>

</body>



@endsection
