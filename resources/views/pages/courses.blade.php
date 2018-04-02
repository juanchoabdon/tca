
@extends("app")

@section('head_title', 'Entrenamientos | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")


<div class="page-title-area about-area-bg">
   <div class="container">
      <div class="row">
         <div class="col-sm-6 col-md-6">
            <div class="page-title-left">
               <h2>Entenamientos</h2>
            </div>
         </div>
         <div class="col-sm-6 col-md-6">
            <div class="page-bredcrumbs-area text-right">
               <ul  class="page-bredcrumbs">
                  <li><a href="about-2.html#">Home</a></li>
                  <li><a href="about-2.html#">Entrenamientos</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>


<section class="team-area team-page-area">
         <div class="team-area-details">
            <div class="container">
               <div class="row">

                    @foreach($trainings as $training)
                  <div class="col-sm-6 col-md-3">
                     <div class="team-single">
                        <div class="team-image">
                           <img src="/upload/training/{{$training->img}}-s.jpg"  class="img-responsive" alt="">
                           <div class="team-hover-text">
                              <h2>{{$training->title}}</h2>
                              <p>{{$training->description}}</p>
                           </div>
                        </div>
                        <div class="team-text text-center">
                           <h3>{{$training->title}}</h3>
                           <p>${{$training->price}} - {{$training->tipos->descripcion}}</p>
                           <div class="team-social">
                             <form action="/buy" method="post">
                               <input type="hidden" name="type" value="2">
                               <input type="hidden" name="product_id" value="{{$training->id}}">
                              {{ csrf_field() }}
                                 <input type="submit" class="btn btn-sucess" value="Comprar">
                             </form>

                        @if($training->tipos->descripcion != 'Presencial')  <a href="course/{{$training->id}}">Ver Modulos</a> @endif
                           </div>
                        </div>
                     </div>
                  </div>
                    @endforeach

               </div>
            </div>
         </div>
      </section>
