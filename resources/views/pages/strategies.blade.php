
@extends("app")

@section('head_title', 'Estrategias | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")


<div class="page-title-area about-area-bg">
   <div class="container">
      <div class="row">
         <div class="col-sm-6 col-md-6">
            <div class="page-title-left">
               <h2>Estrategias</h2>
            </div>
         </div>
         <div class="col-sm-6 col-md-6">
            <div class="page-bredcrumbs-area text-right">
               <ul  class="page-bredcrumbs">
                  <li><a href="about-2.html#">Home</a></li>
                  <li><a href="about-2.html#">Estrategias</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>

<section class="service-area service-page-section">
         <div class="service-content-area">
	         <div class="container">
	        		<div class="row">
                  @foreach($strategies as $strategie)
                  <div class="col-sm-6 col-md-4">
                     <div class="service-content-single service-page-single">
                        <div class="service-content-img">
                           <img src="/upload/training/{{$strategie->img}}-s.jpg" alt="">
                           <div class="service-content-img-layer"></div>
                           <div class="service-content-icon">
                              <div class="service-content-icon-details">
                                 <span class="icon icon-Calculator"></span>
                                 <h2>{{$strategie->titulo}}</h2>
                                 <p>${{$strategie->precio}}</p>
                              </div>
                           </div>
                        </div>
                        <div class="service-content-text read-more-btn">
                          <br>

                           <form action="/buy" method="post">
                             <input type="hidden" name="type" value="3">
                             <input type="hidden" name="product_id" value="{{$strategie->id}}">
                            {{ csrf_field() }}

                               <input type="submit" class="btn btn-danger" value="Comprar">
                               <a href="strategie/{{$strategie->id}}"><i class="fa fa-long-arrow-right"></i> <span>Ver Más</span></a>

                           </form>

                        </div>
                     </div>
                  </div>
                  @endforeach

   	        	</div>
	         </div>
         </div>
      </section>
