@extends("app")

@section('head_title', 'Artis Global Club' )

@section('head_url', Request::url())

@section('head_image', url('/upload/logoss.png'))

@section("content")

      <script src="{{ URL::asset('assets3/js/core/jquery.min.js')}}"></script>
<style media="screen">
  #page-container.page-header-glass.page-header-fixed.page-header-scroll.page-header-inverse #page-header {
    background-color: #0c2136;
    box-shadow: none;
  }

  .img-avatar.img-avatar96.dis {
    width: 200px;
    height: 200px;
}
</style>


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
                              <img  width="200" src="{{ URL::asset('assets3/img/logo-agc.png ')}}" alt="">
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
                    <img id="logo"  width="200"  style="margin-top: 15px"src="{{ URL::asset('assets3/img/logo-agc.png ')}}" alt="">
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
                  <a class="{{classActivePath('/artis')}}" href="/artis">Inicio</a>
              </li>
              <li>
                  <a class="{{classActivePath('/contact-artis')}}" href="/contact-artis">Contacto</a>
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
                    <a href="/login-artis">Ingresar</a>
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
    <!-- END Header Search -->

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
<!-- END Header -->
<!-- Main Container -->
<main id="main-container">
    <!-- Hero -->
    <!-- jQuery Vide for video backgrounds, for more examples you can check out https://github.com/VodkaBears/Vide -->
    <div class="bg-video" data-vide-bg="http://imarketslive.com/background_video/IMLMotionVideo.mp4" data-vide-options="posterType: jpg">
        <div class="hero bg-black-op">
            <div class="hero-inner">
                <div class="content content-full text-center">
                    <h1 class="display-3 font-w700 text-white mb-10">Aprende de expertos en trading profesional</h1>
                    <h2 class="font-w400 text-white-op">a invertir en mercados financieros</h2>
                    <a class="btn btn-hero btn-rounded  btn-alt-warning mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp" href="/contact-artis">
                        <i class="fa fa-rocket mr-10"></i> Saber Más
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Full Features -->
    <div class="bg-white">
                <div class="content content-full">
                    <div class="row nice-copy py-30">
                        <div class="col-md-4 py-30">
                            <h3 class="h4 font-w700 text-uppercase pb-10 border-b border-3x">Quienes <span class="text-primary">Somos</span>.</h3>
                            <p class="mb-0" style="text-align: justify">Somos una comunidad de traders apasionados por enseñar y difundir nuestros conocimientos, para así ofrecerle a todas las personas nuevas oportunidades de mejorar sus vidas y  cumplir sus sueños. Para esto contamos con múltiples expertos en diferentes mercados y todas las áreas del conocimiento necesarias para mantener un acompañamiento integral en el camino al éxito de nuestros clientes.</p>
                        </div>
                        <div class="col-md-4 py-30">
                            <h3 class="h4 font-w700 text-uppercase pb-10 border-b border-3x">Que <span class="text-primary">Hacemos</span>.</h3>
                            <p class="mb-0"  style="text-align: justify">Ofrecemos a nuestra comunidad la oportunidad de aprender acerca de análisis e inversión en mercados financieros para convertirse en traders exitosos, todo esto  mientras les ofrecemos herramientas para generar diferentes ingresos, mientras aprenden y forjan su propio camino.</p>
                        </div>
                        <div class="col-md-4 py-30">
                            <h3 class="h4 font-w700 text-uppercase pb-10 border-b border-3x">Porque  <span class="text-primary">Escogernos</span>.</h3>
                            <p class="mb-0"  style="text-align: justify">Estamos comprometidos con mantener los mejores resultados y los más altos estándares de calidad en nuestros productos, desde las academias, hasta nuestros algoritmos de trading, de la misma manera en que estamos comprometidos con acompañar a cada uno de los miembros de la comunidad A.G.C en su camino al éxito, paso  a paso.</p>
                        </div>
                        <!-- <div class="col-md-12 py-30">
                            <h3 class="h4 font-w700 text-uppercase text-center pb-10 border-b border-3x mb-0">Quick <span class="text-primary">Statistics</span>.</h3>

                        </div> -->
                    </div>
                </div>
            </div>


            <div class="">
                <div class="content content-full">
                    <div class="row text-center py-30">
                      <div class="content content-full text-center">
                          <div>
                              <h3 class="font-w700 text-muted mb-10">Todos los beneficios digitales en una sola membresia</h3>
                          </div>
                      </div>
                        <div class="col-sm-6 col-md-2 py-30">
                            <div class="mb-20 invisible" data-toggle="appear" data-class="animated zoomIn">
                                <i style="font-size: 60px" class="si si-graduation"></i>
                            </div>
                            <h4 class="font-w400 text-black text-uppercase mb-0 invisible" data-toggle="appear" data-class="animated fadeInUp" style="font-size: 18px">Academia de trading</h4>
                        </div>
                        <div class="col-sm-6 col-md-2 py-30">
                            <div class="mb-20 invisible" data-toggle="appear" data-class="animated zoomIn">
                                <i style="font-size: 60px" class="si si-screen-desktop"></i>
                            </div>
                            <h4 class="font-w400 text-black text-uppercase mb-0 invisible" data-toggle="appear" data-class="animated fadeInUp" style="font-size: 18px">Academia en vivo</h4>
                        </div>
                        <div class="col-sm-6 col-md-2 py-30">
                            <div class="mb-20 invisible" data-toggle="appear" data-class="animated zoomIn">
                                <i style="font-size: 60px" class="si si-bulb"></i>
                            </div>
                            <h4 class="font-w400 text-black text-uppercase mb-0 invisible" data-toggle="appear" data-class="animated fadeInUp" style="font-size: 18px">Academia de desarrollo personal</h4>
                        </div>
                        <div class="col-sm-6 col-md-2 py-30">
                            <div class="mb-20 invisible" data-toggle="appear" data-class="animated zoomIn">
                                <i style="font-size: 60px" class="si si-shuffle"></i>
                            </div>
                            <h4 class="font-w400 text-black text-uppercase mb-0 invisible" data-toggle="appear" data-class="animated fadeInUp" style="font-size: 18px">Trading Automático</h4>
                        </div>
                        <div class="col-sm-6 col-md-2 py-30">
                            <div class="mb-20 invisible" data-toggle="appear" data-class="animated zoomIn">
                                <i style="font-size: 60px" class="si si-feed"></i>
                            </div>
                            <h4 class="font-w400 text-black text-uppercase mb-0 invisible" data-toggle="appear" data-class="animated fadeInUp" style="font-size: 18px">Señales de trading</h4>
                        </div>
                        <div class="col-sm-6 col-md-2 py-30">
                            <div class="mb-20 invisible" data-toggle="appear" data-class="animated zoomIn">
                                <i style="font-size: 60px" class="si si-users"></i>
                            </div>
                            <h4 class="font-w400 text-black text-uppercase mb-0 invisible" data-toggle="appear" data-class="animated fadeInUp" style="font-size: 18px">Comunidad</h4>
                        </div>
                    </div>
                </div>
          </div>



    <div class="bg-image" style="background-image: url('assets3/img/photos/photo16@2x.jpg');">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center">
                <div class="py-30 invisible" data-toggle="appear">
                    <!-- Testimonials Slider (.js-slider class is initialized in Codebase() -> uiHelperSlick()) -->
                    <!-- For more info and examples you can check out http://kenwheeler.github.io/slick/ -->
                    <div class="js-slider slick-nav-black slick-dotted-white" data-arrows="true" data-dots="true">
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
                                    <h3 class="font-w700 text-white mb-10">Professional work!</h3>
                                    <p class="font-size-lg text-body-bg-dark">Highly talended people who will help you bring your ideas to life.</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="py-10">
                                <img class="img-avatar img-avatar96 img-avatar-thumb" src="assets3/img/avatars/avatar3.jpg" alt="">
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
                                    <h3 class="font-w700 text-white mb-10">Our ideas came to life!</h3>
                                    <p class="font-size-lg text-body-bg-dark">The final project exceeded our expectations! Thank you so much!</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="py-10">
                                <img class="img-avatar img-avatar96 img-avatar-thumb" src="assets3/img/avatars/avatar14.jpg" alt="">
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
                                    <h3 class="font-w700 text-white mb-10">Don’t hesitate, this is the team!</h3>
                                    <p class="font-size-lg text-body-bg-dark">Stop looking, this is the team that will help you succeed.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Testimonials Slider -->
                </div>
            </div>
        </div>
    </div>



        <div class="bg-white">
                <div class="content content-full" data-toggle="appear" data-class="animated zoomIn">
                    <div class="row nice-copy py-30">
                        <div class="col-md-6 py-30">
                            <h3 class="h4 font-w700 text-uppercase pb-10 border-b border-3x">ACADEMIA DE  <span class="text-primary">TRADING.</span></h3>
                            <p class="mb-0">Cursos completos de trading con disponibilidad ilimitada on-demand, en donde se cubre desde lo más básico  hasta lo más avanzado de la mano de nuestros mejores traders, todo completamente en español y disponible desde el día 1.</p>
                        </div>
                        <div class="col-md-6 py-30 text-center">
                            <img class="img-avatar img-avatar96 img-avatar-thumb dis" src="/assets3/img/enter.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div>
                    <div class="content content-full" data-toggle="appear" data-class="animated zoomIn">
                        <div class="row nice-copy py-30">
                            <div class="col-md-6 py-30 text-center">
                                <img class="img-avatar img-avatar96 img-avatar-thumb dis" src="/assets3/img/blur.jpg" alt="">
                            </div>
                            <div class="col-md-6 py-30 ">
                                <h3 class="h4 font-w700 text-uppercase pb-10 border-b border-3x"><span class="text-primary">ACADEMIA EN</span> VIVO</h3>
                                <p class="mb-0">

                                      Todas las semanas y en diferentes horarios, nuestros expertos abren sus puertas para aclarar temáticas de inversión, responder preguntas y buscar oportunidades en vivo junto  a los estudiantes, de manera que todos puedan aprovechar los años de experiencia que tienen para ofrecer.

                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white">
                        <div class="content content-full" data-toggle="appear" data-class="animated zoomIn">
                            <div class="row nice-copy py-30">
                                <div class="col-md-6 py-30">
                                      <h3 class="h4 font-w700 text-uppercase pb-10 border-b border-3x"><span class="text-primary">ACADEMIA DE </span> DESAROLLO PERSONAL</h3>
                                        <p class="mb-0">En A.G.C sabemos que para convertirse en un trader exitoso, necesitamos trabajar en nosotros como personas, desde encontrar nuestras motivaciones y mejorar nuestra oratoria, hasta la imagen que deseamos proyectar, todo hace parte de construir al protagonista de nuestras vidas y es aquí en donde vamos a aprender a hacerlo.</p>                                </div>
                                <div class="col-md-6 py-30 text-center">
                                    <img class="img-avatar img-avatar96 img-avatar-thumb dis" src="/assets3/img/chart.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div >
                            <div class="content content-full" data-toggle="appear" data-class="animated zoomIn">
                                <div class="row nice-copy py-30">
                                    <div class="col-md-6 text-center">
                                          <img class="img-avatar img-avatar96 img-avatar-thumb dis" src="/assets3/img/copy.jpg" alt="">
                                    </div>
                                    <div class="col-md-6 py-30">
                                        <h3 class="h4 font-w700 text-uppercase pb-10 border-b border-3x"><span class="text-primary">TRADING</span> AUTOMÁTICO</h3>
                                        <p class="mb-0">
                                        Nuestros traders e ingenieros se unen para desarrollar sistemas de trading automático que operan el mercado en tu lugar. Con esta herramienta, los miembros de la comunidad A.G.C pueden generar utilidades de operación mientras aprenden.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="bg-white">
                            <div class="content content-full" data-toggle="appear" data-class="animated zoomIn">
                                <div class="row nice-copy py-30">
                                    <div class="col-md-6 py-30">
                                          <h3 class="h4 font-w700 text-uppercase pb-10 border-b border-3x"><span class="text-primary">SEÑALES DE </span> TRADING</h3>
                                            <p class="mb-0">Aprovecha la experiencia y los resultados de nuestros traders para invertir  como ellos lo hacen, las señales de inversión tienen toda la información necesaria para lograrlo.</p>                                </div>
                                    <div class="col-md-6 py-30 text-center">
                                        <img class="img-avatar img-avatar96 img-avatar-thumb dis" src="/assets3/img/chart.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                      </div>

                      <div>
                          <div class="content content-full" data-toggle="appear" data-class="animated zoomIn">
                              <div class="row nice-copy py-30">
                                  <div class="col-md-6 text-center">
                                        <img class="img-avatar img-avatar96 img-avatar-thumb dis" src="/assets3/img/copy.jpg" alt="">
                                  </div>
                                  <div class="col-md-6 py-30">
                                      <h3 class="h4 font-w700 text-uppercase pb-10 border-b border-3x"><span class="text-primary">COMUNIDAD</span></h3>
                                      <p class="mb-0">
                                    Comparte A.G.C con otros y construye tu equipo de traders, otra herramienta para generar más ingresos y compartir la abundancia con los que te rodean. Porque trabajar en equipo siempre nos llevará más lejos</p>
                                  </div>
                              </div>
                          </div>
                      </div>




    <div class="bg-primary-dark bg-pattern" >
        <div class="content content-full">
            <!-- CountTo ([data-toggle="countTo"] is initialized in Codebase() -> uiHelperCoreAppearCountTo()) -->
            <!-- For more info and examples you can check out https://github.com/mhuggins/jquery-countTo -->
            <div class="row text-center py-30">
                <div class="col-sm-6 col-md-3 py-30">
                    <div class="mb-20">
                      <i style="color: #E3CE11 !important" class="si si-users fa-3x text-primary-lighter"></i>
                    </div>
                    <div class="font-size-h1 font-w700 text-white mb-5" data-toggle="countTo" data-to="10000" data-after="+">0</div>
                    <div class="font-w600 text-white-op text-uppercase">Miembros</div>
                </div>
                <div class="col-sm-6 col-md-3 py-30">
                    <div class="mb-20">
                        <i style="color: #E3CE11 !important" class="si si-briefcase fa-3x text-primary-lighter"></i>
                    </div>
                    <div class="font-size-h1 font-w700 text-white mb-5" data-toggle="countTo" data-to="10" data-after="+">0</div>
                    <div class="font-w600 text-white-op text-uppercase">Traders Profesionales</div>
                </div>
                <div class="col-sm-6 col-md-3 py-30">
                    <div class="mb-20">
                        <i style="color: #E3CE11 !important" class="si si-clock fa-3x text-primary-lighter"></i>
                    </div>
                    <div class="font-size-h1 font-w700 text-white mb-5" data-toggle="countTo" data-to="17600" data-after="+">0</div>
                    <div class="font-w600 text-white-op text-uppercase">Horas de contenido</div>
                </div>
                <div class="col-sm-6 col-md-3 py-30">
                    <div class="mb-20">
                        <i style="color: #E3CE11 !important" class="si si-star fa-3x text-primary-lighter"></i>
                    </div>
                    <div class="font-size-h1 font-w700 text-white mb-5" data-toggle="countTo" data-to="850" data-after="+">0</div>
                    <div class="font-w600 text-white-op text-uppercase">Calificaciones</div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Quick Stats -->

    <!-- Call to Action -->
    <div class="bg-body-light">
        <div class="content content-full text-center">
            <div class="py-30">
                <h3 class="font-w700 mb-10">¿Quieres hacer parte?</h3>
                <h4 class="font-w400 text-muted mb-30">Cambia tu vida con artis</h4>
                <a class="btn btn-hero btn-rounded btn-alt-warning" href="fe_pricing.html">Contáctanos</a>
            </div>
        </div>
    </div>
    <!-- END Call to Action -->
</main>
<!-- END Main Container -->

<!-- Footer -->
<footer id="page-footer" class="bg-white opacity-0">
    <div class="content content-full">

        <div class="font-size-xs clearfix border-t pt-20 pb-10">
            <div class="float-right">
               Creado con <i class="fa fa-heart text-pulse"></i> en <a class="font-w600" href="http://goo.gl/vNS3I" target="_blank">Colombia</a>
            </div>
            <div class="float-left">
                <a class="font-w600" href="https://goo.gl/po9Usv" target="_blank">Artis Global Club</a> &copy; <span class="js-year-copy">2017</span>
            </div>
        </div>
        <!-- END Copyright Info -->
    </div>
</footer>




@endsection
