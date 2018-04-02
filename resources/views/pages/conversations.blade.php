@extends("app")

@section('head_title', 'Conversatiorios | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")

<div class="page-title-area blog-area-bg">
   <div class="container">
      <div class="row">
         <div class="col-sm-6 col-md-6">
            <div class="page-title-left">
               <h2>Conversatorios</h2>
            </div>
         </div>
         <div class="col-sm-6 col-md-6">
            <div class="page-bredcrumbs-area text-right">
               <ul  class="page-bredcrumbs">
                  <li><a href="{{ URL::to('/') }}">Home</a></li>
                  <li><a href="{{ URL::to('conversatorios/') }}">Conversatorios</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>

<section class="blog-area blog-page-area bg-type-2">
   <div class="blog-content-area">
      <div class="container">
         <div class="row">
           @foreach($conversations as $conversation)
            <div class="col-sm-6 col-md-4">
               <div class="blog-content-single">
                  <div class="blog-img">
                      @if($conversation->img != null)
                     <img src="{{ URL::asset('upload/conversations/'.$conversation->img.'-s.jpg') }}" alt="" class="img-responsive">
                     <i class="fa fa-image"></i>
                      @endif
                  </div>
                  <div class="blog-text">
                     <ul>
                        <li>{{$conversation->date}} </li>
                     </ul>
                     <h2><a href="conversation/{{$conversation->id}}">{{$conversation->title}}</a></h2>
                     <p></p>
                     <a href="conversation/{{$conversation->id}}"><i class="fa fa-long-arrow-right"></i>Ver Más</a>
                  </div>
               </div>
            </div>
              @endforeach
         </div>
      </div>
   </div>
</section>


    <!-- end:content -->

@endsection
