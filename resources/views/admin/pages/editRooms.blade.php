@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
  		<h2>Editar Sala</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
	<form  action="/admin/rooms/add" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{$id}}">
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
	    <label>Titulo</label>
	    <input type="text" name="name" class="form-control" value="{{$room->name}}" placeholder="Ejemplo, Bitcoins" required>
	    <br>
	    <label>Descripción</label>
	    <textarea class="form-control summernote" name="description" rows="5">{{$room->description}}</textarea>
			<br>
            <label>Estado</label>
            @if($room->status==1)
            <select class="form-control" onchange="setOption()"  name="status">
                <option   value="0">Selecciona</option>
                <option   value="1" selected >Activo</option>
                <option   value="0">Inactivo</option>
            @else
            <select class="form-control" onchange="setOption()"  name="status">
                <option   value="0">Selecciona</option>
                <option   value="1">Activo</option>
                <option   value="0" selected>Inactivo</option>
            </select>
            @endif
            <br>
          <label>Código</label>
          <input type="text" class="form-control" name="video" value="{{$room->video}}" placeholder="Ejemplo, 5">
          <br>
			<center><input type="submit" class="btn btn-primary"> </center>
	    </div>
		</form>
    <div class="clearfix"></div>
</div>

</div>





@endsection
