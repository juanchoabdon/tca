@extends("app.admin_app")

@section("content")


  <div class="content">
  		<h2 class="content-heading">Completa o edita tu perfil</h2>
      <div class="row">
          <div class="col-lg-12">
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                </div>
                @endif
               @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                            {{ Session::get('flash_message') }}
                    </div>
                @endif
           </div>
          <div class="col-lg-12">
              <div class="block">
                  <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" href="#btabs-alt-static-home">Cuenta</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#btabs-alt-static-profile">Contraseña</a>
                      </li>
                  </ul>
                  <div class="block-content tab-content">
                      <div class="tab-pane active" id="btabs-alt-static-home" role="tabpanel">
                        <div class="col-md-12">
                              <div class="block">
                                  <div class="block-content">
                                    @if(  !getAgcStatus(Auth::user()->id)->status  )
                                      <h2 class="text-muted">Membresia inactiva
                                        <a  href="/app/buy/{{Auth::user()->id}}" class="btn btn-alt-primary">Pagar Membresia</a>
                                      </h2>

                                    @else
                                      <h2 class="text-muted">Membresia activa - <strong>{{$level}}</strong></h2>
                                    @endif
                                    {!! Form::open(array('url' => 'app/profile','class'=>'form-horizontal padding-15','name'=>'account_form','id'=>'account_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                                      <div class="form-group row">
                                            <label class="col-12">Foto de perfil</label>
                                            <div class="media-left">
                                                @if(Auth::user()->image_icon)
                                                  <img src="{{ URL::asset('upload/members/'.Auth::user()->image_icon.'-s.jpg') }}" width="80" alt="person">
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <label class="custom-file">
                                                    <input type="file" class="custom-file-input" id="example-file-input-custom" name="user_icon">
                                                    <span class="custom-file-control"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-9">
                                                <div class="form-material">
                                                    <input type="text" value="{{ Auth::user()->name }}" class="form-control" id="material-text2" name="name">
                                                    <label for="name">Nombre</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-5">
                                                <div class="form-material">
                                                    <input type="text"  value="{{ Auth::user()->email }}" class="form-control" id="email" name="email">
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-material">
                                                    <input type="text" value="{{ Auth::user()->phone }}" class="form-control" id="phone" name="phone">
                                                    <label for="phone">Número de celular</label>
                                                </div>
                                            </div>
                                        </div>

                                       <div class="form-group row">
                                            <div class="col-9">
                                                <div class="form-material">
                                                    <input type="text"  value="{{ Auth::user()->mt4_server }}" class="form-control" id="mt4_server" name="mt4_server" autocomplete="off">
                                                    <label for="mt4_server">Metatrader 4 Server</label>
                                                </div>
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

                                        <div class="form-group row">
                                            <div class="col-4">
                                                <div class="form-material">
                                                    <input type="text"  value="{{ Auth::user()->mt4_login }}" class="form-control" id="mt4_login" name="mt4_login">
                                                    <label for="mt4_login">Metatrader 4 Login</label>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-material">
                                                    <input type="text" value="{{ Auth::user()->mt4_password }}" class="form-control" id="mt4_password" name="mt4_password">
                                                    <label for="mt4_password">Metatrader 4 Password</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                             <div class="col-9">
                                                 <div class="form-material">
                                                     <input type="text"  value="{{ Auth::user()->btc_address}}" class="form-control" id="btc_address" name="btc_address">
                                                     <label for="btc_address">Bitcoin Address</label>
                                                     <div class="form-text text-muted text-right">Las comisiones por venta llegarán a este address</div>
                                                 </div>
                                             </div>
                                         </div>


                                        <div class="form-group row">
                                            <div class="col-md-9">
                                                <button type="submit" class="btn btn-alt-warning">Actualizar</button>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                  </div>
                              </div>
                            </div>
                      </div>
                      <div class="tab-pane" id="btabs-alt-static-profile" role="tabpanel">
                              {!! Form::open(array('url' => 'app/profile_pass','class'=>'form-horizontal padding-15','name'=>'pass_form','id'=>'pass_form','role'=>'form')) !!}

                              <div class="form-group row">
                                  <div class="col-md-9">
                                      <div class="form-material floating">
                                          <input type="password" class="form-control" id="password" name="password">
                                          <label for="password">Nueva Contraseña</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-md-9">
                                      <div class="form-material floating">
                                          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                          <label for="password_confirmation">Confirmar Contraseña</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-md-9">
                                      <button type="submit" class="btn btn-alt-warning">Aceptar</button>
                                  </div>
                              </div>

                              {!! Form::close() !!}
                      </div>
                  </div>
              </div>
              <!-- END Block Tabs Alternative Style -->
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

    $("#mt4_server").autocomplete({
           source: real_servers
    });

    $(document).ready(function(){
    });

    </script>




@endsection
