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

</style>

<div class="content">
			<h2 class="content-heading">{{$softskill->title}} - {{$content->title}}</h2>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif
  <div class="panel text-center ">
    <div class="col-md-12 col-md-offset-1">
			<iframe src="{{$content->ruta}}" width="800" height="500" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        <!-- <video class="video embed-responsive-item">
          <source src="{{$content->ruta}}" type="video/mp4">
        </video> -->
    <br>
    </div>
  </div>
	@if($content->description)
	<div class="well">
		<b>Descripciõn</b><br><br>
		{!! $content->description !!}<br><br>
	</div>
	@endif
	<b>Videos siguientes</b>
<br>
<br>
	<div class="row">
   @foreach($contents as $video)
    		@if($content->id != $video->id)
 	 				<div class="col-md-6 col-xl-3">
 						<a class="block block-rounded block-link-pop text-center" href="/app/softskills/ver/{{$video->id}}">
 								<div class="block-content block-content-full bg-image" style="background-image: url('https://s3.amazonaws.com/tjn-blog-images/wp-content/uploads/2015/12/19235447/what-does-your-handshake-say-about-you-810x540.jpg');">
 										<img class="img-avatar img-avatar-thumb" src="http://tradingclubacademy.com/assets/images/play.png" alt="">
 								</div>
 								<div class="block-content block-content-full">
 										<div class="font-w600 mb-5">{{$video->title}}</div>
 										<div class="font-size-sm text-muted">  {!! $video->description !!}</div>
 								</div>
 						</a>
 		      </div>
			@endif

   @endforeach
 	 </div>

</div>

<script src="https://cdn.plyr.io/2.0.13/plyr.js"></script>
<script type="text/javascript">
	plyr.setup({
    debug: true,
		autoplay: true
  });
</script>






@endsection
