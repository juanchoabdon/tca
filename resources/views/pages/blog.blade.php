@extends("app")

@section('head_title', 'Blog | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")

<div class="page-title-area blog-area-bg">
   <div class="container">
      <div class="row">
         <div class="col-sm-6 col-md-6">
            <div class="page-title-left">
               <h2>Blogs</h2>
            </div>
         </div>
         <div class="col-sm-6 col-md-6">
            <div class="page-bredcrumbs-area text-right">
               <ul  class="page-bredcrumbs">
                  <li><a href="{{ URL::to('/') }}">Home</a></li>
                  <li><a href="{{ URL::to('blogs/') }}">Blogs</a></li>
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
           @foreach($articulos as $articulo)
            <div class="col-sm-6 col-md-4">
               <div class="blog-content-single">
                  <div >
                      @if($articulo->img != null)
                     <img src="{{ URL::asset('upload/blogs/'.$articulo->img.'-b.jpg') }}" alt="" class="img-responsive">
                     <i class="fa fa-image"></i>
                      @endif
                  </div>
                  <div class="blog-text">

                     <h2><a href="blog/{{$articulo->id}}">{{$articulo->titulo}}</a></h2>
                     <p style="text-align:justify;">{{ substr(strip_tags($articulo->contenido),0,260)}} [...]</p>
                     <a href="blog/{{$articulo->id}}"><i class="fa fa-long-arrow-right"></i>Leer Más</a>
                  </div>
               </div>
            </div>
              @endforeach
         </div>
      </div>
   </div>
</section>

    @include('_particles.pagination', ['paginator' => $articulos])
    <!-- end:content -->

@endsection
