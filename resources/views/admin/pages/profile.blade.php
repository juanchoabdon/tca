@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> {{ Auth::user()->name }}</h2>
		<a href="{{ URL::to('admin/dashboard') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Back</a>

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
    <div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#account" aria-controls="account" role="tab" data-toggle="tab">Cuenta</a>
        </li>
        <li role="presentation">
            <a href="#ac_password" aria-controls="ac_password" role="tab" data-toggle="tab">Contraseña</a>
        </li>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content tab-content-default">
        <div role="tabpanel" class="tab-pane active" id="account">
            {!! Form::open(array('url' => 'admin/profile','class'=>'form-horizontal padding-15','name'=>'account_form','id'=>'account_form','role'=>'form','enctype' => 'multipart/form-data')) !!}

                <div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Profile Picture</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if(Auth::user()->image_icon)

									<img src="{{ URL::asset('upload/members/'.Auth::user()->image_icon.'-s.jpg') }}" width="80" alt="person">
								@endif

                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="user_icon" class="filestyle">
                                <small class="text-muted bold">Tamaño 80x80px</small>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" value="">
                    </div>
                </div>
				 <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" value="">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Telefono</label>
                    <div class="col-sm-9">
                        <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control" value="">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Dirección</label>
                    <div class="col-sm-9">
                        <input type="text" name="address" value="{{ Auth::user()->address }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Ciudad</label>
                    <div class="col-sm-9">
                        <input type="text" name="city" value="{{ Auth::user()->city }}" class="form-control" value="">
                    </div>
                </div>



                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">Guardar Cambios <i class="md md-lock-open"></i></button>

                    </div>
                </div>

            {!! Form::close() !!}
        </div>
        <div role="tabpanel" class="tab-pane" id="ac_password">

            {!! Form::open(array('url' => 'admin/profile_pass','class'=>'form-horizontal padding-15','name'=>'pass_form','id'=>'pass_form','role'=>'form')) !!}

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Nueva Contraseña</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" value="" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Confirmar Contraseña</label>
                    <div class="col-sm-9">
                        <input type="password" name="password_confirmation" value="" class="form-control" value="">
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">Guardar Cambios <i class="md md-lock-open"></i></button>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>

    </div>
</div>
</div>

@endsection
