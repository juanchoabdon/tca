@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> {{ isset($city->city_name) ? 'Editar: '. $city->city_name : 'Añadir ciudad' }}</h2>

		<a href="{{ URL::to('admin/cities') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Atrás</a>

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

   	<div class="panel panel-default">
            <div class="panel-body">
                {!! Form::open(array('url' => array('admin/cities/addcity'),'class'=>'form-horizontal padding-15','name'=>'city_form','id'=>'city_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                <input type="hidden" name="id" value="{{ isset($city->id) ? $city->id : null }}">
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Nombre de Ciudad</label>
                      <div class="col-sm-9">
                        <input type="text" name="city_name" value="{{ isset($city->city_name) ? $city->city_name : null }}" class="form-control">
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">{{ isset($city->id) ? 'Editar ' : 'Añadir ciudad' }}</button>

                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>


</div>

@endsection
