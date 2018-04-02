@extends("app.admin_app")

@section("content")

<div class="content">
			<h2 class="content-heading">{{$analisis->title}}</h2>

	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

	<div class="panel panel-default panel-shadow">
		  <div class="panel-body">
			    <div class="col-md-10 col-md-offset-1">
			      <div class="text-center">
			          <div id="video"> </div>
			      </div>
			    <br>
			    </div><br><br>
			</div>
	</div>



</div>

<script type="text/javascript">
function getId(url) {
  var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
  var match = url.match(regExp);

  if (match && match[2].length == 11) {
      return match[2];
  } else {
      return 'error';
  }
}

var videoId = getId('{{$analisis->video_url}}');

var iframeMarkup = '<iframe width="700" height="450" src="//www.youtube.com/embed/' + videoId + '?autoplay=1' + '" frameborder="0" allowfullscreen></iframe>';

  var video = document.getElementById('video');
  video.innerHTML = iframeMarkup
</script>

@endsection
