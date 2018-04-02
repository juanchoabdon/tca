@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
  		<h2>Añadir Cuenta madre</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
		{!! Form::open(array('url' => 'admin/master-accounts/add','class'=>'form-horizontal padding-15','title'=>'title','link'=>'link','description'=>'description','mt4_server'=>'mt4_server','mt4_login' => 'mt4_login','mt4_password' => 'mt4_password')) !!}
	<form  enctype="multipart/form-data">
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<br>

		<label>Título</label>
		<input type="text" name="title" class="form-control" value="" required>
		<br>

		<label>URL</label>
	    <input type="text" name="link" class="form-control" value="" placeholder="" required>
	  	<br>

	    <label>Descripción</label>
	    <input type="text" name="description" class="form-control" placeholder="Ej: Robot x" required><br>


			<label>MT4 server</label>
			<input type="text" name="mt4_server" class="form-control" value="" required>
			<br>

      <label>MT4 login</label>
      <input type="text" name="mt4_login" class="form-control" value="" required>
      <br>

      <label>MT4 Password</label>
      <input type="text" name="mt4_password" class="form-control" value="" required>
      <br>

			<center><input type="submit" class="btn btn-primary" value="Agregar"> </center>
	    </div>
	</form>
	 {!! Form::close() !!}
    <div class="clearfix"></div>
</div>

</div>





@endsection
