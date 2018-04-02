<!-- Sidebar Left -->
<!--  <div class="sidebar left-side" id="sidebar-left">
	 <div class="sidebar-user">
		<div class="media sidebar-padding">
			<div class="media-left media-middle">

				@if(Auth::user()->image_icon)

									<img src="{{ URL::asset('upload/members/'.Auth::user()->image_icon.'-s.jpg') }}" width="60" alt="person" class="img-circle">

							@else

							<img src="{{ URL::asset('admin_../assets3/images/guy.jpg') }}" alt="person" class="img-circle" width="60"/>

							@endif
			</div>
			<div class="media-body media-middle">

				<a href="{{ URL::to('admin/profile') }}" class="h4 margin-none">{{ Auth::user()->name }}</a>
				<ul class="list-unstyled list-inline margin-none">
					<li><a href="{{ URL::to('admin/profile') }}"><i class="md-person-outline"></i></a></li>
					@if(Auth::User()->usertype=="Admin")
					<li><a href="{{ URL::to('app/settings') }}"><i class="md-settings"></i></a></li>
					@endif
					<li><a href="{{ URL::to('app/logout') }}"><i class="md-exit-to-app"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="nicescroll">
		<div class="wrapper" style="margin-bottom:90px">
			<ul class="nav nav-sidebar" id="sidebar-menu">

          <li class="{{classActivePath('entrenamiento')}}"><a href="{{ URL::to('app/entrenamiento') }}"><i class="fa fa-usd"></i> Entrenamientos</a></li>
          <li class="{{classActivePath('estrategias')}}"><a href="{{ URL::to('app/estrategias') }}"><i class="fa fa-eur"></i> Estrategias</a></li>
          <li class="{{classActivePath('analisis')}}"><a href="{{ URL::to('app/analisis') }}"><i class="fa fa-bar-chart"></i>Análisis</a></li>
          <li class="{{classActivePath('tutorials')}}"><a href="{{ URL::to('app/tutorials') }}"><i class="fa fa-leanpub"></i>Tutoriales</a></li>
          <li class="{{classActivePath('podcast')}}"><a href="{{ URL::to('app/podcast') }}"><i class="fa fa-microphone"></i>Podcast</a></li>





      </ul>
		</div>
	</div>
</div>



  <div class="sidebar right-side" id="sidebar-right">

	<div class="nicescroll">
		<div class="wrapper">
			<div class="block-primary">
				<div class="media">
					<div class="media-left media-middle">
						<a href="#">
							 @if(Auth::user()->image_icon)

									<img src="{{ URL::asset('upload/members/'.Auth::user()->image_icon.'-s.jpg') }}" width="60" alt="person" class="img-circle border-white">

							@else

							<img src="{{ URL::asset('admin_../assets3/images/guy.jpg') }}" alt="person" class="img-circle border-white" width="60"/>

							@endif
						</a>
					</div>
					<div class="media-body media-middle">
				<a href="{{ URL::to('app/profile') }}" class="h4">{{ Auth::user()->name }}</a>
						<a href="{{ URL::to('app/logout') }}" class="logout pull-right"><i class="md md-exit-to-app"></i></a>
					</div>
				</div>
			</div>
			<ul class="nav nav-sidebar" id="sidebar-menu">
				<li><a href="{{ URL::to('app/profile') }}"><i class="md md-person-outline"></i> Account</a></li>

				@if(Auth::user()->usertype=='Admin')

				<li><a href="{{ URL::to('app/settings') }}"><i class="md md-settings"></i> Settings</a></li>

				@endif

				<li><a href="{{ URL::to('app/logout') }}"><i class="md md-exit-to-app"></i> Logout</a></li>
			</ul>
		</div>
	</div>
</div> -->


