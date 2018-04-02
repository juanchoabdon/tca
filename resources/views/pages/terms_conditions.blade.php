@extends("app")

@section('head_title', getcong('terms_conditions_title').' | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
<!-- begin:header -->

    <div class="page-title-area feature-call-action-bg">
       <div class="container">
          <div class="row">
             <div class="col-sm-6 col-md-6">
                <div class="page-title-left">
                   <h2>{{getcong('terms_conditions_title')}}</h2>
                </div>
             </div>
             <div class="col-sm-6 col-md-6">
                <div class="page-bredcrumbs-area text-right">
                   <ul  class="page-bredcrumbs">
                      <li><a href="about-2.html#">Home</a></li>
                      <li><a href="about-2.html#">{{getcong('terms_conditions_title')}}</a></li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- end:header -->
<!-- begin:content -->
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

						{!!getcong('terms_conditions_description')!!}

          </div>
        </div>
      </div>
    </div>
    <!-- end:content -->

@endsection
