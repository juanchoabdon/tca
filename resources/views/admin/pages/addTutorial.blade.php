@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
  		<h2>Añadir Tutorial</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
	{!! Form::open(array('url' => 'admin/tutorials/add','class'=>'form-horizontal padding-15','title'=>'title','status' => 'status','video_url'=>'video_url')) !!}
	<form method="post">

		<div class="form-group row" >
		    <label>Titulo</label>
		    <input type="text" name="title" class="form-control" placeholder="Ej:  Como crear tu cuenta en tradeview" required><br>
		</div>
		<div class="form-group row" >
		<label>Artis global Club</label>
			<select class="form-control" onchange="setOption()" id="agc-status" name="status">
				<option  selected value="2">Selecciona</option>
				<option  value="1">Activo</option>
				<option  value="0">Inactivo</option>
			</select><br>
		</div>
		<div class="form-group row" >

			<label>Video URL</label>
			<input type="text" id="video" name="video_url" class="form-control" value="" required>
			<br>
		</div>
		<div class="form-group row" >
			<center><input type="submit" class="btn btn-primary"> </center>
	    </div>

		</form>
		 {!! Form::close() !!}
    <div class="clearfix"></div>
</div>

</div>





@endsection
