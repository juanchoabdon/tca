
@extends("app")

@section('head_title', 'Membresias | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")


<div class="page-title-area about-area-bg">
   <div class="container">
      <div class="row">
         <div class="col-sm-6 col-md-6">
            <div class="page-title-left">
               <h2>Membresias</h2>
            </div>
         </div>
         <div class="col-sm-6 col-md-6">
            <div class="page-bredcrumbs-area text-right">
               <ul  class="page-bredcrumbs">
                  <li><a href="about-2.html#">Home</a></li>
                  <li><a href="about-2.html#">Membresias</a></li>
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
                  <h3>Escoge tu plan</h3>
                  <h2>Haz parte de TCA</h2>
               </div>
            </div>
         </div>
      </div>
   </div> <!-- END MAIN TITLE -->
   <div class="container">
      <div class="row">
        @foreach($memberships as $membership)
         <div class="col-md-4">
            <div class="pricing-table-inner">
               <div class="pricing-table-header pricing-table-header-1">
                  <div class="pricing-table-header-inner clearfix">
                     <div class="pricing-header-icon">
                        <span class="icon icon-Chart"></span>
                     </div>
                     <div class="pricing-header-content">
                        <div class="pricing-header-content-left">
                           <span class="unit">$</span>
                           <span class="price">{{number_format($membership->cost, 0, '', '.')}}</span>
                           <span class="time">/ Mensual</span>
                        </div>
                        <div class="pricing-header-content-right">
                           <h3>{{$membership->name}}</h3>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="pricing-table-content">
                  <div class="pricing-table-content-inner">
                  {!! $membership->description !!}
                  </div>
                  <form action="/buy" method="post">
                    <input type="hidden" name="type" value="1">
                    <input type="hidden" name="product_id" value="{{$membership->id}}">
                   {{ csrf_field() }}

                      <input type="submit" class="btn btn-sucess" value="Comprar plan">


                  </form>

               </div>
            </div>
         </div>
          @endforeach


      </div>
   </div>
</section>
