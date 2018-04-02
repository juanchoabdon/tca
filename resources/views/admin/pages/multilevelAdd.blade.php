@extends("admin.admin_app")

@section("content")
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css">

<div id="main">
	<div class="page-header">
		<h2> {{ isset($user->name) ? 'Editar: '. $user->name : 'Añadir usuario' }}</h2>

		<a href="{{ URL::to('admin/users') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Atrás</a>

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
                {!! Form::open(array('url' => array('admin/multinivel/add'),'method'=>'POST','class'=>'form-horizontal padding-15','name'=>'user_form','id'=>'user_form','role'=>'form','enctype' => 'multipart/form-data')) !!}


                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Usuario</label>
                    <div class="col-sm-9">
                      <select class="form-control select2" name="usuario">
                        <option></option>

                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->id}} - {{$user->name}} </option>
                        @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Referido</label>
                    <div class="col-sm-9">
                      <select class="form-control select2" name="referido">
                        <option></option>
                        <option value="0">Lider</option>
                        @foreach($networkers as $networker)
                        <option value="{{$networker->user_id}}"> {{$networker->user_id}} </option>
                        @endforeach
                      </select>
                    </div>
                </div>




                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
											<br><br>
                    	<button type="submit" class="btn btn-primary">Añadir</button>

                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>


</div>

<script type="text/javascript">
  $('.select2').select2({
    theme: "bootstrap"
  });
</script>

@endsection
