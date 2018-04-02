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
			<h2 class="content-heading">{{ $room->name }}</h2>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif
  <div class="panel ">
      <div class="row">
          <div class="col-md-7 col-md-offset-1">

                  {!! $room->video !!}

				  <br>
				  <br>

				  @if($room->description)
			  	<div class="well">
			  		<b>Descripción</b><br><br>
			  		{!! $room->description !!}<br><br>
			  	</div>
			  	@endif
          </div>
          <div class="col-md-5">
              <iframe src="/chatTca/chat.php?id={{Auth::user()->id}}&name={{Auth::user()->name}}&room={{$room->id}}" width="500" frameborder="0" height="500"></iframe>
          </div>

      </div>
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