<nav id="sidebar">
              <!-- Sidebar Scroll Container -->
              <div id="sidebar-scroll">
                  <!-- Sidebar Content -->
                  <div class="sidebar-content">
                      <!-- Side Header -->
                      <div class="content-header content-header-fullrow px-15">
                          <!-- Mini Mode -->
                          <div class="content-header-section sidebar-mini-visible-b">
                              <!-- Logo -->
                              <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                 @if(  getAgcStatus(Auth::user()->id)   )
                                 <span class="text-dual-primary-dark">AGC</span>
                                 @else
                                  <span class="text-dual-primary-dark">AGC</span>
                                 @endif
                              </span>
                              <!-- END Logo -->
                          </div>
                          <!-- END Mini Mode -->

                          <!-- Normal Mode -->
                          <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                              <!-- Close Sidebar, Visible only on mobile screens -->
                              <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                              <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                  <i class="fa fa-times text-danger"></i>
                              </button>
                              <!-- END Close Sidebar -->

                            <style media="screen">
                                    .content-header {
                                        display: -ms-flexbox;
                                        display: flex;
                                        -ms-flex-direction: row;
                                        flex-direction: row;
                                        -ms-flex-pack: justify;
                                        justify-content: space-between;
                                        -ms-flex-align: center;
                                        align-items: center;
                                        margin: 0 auto;
                                        padding: 16px 12px;
                                        height: 90px;
                                    }
                            </style>
                              <!-- Logo -->
                              <div class="content-header-item">
                                  <a class="font-w700" href="index.html">
                                      @if(  getAgcStatus(Auth::user()->id)   )
                                       	  	<img src="/assets3/img/logo-agc.png" alt="" width="100" style="margin-bottom: 10px">
                                      @else
                                        <i class="si si-fire text-primary"></i>
                                        <span class="text-dual-primary-dark">TCA</span>
                                      @endif
                                  </a>
                              </div>
                              <!-- END Logo -->
                          </div>
                          <!-- END Normal Mode -->
                      </div>
                      <!-- END Side Header -->

                      <!-- Side User -->
                      <div class="content-side content-side-full content-side-user px-10 align-parent">
                          <!-- Visible only in mini mode -->
                          <div class="sidebar-mini-visible-b align-v animated fadeIn">
                            @if(Auth::user()->image_icon)
                    						<img src="{{ URL::asset('upload/members/'.Auth::user()->image_icon.'-s.jpg') }}" alt="you" class="img-avatar img-avatar32">
              							@else
              							     <img src="{{ URL::asset('admin_assets/images/guy.jpg') }}" alt="you" class="img-avatar img-avatar32"/>
              							@endif
                          </div>
                          <!-- END Visible only in mini mode -->

                          <!-- Visible only in normal mode -->
                          <div class="sidebar-mini-hidden-b text-center">
                              <a href="{{ URL::to('app/profile') }}" class="img-link">
                                @if(Auth::user()->image_icon)
                                    <img src="{{ URL::asset('upload/members/'.Auth::user()->image_icon.'-s.jpg') }}" width="60" alt="you" class="img-avatar">
                                @else
                                    <img src="{{ URL::asset('admin_assets/images/guy.jpg') }}" alt="you" class="img-avatar"/>
                                @endif
                              </a>
                              <ul class="list-inline mt-10">
                                  <li class="list-inline-item">
                                      <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="{{ URL::to('app/profile') }}">{{  strlen( Auth::user()->name) > 15 ? substr( Auth::user()->name,0,15)."..." :  Auth::user()->name  }}</a>
                                  </li>

                                  <li class="list-inline-item">
                                      <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                      <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                                          <i class="si si-drop"></i>
                                      </a>
                                  </li>
                                  <li class="list-inline-item">
                                      <a class="link-effect text-dual-primary-dark" href="{{ URL::to('admin/logout') }}">
                                          <i class="si si-logout"></i>
                                      </a>
                                  </li><br><br>

                                  <li class="list-inline-item">
                                      <a class="text-dual-primary-yellow" style="font-size: 12px">
                                          {{getUserLevel(Auth::user()->id)}} <i class=""></i>
                                      </a>
                                  </li>

                              </ul>
                          </div>
                          <!-- END Visible only in normal mode -->
                      </div>
                      <!-- END Side User -->

                      <!-- Side Navigation -->
                 @if(  !getAgcStatus(Auth::user()->id)   )
                      <div class="content-side content-side-full">
                          <ul class="nav-main">
                            <li>
                                <a class="{{classActivePath('dashboard')}}" href="{{ URL::to('app/dashboard') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                            </li>

                              <li class="nav-main-heading"><span class="sidebar-mini-visible">Ed</span><span class="sidebar-mini-hidden">Educación</span></li>
                              <li>
                                <a class="{{classActivePath('entrenamiento')}}" href="{{ URL::to('app/entrenamiento') }}"><i class="fa fa-usd"></i>Entrenamientos técnicos</a>
                              </li>
                              <li>
                                <a class="{{classActivePath('estrategias')}}" href="{{ URL::to('app/estrategias') }}"><i class="fa fa-eur"></i>Estrategias</a>
                              </li>
                              <li>
                                <a class="{{classActivePath('lives')}}" href="{{ URL::to('app/lives') }}"><i class="fa fa-video-camera"></i>Trading en vivo</a>
                              </li>
                              <li>
                                <a class="{{classActivePath('analisis')}}"href="{{ URL::to('app/analisis') }}"><i class="fa fa-bar-chart"></i>Análisis</a>
                              </li>
                              <li>
                                <a  class="{{classActivePath('tutorials')}}" href="{{ URL::to('app/tutorials') }}"><i class="fa fa-leanpub"></i>Tutoriales</a>
                              </li>
                              <li>
                                <a class="{{classActivePath('podcast')}}" href="{{ URL::to('app/podcast') }}"><i class="fa fa-microphone"></i>Podcast</a>
                              </li>
                          </ul>
                      </div>
                    @endif


                     @if(  getAgcStatus(Auth::user()->id)   )
                       <div class="content-side content-side-full">
                                        <ul class="nav-main">
                       @if(  getAgcStatus(Auth::user()->id)->status   )


                                 <li>
                                     <a class="{{classActivePath('dashboard')}}" href="{{ URL::to('app/dashboard') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                                 </li>

                                   <li class="nav-main-heading"><span class="sidebar-mini-visible">Ed</span><span class="sidebar-mini-hidden">Educación</span></li>
                                   <li>
                                     <a class="{{classActivePath('entrenamiento')}}" href="{{ URL::to('app/entrenamiento') }}"><i class="fa fa-usd"></i>Entrenamientos técnicos</a>
                                   </li>
                                   <!--<li>
                                     <a class="{{classActivePath('estrategias')}}" href="{{ URL::to('app/estrategias') }}"><i class="fa fa-eur"></i>Estrategias</a>
                                   </li>-->
                                   <li>
                                     <a class="{{classActivePath('softskills')}}" href="{{ URL::to('app/softskills') }}"><i class="fa fa-user-o"></i>Desarrollo personal</a>
                                   </li>
                                  <!--<li>
                                     <a class="{{classActivePath('lives')}}" href="{{ URL::to('app/lives') }}"><i class="fa fa-video-camera"></i>Trading en vivo</a>
                                   </li>-->
                                   <li>
                                     <a class="{{classActivePath('analisis')}}"href="{{ URL::to('app/analisis') }}"><i class="fa fa-bar-chart"></i>Análisis</a>
                                   </li>
                                   <li>
                                     <a  class="{{classActivePath('tutorials')}}" href="{{ URL::to('app/tutorials') }}"><i class="fa fa-leanpub"></i>Tutoriales</a>
                                   </li>
                                   <li>
                                     <a  class="{{classActivePath('rooms')}}" href="{{ URL::to('app/rooms') }}"><i class="fa fa-video-camera"></i>Trading en vivo</a>
                                   </li>
                                   <!--<li>
                                     <a class="{{classActivePath('podcast')}}" href="{{ URL::to('app/podcast') }}"><i class="fa fa-microphone"></i>Podcast</a>
                                 </li>-->

                                   <li class="nav-main-heading"><span class="sidebar-mini-visible">Em</span><span class="sidebar-mini-hidden">Emprendedores</span></li>
                                   <li>
                                     <a class="{{classActivePath('team')}}" href="{{ URL::to('app/team') }}"><i class="si si-users"></i>Tu equipo</a>
                                   </li>
                                   <li>
                                     <a class="{{classActivePath('commissions')}}" href="{{ URL::to('app/commissions') }}"><i class="fa fa-money"></i>Comisiones</a>
                                   </li>
                                   <li>
                                     <a class="{{classActivePath('autotrading')}}" href="{{ URL::to('app/autotrading') }}"><i class="si si-graph"></i>Autotrading</a>
                                   </li>
                                   <li>


                          @else

                              <li>
                                  <a class="{{classActivePath('profile')}}" href="{{ URL::to('app/profile') }}"><i class="si si-user"></i><span class="sidebar-mini-hide">Tu Perfil</span></a>
                              </li>

                              </ul>
                          </div>

                         @endif





                      @endif
                      <!-- END Side Navigation -->
                  </div>
                  <!-- Sidebar Content -->
              </div>
              <!-- END Sidebar Scroll Container -->
          </nav>

          <style media="screen">
          #page-container.sidebar-inverse #sidebar .content-side-user {
            background-color: #2d3238 ;
            height: 190px;
            }
          </style>
