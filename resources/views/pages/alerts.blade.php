
@extends("app")

@section('head_title', 'Señales | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")


<div class="page-title-area about-area-bg">
   <div class="container">
      <div class="row">
         <div class="col-sm-6 col-md-6">
            <div class="page-title-left">
               <h2>Señales</h2>
            </div>
         </div>
         <div class="col-sm-6 col-md-6">
            <div class="page-bredcrumbs-area text-right">
               <ul  class="page-bredcrumbs">
                  <li><a href="about-2.html#">Home</a></li>
                  <li><a href="about-2.html#">Señales</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>

  <section class="pricing-table-area bg-type-2">
     <!-- MAIN TITLE -->
     <div class="main-title">
        <div class="container">
           <div class="row">
              <div class="col-sm-12">
                 <div class="main-title-content text-center">
                    <h3>Escoge un paquete de señales</h3>
                    <h2>Invierte con sentido</h2>
                 </div>
              </div>
           </div>
        </div>
     </div> <!-- END MAIN TITLE -->
     <div class="container">
        <div class="row">
        @foreach($alerts as $alert)
           <div class="col-md-4">
              <div class="pricing-table-inner pricing-table-inner-4">
                 <div class="pricing-table-header pricing-table-header-4">
                    <div class="pricing-table-header-inner clearfix">
                       <div class="pricing-header-content">
                          <div class="pricing-header-content-left">
                             <h3>{{$alert->titulo}}</h3>
                             <span>$</span>
                             <span class="price">{{$alert->precio}}</span>
                             <span class="time">/ Un pago</span>
                             <br>
                             <span class="cms-pricing-subtitle">{{$alert->meses}} - Meses </span>
                          </div>
                       </div>
                    </div>
                 </div>

                 <div class="pricing-table-content">

                    <div class="pricing-bottom-content">
                      <form action="/buy" method="post">
                        <input type="hidden" name="type" value="4">
                        <input type="hidden" name="product_id" value="{{$alert->id}}">
                       {{ csrf_field() }}

                          <input type="submit" class="btn btn-danger" value="Comprar">
                        

                      </form>
                    </div>
                 </div>

              </div>
           </div>
                   @endforeach


        </div>
     </div>
  </section>
