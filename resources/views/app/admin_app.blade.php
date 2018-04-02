
<!DOCTYPE html>
<html lang="es">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Trading Club Academy</title>


	<link href="{{ URL::asset('upload/'.getcong('site_favicon')) }}" rel="shortcut icon" type="image/x-icon" />

	<link rel="stylesheet" href="{{ URL::asset('../assets3/js/plugins/datatables/dataTables.bootstrap4.min.css') }}">

	<!-- Codebase framework -->
	<link rel="stylesheet" id="css-main" href="{{ URL::asset('../assets3/css/codebase.css') }}">





	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<div id="page-container" class="sidebar-o side-scroll page-header-modern main-content-boxed sidebar-inverse page-header-fixed">
	   @include("app.sidebar")
	     @include("app.topbar")
		 <main id="main-container">
	   	 @yield("content")
		 </main>
			 <!-- Footer -->
<footer id="page-footer" class="opacity-0">
		<div class="content py-20 font-size-xs clearfix">
				<!-- <div class="float-right">
						<a href="/upload/terms.pdf" target="_blank"> Terminos y condiciones </a> |  <a href="mailto:soporte@artisglobalclub.com"> Soporte </a>   |  <a href="/contact-us"> Contacto </a>
				</div> -->
				<div class="float-left">
						<a class="font-w600" href="https://goo.gl/po9Usv" target="_blank">Trading Club Academy</a> &copy;
						2017. Todos los derechos reservados
				</div>
		</div>
</footer>
<!-- END Footer -->
	   </div>
	</div>



		<!-- Codebase Core JS -->
		<script src="{{ URL::asset('../assets3/js/core/jquery.min.js') }}"></script>
		<script src="{{ URL::asset('../assets3/js/core/popper.min.js') }}"></script>
		<script src="{{ URL::asset('../assets3/js/core/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('../assets3/js/core/jquery.slimscroll.min.js') }}"></script>
		<script src="{{ URL::asset('../assets3/js/core/jquery.scrollLock.min.js') }}"></script>
		<script src="{{ URL::asset('../assets3/js/core/jquery.appear.min.js') }}"></script>
		<script src="{{ URL::asset('../assets3/js/core/jquery.countTo.min.js') }}"></script>
		<script src="{{ URL::asset('../assets3/js/core/js.cookie.min.js') }}"></script>
		<script src="{{ URL::asset('../assets3/js/codebase.js') }}"></script>

		<!-- Page JS Plugins -->
		<script src="{{ URL::asset('../assets3/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ URL::asset('../assets3/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

		<!-- Page JS Code -->
		<script src="{{ URL::asset('../assets3/js/pages/be_tables_datatables.js') }}"></script>
</body>

</html>
