
@extends("app")

@section('head_title', 'Entrenamientos | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")



<div class="page-title-area about-area-bg">
   <div class="container">
      <div class="row">
         <div class="col-sm-6 col-md-6">
            <div class="page-title-left">
               <h2>Entrenamiento</h2>
            </div>
         </div>
         <div class="col-sm-6 col-md-6">
            <div class="page-bredcrumbs-area text-right">
               <ul  class="page-bredcrumbs">
                  <li><a href="about-2.html#">Home</a></li>
                  <li><a href="about-2.html#">Entrenamientos</a></li>
                  <li><a href="about-2.html#">{{$course->title}}</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>


<section class="service-area service-page-section">
       <div class="service-content-area">
         <div class="container">
            <h2>{{$course->title}}</h2>
            <div class="row">
              <div class="col-md-4">
                          <img src="/upload/training/{{$course->img}}-s.jpg"  class="img-responsive" alt="">
                          <p>{{$course->description}}</p>
                          <div class="service-left-sidebar">
               <ul>
                  <li class="active"><a href="#">Comprar</a></li>
               </ul>
            </div>
              </div>

                <div class="col-md-8">
                   <div class="accordion-content-inner faq-accordion-content-inner">
                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                           <h4 class="panel-title">
                             <a role="button" data-toggle="collapse" data-parent="#accordion"  aria-expanded="true" aria-controls="collapseOne">
                              Presentación
                             </a>
                           </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                           <div class="panel-body">
                            <center><div id="video"></div> </center>
                           </div>
                        </div>
                     </div>
                          @foreach($contents as $content)
                            <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="{{$content->id}}">
                               <h4 class="panel-title">
                                 <a role="button" data-toggle="collapse" data-parent="#accordion"  aria-expanded="true" aria-controls="{{$content->id}}1">
                                  {{$content->titulo}}
                                 </a>
                               </h4>
                            </div>
                            <div id="{{$content->id}}1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="{{$content->id}}">
                               <div class="panel-body">
                                <p>{!! $content->descripcion !!}</p>
                               </div>
                            </div>

                         </div>   @endforeach

                      </div>
                   </div>
                </div>
            </div>
         </div>
       </div>
    </section>
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

    var videoId = getId('{{$course->video_url}}');

    var iframeMarkup = '<iframe width="560" height="315" src="//www.youtube.com/embed/' + videoId + '?autoplay=1' + '" frameborder="0" allowfullscreen></iframe>';

      var video = document.getElementById('video');
      video.innerHTML = iframeMarkup
    </script>
