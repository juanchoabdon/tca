@extends("admin.admin_app")

@section("content")

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
                {!! Form::open(array('url' => array('admin/users/adduser'),'method'=>'POST','class'=>'form-horizontal padding-15','name'=>'user_form','id'=>'user_form','role'=>'form','enctype' => 'multipart/form-data')) !!}

								<div class="form-group">
										<label for="" class="col-sm-3 control-label">Cedula</label>
										<div class="col-sm-9">
											@if(isset($user->id))
											<input type="text" readonly name="id" value="{{ $user->id }}" class="form-control">
											@else
											<input type="text" name="cc" class="form-control" required>
											@endif



										</div>
								</div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" value="{{ isset($user->name) ? $user->name : null }}" class="form-control">
                    </div>
                </div>
									<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Teléfono</label>
                    <div class="col-sm-9">
                        <input type="text" name="phone" value="{{ isset($user->phone) ? $user->phone : null }}" class="form-control" value="">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Dirección</label>
                    <div class="col-sm-9">
                        <input type="text" name="address" value="{{ isset($user->address) ? $user->address : null }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Ciudad</label>
                        <div class="col-sm-9">
                        <input type="text" name="city" value="{{ isset($user->city) ? $user->city : null }}" class="form-control" value="">
                        </div>
                </div>



				<div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Imágen de perfil</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if(isset($user->image_icon))

									<img src="{{ URL::asset('upload/members/'.$user->image_icon.'-s.jpg') }}" width="80" alt="person">
								@endif

                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="image_icon" class="filestyle">
                            </div>
                        </div>

                    </div>
        </div>

				<hr />
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Correo</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" value="{{ isset($user->email) ? $user->email : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Contraseña</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" value="" class="form-control">
                    </div>
                 </div>
								<div class="form-group">
										<label for="" class="col-sm-3 control-label">Suscripcion</label>
										<div class="col-sm-9">
											<select class="form-control" name="subscription">

												@foreach($subscriptions as $subscription)
													<option value="{{$subscription->id}}"
														@if(!empty($suscription))
															@if($suscription->subscription_id == $subscription->id)
															{{" selected"}}
															@endif
														@endif
														>{{$subscription->name}}</option>
												@endforeach
											</select>
										</div>
								</div>





								@if(Auth::user()->usertype=="Admin")
								<div class="form-group">
										<label for="" class="col-sm-3 control-label">Rol</label>
										<div class="col-sm-9">
												<select class="form-control" name="usertype">
													@if(!empty($user))
													<option value="Estudiante" {{ ($user->usertype=="Estudiante") ? 'selected' : '' }}>Estudiante</option>
													<option value="Admin" {{ ($user->usertype=="Admin") ? 'selected' : '' }}>Administrador</option>
													<option value="Profesor" {{ ($user->usertype=="Profesor") ? 'selected' : '' }}>Profesor</option>

													@else
													<option value="Estudiante" >Estudiante</option>
													<option value="Admin" >Administrador</option>
													<option value="Profesor">Profesor</option>



													@endif
												</select>
										</div>
								</div>
								@else
								<input type="hidden" name="usertype" value="{{ isset($user->usertype) ? $user->usertype : 'Estudiante' }}">

								@endif



						   @if($agc)
									<h3>Artis global club</h3>

									<div class="form-group">
										<div class="col-sm-9 col-md-offset-3">
													<a href="/admin/users/change-agc-status/{{$user->id}}" class="btn btn-default">{{ $agc_status ? 'Desactivar' : 'Activar' }} Membresia</a>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-9 col-md-offset-3">
													<a href="/admin/users/change-autotrading-status/{{$user->id}}" class="btn btn-default">{{ $user->autotrading ? 'Desactivar' : 'Activar' }} Autotrading</a>
										</div>
									</div>
									<div class="form-group">
											<label for="" class="col-sm-3 control-label">MT4 server</label>
											<div class="col-sm-9">
													<input type="text" name="mt4_server" value="{{ isset($user->mt4_server) ? $user->mt4_server : null }}" class="form-control" id="mt4_server" autocomplete="off">
											</div>
									</div>

									<style media="screen">
									.ui-autocomplete {
										position: absolute;
										top: 100%;
										left: 0;
										z-index: 1000;
										float: left;
										display: none;
										min-width: 160px;
										padding: 4px 0;
										margin: 0 0 10px 25px;
										list-style: none;
										background-color: #ffffff;
										border-color: #ccc;
										border-color: rgba(0, 0, 0, 0.2);
										border-style: solid;
										border-width: 1px;
										-webkit-border-radius: 5px;
										-moz-border-radius: 5px;
										border-radius: 5px;
										-webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
										-moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
										box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
										-webkit-background-clip: padding-box;
										-moz-background-clip: padding;
										background-clip: padding-box;
										*border-right-width: 2px;
										*border-bottom-width: 2px;
										}

										.ui-helper-hidden-accessible {
											display: none
										}

										.ui-menu-item > a.ui-corner-all {
										display: block;
										padding: 3px 15px;
										clear: both;
										font-weight: normal;
										line-height: 18px;
										color: #555555;
										white-space: nowrap;
										text-decoration: none;
										}

										.ui-state-hover, .ui-state-active {
										color: #ffffff;
										text-decoration: none;
										background-color: #0088cc;
										border-radius: 0px;
										-webkit-border-radius: 0px;
										-moz-border-radius: 0px;
										background-image: none;
										}
									</style>

										<div class="form-group">
											<label for="" class="col-sm-3 control-label">MT4 Login</label>
											<div class="col-sm-9">
													<input type="text" name="mt4_login" value="{{ isset($user->mt4_login) ? $user->mt4_login : null }}" class="form-control" value="">
											</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">MT4 Password</label>
										<div class="col-sm-9">
												<input type="text" name="mt4_password" value="{{ isset($user->mt4_password) ? $user->mt4_password : null }}" class="form-control" value="">
										</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-3 control-label">Bitcoin address</label>
									<div class="col-sm-9">
											<input type="text" name="btc_address" value="{{ isset($user->btc_address) ? $user->btc_address : null }}" class="form-control" value="">
									</div>
							</div>


							 @endif



                <hr>
								<div class="col-md-9 col-md-offset-3">
								<h4>Entrenamientos</h4>

								@foreach($trainings as $training)
								<input type="checkbox"  name="trainings[]"
					      @foreach($features as $feature)
					        @if($feature->product_id == $training->id && $feature->type == "training" && $feature->user_id == $id)
					        {{"checked"}}
					        @endif
					      @endforeach
					      value="{{$training->id}}"> {{$training->title}}<br>
								@endforeach
							</div>
							<hr><br>

							<div class="col-md-9 col-md-offset-3">
							<h4>Estrategias</h4>


							@foreach($estrategias as $estrategia)

							<input type="checkbox"  name="estrategias[]"

				      @foreach($features as $feature)

				        @if($feature->product_id == $estrategia->id && $feature->type == "estrategia" && $feature->user_id == $id)
				        {{"checked"}}
				        @endif
				      @endforeach
				      value="{{$estrategia->id}}"> {{$estrategia->titulo}}<br>
							@endforeach


						</div>
						<hr>
						<div class="col-md-9 col-md-offset-3">
						<h4>Entrenamientos blandos</h4>


						@foreach($softTrainings as $estrategia)

						<input type="checkbox"  name="softskills[]"

						@foreach($features as $feature)

							@if($feature->product_id == $estrategia->id && $feature->type == "softskills" && $feature->user_id == $id)
							{{"checked"}}
							@endif
						@endforeach
						value="{{$estrategia->id}}"> {{$estrategia->title}}<br>
						@endforeach


					</div>
						<hr>
						<div class="col-md-9 col-md-offset-3">
						<h4>Señales</h4>

						@foreach($señales as $señal)
						<input type="checkbox"  name="senales[]"
						@foreach($features as $feature)
							@if($feature->product_id == $señal->id && $feature->type == "senal" && $feature->user_id == $id)
							{{"checked"}}
							@endif
						@endforeach
						value="{{$señal->id}}"> {{$señal->titulo}}<br>
						@endforeach
						<br>
						<h4>Podcast</h4>

						<input type="checkbox" name="podcast"
						@foreach($features as $feature)
						@if($feature->type=="podcast")
						{{"checked"}}
						@endif
						@endforeach


						>
						Activar Podcast
<br>
					</div>


                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
											<br><br>
                    	<button type="submit" class="btn btn-primary">{{ isset($user->name) ? 'Editar Usuario' : 'Añadir Usuario' }}</button>

                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>


</div>


<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">

	<?php
	print "var servers =".$servers;
	?>

	var real_servers = [];
	for ( var server of servers ) {
		real_servers.push(server.name)
	}

	console.log(real_servers)

	$("#mt4_server").autocomplete({
		   source: real_servers
	});

	$(document).ready(function(){
	});

	</script>

@endsection
