
@extends("app")

@section('head_title', 'Entrenamientos | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")



<div class="page-title-area about-area-bg">
   <div class="container">
      <div class="row">
         <div class="col-sm-6 col-md-6">
            <div class="page-title-left">
               <h2>Estrategia</h2>
            </div>
         </div>
         <div class="col-sm-6 col-md-6">
            <div class="page-bredcrumbs-area text-right">
               <ul  class="page-bredcrumbs">
                  <li><a>Home</a></li>
                  <li><a>Estrategia</a></li>
                  <li><a >{{$strategie->titulo}}</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>


<section class="service-area service-page-section">
       <div class="service-content-area">
         <div class="container">
            <h2>{{$strategie->titulo}}</h2>
            <div class="row">
              <div class="col-md-4">
                          <img src="/upload/training/{{$strategie->img}}-s.jpg"  class="img-responsive" alt="">
                          <div class="service-left-sidebar">
                            <br>
               <ul>
                 <form action="/buy" method="post">
                   <input type="hidden" name="type" value="1">
                   <input type="hidden" name="product_id" value="{{$strategie->id}}">
                  {{ csrf_field() }}

                     <input type="submit" class="btn btn-sucess" value="Comprar plan">


                 </form>

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
                            <p>{{$strategie->descripcion}}</p>
                            <center><div id="video"></div> </center>
                           </div>
                        </div>
                     </div>
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

    var videoId = getId('{{$strategie->video_url}}');

    var iframeMarkup = '<iframe width="560" height="315" src="//www.youtube.com/embed/' + videoId + '?autoplay=1' + '" frameborder="0" allowfullscreen></iframe>';

      var video = document.getElementById('video');
      video.innerHTML = iframeMarkup
    </script>
