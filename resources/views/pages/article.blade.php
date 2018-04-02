@extends("app")

@section('head_title', 'Blog | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
<div class="page-title-area about-area-bg">
   <div class="container">
      <div class="row">
         <div class="col-sm-6 col-md-6">
            <div class="page-title-left">
               <h2>Blog</h2>
            </div>
         </div>
         <div class="col-sm-6 col-md-6">
            <div class="page-bredcrumbs-area text-right">
               <ul  class="page-bredcrumbs">
                  <li><a href="about-2.html#">Home</a></li>
                  <li><a href="about-2.html#">Blog</a></li>
                  <li><a href="about-2.html#">{{$articulo->titulo}} </a></li>
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
            <div class="single-blog-content-area">
                  <div class="blog-content-single blog-content-single-no-btm-padding">
                     <div style="top:20px;">
                       <p><h3><br>{{$articulo->titulo}}<br></h3></p>
                         @if($articulo->img != null)
                        <img src="{{ URL::asset('upload/blogs/'.$articulo->img.'-b.jpg') }}" alt="" class="img-responsive">
                        <i class="fa fa-image"></i>
                        @endif
                     </div>
                     <div class="blog-text">
                        <p> {!! ($articulo->contenido) !!}</p>
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
