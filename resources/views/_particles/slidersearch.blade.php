
<!-- <div class="container-fluid" style="padding-right: 0px;padding-left: 0px;">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>


    <div class="carousel-inner">
      <?php $i=0; ?>
      @foreach($sliders as $slider)

      <div class="item @if($i==0){{' active'}}@endif">
        <?php $i++; ?>
        <img src="{{ URL::asset('upload/slides/'.$slider->image_name.'.jpg') }}" alt="Los Angeles" style="width:100%;">
        <div class="header-text hidden-xs">
          <div class="col-md-12 text-center">
            {!! $slider->text !!}
          </div>
      </div>
      </div>
      @endforeach


    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div> -->



            <main id="main-container">
                <!-- Hero -->
                <div class="bg-gd-primary overflow-hidden">
                    <div class="hero bg-pattern bg-black-op-25" style="background-image: url('assets3/img/various/bg-fe-pattern.png');">
                        <div class="hero-inner">
                            <div class="content content-full text-center">
                                <h1 class="display-3 font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInDown">Aprende de expertos en trading profesional</h1>
                                <h2 class="font-w400 text-white-op mb-50 invisible" data-toggle="appear" data-class="animated fadeInDown">a invertir en mercados financieros</h2>

                                <a class="btn btn-hero btn-rounded  btn-alt-warning mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp" href="/contact-us">
                                    <i class="fa fa-rocket mr-10"></i> Quiero Empezar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->



                <!-- Image Promo Slider -->

                <!-- END Image Promo Slider -->

                <!-- Quick Features -->


            </main>
            <!-- END Main Container -->
