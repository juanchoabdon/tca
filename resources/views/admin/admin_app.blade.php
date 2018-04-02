
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artis Global Club Admin</title>

	<link href="{{ URL::asset('upload/'.getcong('site_favicon')) }}" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="{{ URL::asset('admin_assets/css/style.css') }}">
	<!-- Plugins -->


 <link rel="stylesheet" href="{{ URL::asset('/bower_components/bootstrap/dist/css/bootstrap.min.css')  }}" />
 <link rel="stylesheet" href="{{ URL::asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')  }}" />



	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body class="sidebar-push  sticky-footer">

     	<!-- BEGIN TOPBAR -->

         @include("admin.topbar")

        <!-- END TOPBAR -->

	      <!-- BEGIN SIDEBAR -->

	       @include("admin.sidebar")

	      <!-- END SIDEBAR -->
  		<div class="container-fluid">

 		   @yield("content")

	 		<div class="footer">
				<a href="{{ URL::to('admin/dashboard') }}" class="brand">
					{{getcong('site_name')}}
				</a>
				<ul>

				</ul>
			</div>
  		</div>


  <div class="overlay-disabled"></div>




	<script src="{{ URL::asset('admin_assets/js/jquery.js') }}"></script>
	<script src="{{ URL::asset('admin_assets/js/plugins.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>

	<script type="text/javascript">
	$( "#number" ).keyup(function() {
			$("#number").mask('000.000.000.000.000', {reverse: true});
	});

	$(function() {
  	$("#summernote").summernote({
    toolbar: [
        ['style', ['bold', 'italic', 'underline']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']]
    ],
     height:200
		});
	});
	</script>


	<!-- Loaded only in index.html for demographic vector map-->
	<script src="{{ URL::asset('admin_assets/js/jvectormap.js') }}"></script>

	<!-- App Scripts -->
	<script src="{{ URL::asset('admin_assets/js/scripts.js') }}"></script>
 <script type="text/javascript" src="{{ URL::asset('/bower_components/moment/min/moment.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/bower_components/moment/locale/es.js') }}"></script>

 <script type="text/javascript" src="{{ URL::asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
</body>

</html>
