

    <div class="bg-image" style="background-image: url('assets3/img/photos/photo16@2x.jpg');">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center">
                <div class="py-30 invisible" data-toggle="appear">
                    <!-- Testimonials Slider (.js-slider class is initialized in Codebase() -> uiHelperSlick()) -->
                    <!-- For more info and examples you can check out http://kenwheeler.github.io/slick/ -->
                    <div class="js-slider slick-nav-black slick-dotted-white" data-arrows="true" data-dots="true">
  	@foreach($testimonials as $i => $testimonial)

                        <div>
                            <div class="py-10">
                                <img class="img-avatar img-avatar96 img-avatar-thumb" src="assets3/img/avatars/avatar10.jpg" alt="">
                            </div>
                            <div class="row justify-content-center py-10">
                                <div class="col-md-8">
                                    <div class="mb-10">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                    </div>
                                    <h3 class="font-w700 text-white mb-10">{{$testimonial->name}}</h3>
                                    <p class="font-size-lg text-body-bg-dark">{{$testimonial->testimonial}}</p>
                                </div>
                            </div>
                        </div>
                          	 @endforeach

                    </div>
                    <!-- END Testimonials Slider -->
                </div>
            </div>
        </div>
    </div>
