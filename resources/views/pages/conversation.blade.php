@extends("app")

@section('head_title', 'Conversatorios | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")

<div class="page-title-area blog-area-bg">
   <div class="container">
      <div class="row">
         <div class="col-sm-6 col-md-6">
            <div class="page-title-left">
               <h2>Conversatorio</h2>
            </div>
         </div>
         <div class="col-sm-6 col-md-6">
            <div class="page-bredcrumbs-area text-right">
               <ul  class="page-bredcrumbs">
                  <li><a href="{{ URL::to('/') }}">Home</a></li>
                  <li><a href="{{ URL::to('conversatorios/') }}">Conversatorios</a></li>
                  <li><a href="{{ URL::to('conversatorios/') }}">{{$conversation->title}}</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>

  <section class="blog-area blog-page-area bg-type-2">
   <div class="container">
      <div class="row">
         <div class="col-md-offset-2 col-md-8">
           @if(Session::has('flash_message'))
                     <div class="alert alert-success">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span></button>
                         {{ Session::get('flash_message') }}
                     </div>
           @endif
            <div class="single-blog-content-area">

                  <div class="blog-content-single blog-content-single-no-btm-padding">
                    <br>
                    <div class="row">
                      <div class="col-md-6">
                          <h3>{{$conversation->title}}</h3>
                      </div>
                      <div class="col-md-6">
                        <div class="pull-right shop-price-slider">
                        @if(empty(Auth::user()->id))
                        <center style="font-size:15px;">¿Quieres asistir?</center><br> <a href="/login" class="btn"> Ingresa</a>
                        <a href="/login" class="btn">Registrate</a>
                        @else
                        @if(!empty($suscribe))
                        <a href="#" class="btn btn-primary" style="margin-top: 20px;"><i class="fa fa-check"></i> INSCRITO</a>
                        <a href="/conversation-cancel/{{$suscribe['id']}}" class="btn btn-danger" style="margin-top: 20px;"> CANCELAR</a>
                        @else
                        <a href="/conversation-suscribe/{{$conversation->id}}" class="btn btn-success" style="margin-top: 20px;">INSCRIBIRSE</a>
                        @endif
                        @endif
                      </div>
                      </div>
                    </div>
                    <br>
                         @if($conversation->img != null)
                        <img src="{{ URL::asset('upload/conversations/'.$conversation->img.'-b.png') }}" alt="" class="img-responsive">
                        <i class="fa fa-image"></i>
                        @endif

                     <div class="blog-text">
                       <div class="row">
                           <p> {!! ($conversation->text) !!}</p>
                       </div>

                        <div class="blog-social text-left">
                           <p><span>Compartelo! : </span>
                               <a href="#"><i class="fa fa-facebook"></i></a>
                               <a href="#"><i class="fa fa-twitter"></i></a>
                               <a href="#"><i class="fa fa-google-plus"></i></a>
                               <a href="#"><i class="fa fa-pinterest"></i></a>
                           </p>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
   </div>
</section>
    <!-- end:content -->

@endsection
