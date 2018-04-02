@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> Añadir Rango</h2>

		<a href="{{ URL::to('/admin/multinivel/nivel') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Atrás</a>

	</div>
	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
	 @if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif
    <div class="col-md-8 col-md-offset-2">
   	<div class="panel panel-default">
            <div class="panel-body">
                {!! Form::open(array('url' => array('admin/multinivel/nivel/add'),'method'=>'POST','class'=>'form-horizontal padding-15','name'=>'user_form','id'=>'user_form','role'=>'form','enctype' => 'multipart/form-data')) !!}

                <input type="hidden" name="id" value="{{$level->id}}">
                <label>Titulo</label>
                <input type="text" class="form-control" value="{{$level->nombre}}" name="nombre">
                <br>
                <label>Descripcion</label>
                <textarea class="form-control" rows="4" name="descripcion">{{$level->nombre}} </textarea>
                <br>
                <label>Miembros Activos</label>
                <input type="number" class="form-control" value="{{$level->active_membres}}" name="active_membres" >
                <br>
                <label>Prsv</label>
                <input type="number" class="form-control" value="{{$level->prsv}}" name="prsv">
                <br>
                <label>Recompensa</label>
                <input type="number" class="form-control"   value="{{$level->recompensa}}" name="recompensa">
                <br>
                <label>G.V</label>
                <input type="number" class="form-control"  value="{{$level->group_volume}}" name="group_volume" >
                <br>
                <center>
                  <input type="submit" class="btn btn-primary">
                </center>

                {!! Form::close() !!}
            </div>
        </div>
      </div>


</div>


@endsection
