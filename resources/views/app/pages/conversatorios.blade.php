@extends("app.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		<h2>Entrenamientos</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif




<div class="panel panel-default panel-shadow">
    <div class="panel-body">


    </div>

</div>

</div>



@endsection
