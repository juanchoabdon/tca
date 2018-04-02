@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">


		<h2>Agregar Articulo</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">

		{!! Form::open(['url' => 'admin/blog/addblogs','method' => 'post','enctype' => 'multipart/form-data']) !!}
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<br>
			@if(!empty($articulo->id))
			<input type="hidden" value="{{$articulo->id}}" name="id">
			@endif

	    <label>Titulo</label>
	    <input type="text" name="titulo" class="form-control" value="@if(!empty($articulo->titulo)){{$articulo->titulo}}@endif" required>
	    <br>
      <label>Imagen Principal</label>
	    <input type="file" name="featured_image">
	    <br>
	    <label>Contenido</label>
	    <textarea class="form-control summernote" name="contenido" rows="10">@if(!empty($articulo->contenido)){{$articulo->contenido}}@endif </textarea>
			<br>
			<label>Categorias</label>
      <select class="form-control" name="categoria">
			@foreach($categorias as $categoria)
        <option value="{{$categoria->id}}" @if(!empty($articulo->id)) @if($categoria->id=$articulo->id){!! "selected" !!}@endif @endif>{{$categoria->descripcion}}</option>
      @endforeach
      </select>
		  <br>


			<center><input type="submit" class="btn btn-primary"></center>
	    </div>
		{!! Form::close() !!}
    <div class="clearfix"></div>
</div>

</div>





@endsection
