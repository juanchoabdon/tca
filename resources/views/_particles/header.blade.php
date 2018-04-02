<!-- Sidebar -->
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
                        <a class="link-effect font-w700" href="/">
                          <span class="font-size-xl text-dual-primary-dark">Trading Club Academy</span>
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
                <ul class="nav-main-header">
                  <li>
                      <a class="active" href="/">Inicio</a>
                  </li>
                  <li>
                      <a href="/contact-us">Contacto</a>
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





            </div>
            <!-- END Side Main Navigation -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>


<header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="content-header-section">
                    <!-- Logo -->
                    <div class="content-header-item">
                        <a class="link-effect font-w700 mr-5" href="/">
                            <span class="font-size-xl text-dual-primary-dark">Trading Club Academy</span>
                          <!--         <a href="{{ URL::to('/') }}" class="menuzord-brand">
                          @if(getcong('site_logo')) <img  style="filter: brightness(0) invert(1); margin-top: -8px;"src="{{ URL::asset('upload/'.getcong('site_logo')) }}" alt="" width="105px;"> @else {{getcong('site_name')}} @endif
                        </a> -->
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
                            <a class="active" href="/">Inicio</a>
                        </li>
                        <li>
                            <a href="/contact-us">Contacto</a>
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


    

                    <!-- END Open Search Section -->
                    <!-- END Toggle Sidebar -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

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


   <!--  <div class="outslider_loading">
         <div class="outslider_loader"></div>
      </div>

 <header class="header-area navbar-fixed-top">
   <div class="container custom-header">
      <div class="row">
         <div id="menuzord" class="menuzord">
            <a href="{{ URL::to('/') }}" class="menuzord-brand">
    @if(getcong('site_logo')) <img src="{{ URL::asset('upload/'.getcong('site_logo')) }}" alt="" width="105px;"> @else {{getcong('site_name')}} @endif
         </a>
               <ul class="menuzord-menu menuzord-menu-bg">
                  <li class="{{classActivePathPublic('')}}"><a href="{{ URL::to('/') }}">Inicio</a>
                  <li class="{{classActivePathPublic('memberships')}}"><a href="{{ URL::to('memberships/') }}"> Membresias </a></li>
                  <li class="{{classActivePathPublic('services')}}"><a href="#">Servicios</a>
                    <ul class="dropdown">
                       <li class="{{classActivePathPublic('courses')}}"><a href="{{ URL::to('courses/') }}">Entrenamientos</a></li>
                       <li class="{{classActivePathPublic('strategies')}}"><a href="{{ URL::to('strategies/') }}">Estrategias de inversión</a></li>
                       <li class="{{classActivePathPublic('alerts')}}"><a href="{{ URL::to('alerts/') }}">Señales</a></li>
                    </ul>
                   </li>
                  <li class="{{classActivePathPublic('conversations')}}"><a href="{{ URL::to('conversations/') }}">Conversatorios</a>
                  <li class="{{classActivePathPublic('blogs')}}"><a href="{{ URL::to('blogs/') }}">BLOG</a> </li>
                  <li class="{{classActivePathPublic('store')}}"><a href="{{ URL::to('store/') }}">Tienda</a></li>
                  <li class="{{classActivePathPublic('contact-us')}}"><a href="{{ URL::to('contact-us/') }}">Contacto</a></li>
               </ul>
             <div class="appointment-area">
                @if(!empty(Auth::user()))
                <div class="dropdown" style="top:20px;">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Hola {{Auth::user()->name}}
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  @if(Auth::user()->usertype=='Admin')
                  <li><a href="/admin/dashboard">Plataforma Admin</a></li>
                  @endif
                  @if(Auth::user()->usertype=='Estudiante' || Auth::user()->usertype=='Admin')
                  <li><a href="/app/dashboard">Plataforma</a></li>
                  @endif
                  <li><a href="/logout">Cerrar Sesión</a></li>
                </ul>
                </div>
                @else
                <p><a href="/login">Ingresar</a> &nbsp &nbsp<a href="/register">Registrarme!</a></p>
                @endif
             </div>
         </div>
      </div>
   </div>
</header>
 -->
