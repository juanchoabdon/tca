<!DOCTYPE html>
<html lang="es">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="description" content="@yield('head_description', getcong('site_description'))">
    <meta property="keywords" content="@yield('head_keywords', getcong('site_keywords'))" />

    <meta property="og:type" content="article"/>
    <meta property="og:title" content="@yield('head_title',  getcong('site_name'))"/>
    <meta property="og:description" content="@yield('head_description', getcong('site_description'))"/>

    <meta property="og:image" content="@yield('head_image', url('/upload/logo.png'))" />
    <meta property="og:url" content="@yield('head_url', url())" />

    <link href="{{ URL::asset('upload/'.getcong('site_favicon')) }}" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="">
    <title>Trading Club Academy</title>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!--    <script src="{{ URL::asset('assets3/js/jquery-1.11.3.min.js')}}"></script>
    <link href="{{ URL::asset('assets3/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

     <link rel="stylesheet" href="{{ URL::asset('assets3/css/menuzord.css') }}">
        <link href="{{ URL::asset('assets3/css/stroke-icon.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets3/css/demo.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets3/css/ie7.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('assets3/css/bootFolio.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets3/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets3/css/jquery-ui.css') }}">
        <link href="{{ URL::asset('assets3/css/owl.theme.default.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets3/css/owl.carousel.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets3/revolution/css/settings.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets3/revolution/css/layers.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets3/revolution/css/navigation.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets3/css/style.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'> -->
        <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="assets3/js/plugins/slick/slick.min.css"><link rel="stylesheet" href="{{ URL::asset('assets3/js/plugins/slick/slick-theme.min.css')}}">

    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="{{ URL::asset('assets3/css/codebase.css')}}">

<body>
  <div id="page-container" class="sidebar-inverse side-scroll page-header-fixed page-header-glass page-header-inverse main-content-boxed">

	  @yield("content")



  </div>



      <!-- RS5.0 Core JS Files -->
    <!--    <script type="text/javascript" src="{{ URL::asset('assets3/revolution/js/jquery.themepunch.tools.min.js%3Frev=5.0')}}"></script>
      <script type="text/javascript" src="{{ URL::asset('assets3/revolution/js/jquery.themepunch.revolution.min.js%3Frev=5.0')}}"></script>
      <script type="text/javascript" src="{{ URL::asset('assets3/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
      <script type="text/javascript" src="{{ URL::asset('assets3/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
      <script type="text/javascript" src="{{ URL::asset('assets3/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
      <script type="text/javascript" src="{{ URL::asset('assets3/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/bootstrap.min.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/menuzord.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/owl.carousel.min.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/jquery.counterup.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/waypoints.min.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/countdown.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/parallax.min.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/jquery.bootFolio.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/jquery.magnific-popup.js')}}"></script>
      <script src="https://maps.googleapis.com/maps/api/js"></script>
      <script src="{{ URL::asset('assets3/js/jquery-ui.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/rev-function.js')}}"></script>

      <script src="{{ URL::asset('assets3/js/jquery.matchHeight.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/main.js')}}"></script> -->


      <script src="{{ URL::asset('assets3/js/core/jquery.min.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/core/popper.min.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/core/bootstrap.min.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/core/jquery.slimscroll.min.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/core/jquery.scrollLock.min.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/core/jquery.appear.min.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/core/jquery.countTo.min.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/core/js.cookie.min.js')}}"></script>
      <script src="{{ URL::asset('assets3/js/codebase.js')}}"></script>

      <!-- Page Plugins -->
      <script src="{{ URL::asset('assets3/js/plugins/slick/slick.min.js')}}"></script>

      <script src="{{ URL::asset('assets3/js/plugins/jquery-vide/jquery.vide.min.js')}}"></script>

      <!-- Page JS Code -->
      <script>
          jQuery(function () {
              // Init page helpers (Slick Slider plugin)
              Codebase.helpers('slick');
                Codebase.helpers('content-filter');
          });
      </script>
  </body>
</html>
