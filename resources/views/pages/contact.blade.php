@extends("app")

@section('head_title', 'Contact Us | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")

<script type="text/javascript">
        $('#logo').css({'width' : '200px', 'margin-top': '15px'});
  $(window).scroll(function() {
      if ($(this).scrollTop() > 60) {
          $('#logo').fadeIn();
          $('#logo').css({'width' : '100px', 'margin-top': '-10px' });
      } else {
          $('#logo').fadeIn();
          $('#logo').css({'width' : '200px','margin-top': '15px' });
      }
  });
</script>

<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="content-header content-header-fullrow bg-black-op-10">
                <div class="content-header-section text-center align-parent">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <!-- END Close Sidebar -->

                    <!-- Logo -->
                    <div class="content-header-item">
                        <a class="link-effect font-w700" href="index.html">
                              Trading Club Academy
                        </a>
                    </div>
                    <!-- END Logo -->
                </div>
            </div>
            <!-- END Side Header -->

            <!-- Side Main Navigation -->
            <div class="content-side content-side-full">
                <!--
                Mobile navigation, desktop navigation can be found in #page-header

                If you would like to use the same navigation in both mobiles and desktops, you can use exactly the same markup inside sidebar and header navigation ul lists
                -->
                <ul class="nav-main">
                    <li>
                        <a href="fe_home.html"><i class="si si-home"></i>Home</a>
                    </li>
                    <li class="nav-main-heading">Various</li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-puzzle"></i>Pages</a>
                        <ul>
                            <li>
                                <a href="fe_blog.html">Blog</a>
                            </li>
                            <li>
                                <a href="fe_story.html">Story</a>
                            </li>
                            <li>
                                <a href="fe_team.html">Team</a>
                            </li>
                            <li>
                                <a href="fe_search.html">Search</a>
                            </li>
                            <li>
                                <a href="fe_helpdesk.html">Helpdesk</a>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">Portfolio</a>
                                <ul>
                                    <li>
                                        <a href="fe_portfolio_single.html">Single</a>
                                    </li>
                                    <li>
                                        <a href="fe_portfolio_2cols.html">2 Columns</a>
                                    </li>
                                    <li>
                                        <a href="fe_portfolio_3cols.html">3 Columns</a>
                                    </li>
                                    <li>
                                        <a href="fe_portfolio_4cols.html">4 Columns</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-heading">Vital</li>
                    <li>
                        <a class="active" href="fe_features.html"><i class="si si-wrench"></i>Features</a>
                    </li>
                    <li>
                        <a href="fe_pricing.html"><i class="si si-wallet"></i>Pricing</a>
                    </li>
                    <li>
                        <a href="fe_contact.html"><i class="si si-envelope-open"></i>Contact</a>
                    </li>
                    <li>
                        <a href="fe_about.html"><i class="si si-eye"></i>About</a>
                    </li>
                </ul>
            </div>
            <!-- END Side Main Navigation -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>
<!-- END Sidebar -->

<!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="content-header-section">
            <!-- Logo -->
            <div class="content-header-item">
                <a style="cursor: pointer" class="font-w700 mr-5">
                   <span class="font-size-xl text-dual-primary-dark white" style="color: white !important">Trading Club Academy</span>   
                </a>
            </div>
            <!-- END Logo -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="content-header-section">
            <!-- Header Navigation -->
            <!--
            Desktop Navigation, mobile navigation can be found in #sidebar

            If you would like to use the same navigation in both mobiles and desktops, you can use exactly the same markup inside sidebar and header navigation ul lists
            If your sidebar menu includes headings, they won't be visible in your header navigation by default
            If your sidebar menu includes icons and you would like to hide them, you can add the class 'nav-main-header-no-icons'
            -->
            <ul class="nav-main-header">
              <li>
                  <a class="{{classActivePath('/')}}" href="/">Inicio</a>
              </li>
              <li>
                  <a class="{{classActivePath('/contact-us')}}" href="/contact-us">Contacto</a>
              </li>


                @if(!empty(Auth::user()))
        @if(Auth::user()->usertype=='Estudiante')
              <li>
                  <a href="/app/dashboard">Mi Cuenta</a>
              </li>
        @endif

            @if(Auth::user()->usertype=='Admin')

            <li>
                <a href="/admin/dashboard">Administrador</a>
            </li>

             @endif

             @if(Auth::user()->usertype=='Profesor')

             <li>
                 <a href="/admin/dashboard">Plataforma</a>
             </li>

              @endif


           @endif



            @if(empty(Auth::user()))

                <li>
                    <a href="/login">Ingresar</a>
                </li>
                 @endif


          </ul>

            <!-- END Toggle Sidebar -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header">
        <div class="content-header content-header-fullrow">
            <form action="fe_search.html" method="post">
                <div class="input-group">
                    <span class="input-group-btn">
                        <!-- Close Search Section -->
                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <button type="button" class="btn btn-secondary px-15" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-times"></i>
                        </button>
                        <!-- END Close Search Section -->
                    </span>
                    <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-secondary px-15">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    <!-- Header Loader -->
    <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header content-header-fullrow text-center">
            <div class="content-header-item">
                <i class="fa fa-sun-o fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
<main id="main-container">
    <!-- Hero -->
    <div class="bg-gd-primary" style="background: #0c2136!important;">
        <div class="bg-pattern bg-gd-primary  bg-black-op-25" style="background-image: url('assets/img/various/bg-fe-pattern.png');">
            <div class="content content-top text-center">
                <div class="py-50">
                    <h1 class="font-w700 text-white mb-10">Contáctanos</h1>
                    <h2 class="h4 font-w400 text-white-op">Si quieres hacer parte de esta comunidad.</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Section -->
    <div class="bg-white">
        <div class="content content-full">
            <div class="row justify-content-center py-50">
                <div class="col-lg-6">

                                   	@if(Session::has('flash_message'))
                 				    <div class="alert alert-success">
                 				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span></button>
                 				        {{ Session::get('flash_message') }}
                 				    </div>
                 				@endif
                      {!! Form::open(array('url' => 'contact-us','class'=>'','id'=>'contactform','role'=>'form')) !!}
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="fe-contact-name">Nombre</label>
                              <input type="text" name="name" id="Name" class="form-control" placeholder="Ingresa tu nombre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="fe-contact-email">Email</label>
                            <div class="col-12">
                                 <input type="email" name="email" id="Email" class="form-control" placeholder="Ingresa tu email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="fe-contact-email">Sujeto</label>
                            <div class="col-12">
                              <input type="text" name="subject" class="form-control" id="Subject" placeholder="Ingresa un Sujeto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="fe-contact-message">Mensaje</label>
                            <div class="col-12">
                                <textarea class="form-control form-control-lg" name="user_message"  id="fe-contact-message" rows="10" placeholder="Ingresa tu mensaje..."></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-hero btn-rounded btn-alt-warning min-width-175">
                                    <i class="fa fa-send mr-5"></i>Enviar
                                </button>
                            </div>
                        </div>
                          {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- END Section -->

    <!-- Google Maps, functionality is initialized in js/pages/fe_contact.js, for more examples you can check out https://hpneo.github.io/gmaps/ -->

</main>


@endsection
