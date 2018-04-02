@extends("admin.admin_app")

@section("content")




<div id="main">
	<div class="page-header">
		<h2>Agregar Conversatorio</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">

		{!! Form::open(['url' => 'admin/conversations/add','method' => 'post','enctype' => 'multipart/form-data']) !!}
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<br>
			@if(!empty($conversation->id))
			<input type="hidden" value="{{$conversation->id}}" name="id">
			@endif


	    <label>Titulo</label>
	    <input type="text" name="title" class="form-control" value="@if(!empty($conversation->title)){{$conversation->title}}@endif" required>
	    <br>
			<label>Cupo</label>
	    <input type="number" name="quota" class="form-control" value="@if(!empty($conversation->quota)){{$conversation->quota}}@endif" required>
	    <br>
			<label>Fecha <small> (Clic en el reloj para seleccionar la hora)</small></label>
	    <input type='text' class="form-control" name="date" id='datetimepicker4'/>
	    <br>
			<div class="row">
			@if(!empty($conversation->img))
			@if($conversation->img != null)

			  <div class="col-xs-6 col-md-3">
			    <a href="#" class="thumbnail">
			      <img src="{{ URL::asset('upload/conversations/'.$conversation->img.'-b.png') }}" alt="" class="img-responsive">
			    </a>
			  </div>
			@endif
			@endif
			<div class="col-xs-6 col-md-3">
			<label>Imagen Principal</label>
			<input type="file" name="featured_image">
			<br>
		</div>
			</div>

	    <label>Contenido</label>
	    <textarea class="form-control summernote" name="text" rows="10">@if(!empty($conversation->text)){{$conversation->text}}@endif </textarea>
			<br>
		  <center><input type="submit" class="btn btn-primary"></center>
	    </div>
		{!! Form::close() !!}
    <div class="clearfix"></div>
</div>

</div>
<script type="text/javascript">
		$(function () {
				$('#datetimepicker4').datetimepicker({
					<?php
					if(!empty($conversation->date)) {
						echo 'defaultDate:';
						echo "'".$conversation->date."',";
					}
				 	?>

					locale: 'es',
					format: 'YYYY-MM-DD hh:mm A'
				});
		});
</script>




@endsection
