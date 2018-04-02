@extends("app.admin_app")

@section("content")

  <div class="content">
  		<h2 class="content-heading">Autotrading</h2>
      <div class="row">
          <div class="col-lg-12">
               @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                            {{ Session::get('flash_message') }}
                    </div>
                @endif
                @if(Session::has('info_message'))
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                        {{ Session::get('info_message') }}
                </div>
                @endif
                @if(Session::has('error_message'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                        {{ Session::get('error_message') }}
                </div>
                @endif
           </div>
          <div class="col-lg-12">
              <div class="block">
                  <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
                      <li class="nav-item" onclick="location.href = '/app/autotrading' "  >
                          <a class="nav-link" href="#autotrading">Estrategias</a>
                      </li>
                      <li class="nav-item"  onclick="location.href = '/app/autotrading/settings' ">
                          <a class="nav-link active" >Configuración</a>
                      </li>
                      <li class="nav-item"  onclick="location.href = '/app/autotrading/account' ">
                          <a class="nav-link" href="#account">Cuenta</a>
                      </li>
                  </ul>
                  <div class="block-content tab-content">
                      <div class="tab-pane" id="autotrading" role="tabpanel">


                          <div class="block">
                      <div class="block-header block-header-default">
                          <h3 class="block-title">Estrategias de trading</h3>
                          <div class="block-options">
                              <div class="block-options-item">
                                  <code></code>
                              </div>
                          </div>
                      </div>
                      <div class="block-content">
                          <table class="table table-vcenter">
                              <thead>

                                  <tr>
                                      <th>Título</th>

                                      <th class="d-none d-sm-table-cell" style="width: 25%;">Descripción</th>
                                      <th class="text-center" style="width: 100px;">acción</th>
                                  </tr>
                              </thead>
                              <tbody>
                                   @foreach($accounts as $account)
                                  <tr>
                                      <td>{{$account->title}}</td>
                                       <td>{{$account->url}}</td>

                                       <td class="text-center">
                                           @if( ($user->master_account_id > 0) && !($account->description === $master_account[0]->description) )
                                          <a href="autotrading/subscribe/{{$account->mt4_login}}"  class="btn btn-alt-success min-width-125" onclick="return confirm('Si te suscribes a {{$account->description}} te darás de baja de {{$master_account[0]->description}}, estas seguro ?')">Suscribirse</a>
                                           @endif
                                           @if( ($user->master_account_id == 0))
                                          <a href="autotrading/subscribe/{{$account->mt4_login}}"  class="btn btn-alt-success min-width-125" >Suscribirse</a>
                                           @endif
                                          @if(($user->master_account_id > 0) && ($account->description === $master_account[0]->description))
                                          <a href="autotrading/unsubscribe"  class="btn btn-alt-danger min-width-125">Desuscribirse</a>
                                           @endif
                                       </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>

                      </div>
                      <div class="tab-pane active" id="configuration" role="tabpanel">
                          <div class="col-xl-6-center">
                          <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Configuración de Cartera</h3>
                                    <div class="col-sm-9 col-md-offset-3" align="right">
                                        <a href="/app/change-autotrading-status" class="btn btn-alt-primary" >{{ Auth::user()->autotrading ? 'Desactivar' : 'Activar' }} Autotrading</a>
                                    </div>
                                </div>
                                </div>
                                <div class="block-content">

                                {!! Form::open(array('url' => 'app/autotrading/configuration','class'=>'form-horizontal padding-15','fixed_input'=>'fixed_input','capital_to_risk' => 'capital_to_risk')) !!}

                                    <form action="be_forms_elements_bootstrap.html" method="post" onsubmit="return false;">



                                      <div class="form-group row" >
                                          <label class="col-12" for="example-select">Monto Fijo</label>
                                          <div class="col-lg-12" >
                                              <div class="input-group" >
                                                  <span class="input-group-btn">
                                                      <button type="button" class="btn btn-secondary">
                                                          <i class="fa fa-sort"></i>
                                                      </button>
                                                  </span>
                                                  <input type="number" step = "0.01" class="form-control"   name="fixed_input" value="{{ Auth::user()->fixed_size }}">
                                              </div>
                                          </div>
                                      </div>



                                        <div class="form-group row">
                                            <label class="col-12" for="example-select">Capital de riesgo</label>
                                            <div class="col-lg-12">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-secondary">
                                                            <i class="fa fa-usd"></i>
                                                        </button>
                                                    </span>
                                                    <input type="number" class="form-control" onkeyup="checkCapital()" id="capital" name="capital_to_risk" value = "{{  Auth::user()->capital_to_risk }}">
                                                </div>
                                            </div><br><br>
                                            <pre class="warning" id="error-capital" style="color: red; font-style:italic;">   El valor debe ser mayor a 0  </pre>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12" align="right">
                                                <button type="submit" class="btn btn-alt-primary"  id="sumit">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                   {!! Form::close() !!}
                               </div><br><br>
                                <h6>Recomendación de uso:</h6>
                                <p style="font-size: 12px;">* Utilizar Monto Fijo bajo la siguiente regla: 0.01 de Monto Fijo por cada $600 en la cuenta real (Ejemplo: si tiene $1800 su Monto Fijo es de 0.03)
                                Capital de Riesgo es la cantidad de capital que están dispuestos a arriesgar, una vez la cuenta pierda esa cantidad, el Autotrading se desactiva automáticamente.
                                Nuestra recomendación es solamente usar Monto Fijo como criterio de riesgo</p>
                            </div>
                        </div>
                        <div class="tab-pane " id="account" role="tabpanel">

                        <div class="block">
                       <div class="block-header block-header-default">
                           <h3 class="block-title">Cuenta</h3>
                           <div class="block-options">
                               <button type="button" class="btn-block-option">

                               </button>
                           </div>
                       </div>
                       <div class="block">
            <div class="block-content">
                <form action="/app/autotrading/account" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <label for="example-nf-email">Metatrader 4 Login</label>
                        <input type="text"  value="{{ Auth::user()->mt4_login }}" class="form-control" id="mt4_login" name="mt4_login">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-password">Metatrader 4 Password</label>
                        <input type="password" value="{{ Auth::user()->mt4_password }}" class="form-control" id="mt4_password" name="mt4_password">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">Metatrader 4 Server</label>
                        <input type="text"  value="{{ Auth::user()->mt4_server }}" class="form-control" id="mt4_server" name="mt4_server" autocomplete="off">
                    </div>
                    <br>
                        <div class="form-group" align="right">
                        <button type="submit" class="btn btn-alt-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
                   </div>

                        </div>

                      </div>
                  </div>
              </div>
              <!-- END Block Tabs Alternative Style -->
          </div>
      </div>



      <script src="{{ URL::asset('admin_assets/js/jquery.js') }}"></script>
      <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
      <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
      <script type="text/javascript">

      <?php
          if ($user->mirror_management_type == 1) {
              print " $('#risk-input').hide();";
          } else {
              print "$('#fixed-input').hide();";
          }
          print "var servers =".$servers;

      ?>

       $('#error-follow').hide();
       $('#error-capital').hide();


      function checkValue() {
          const percentage = document.getElementById('follow')

          if ( percentage.value > 100) {
               $('#error-follow').show();
               $('#submit').attr('disabled', true);
          }  else {
              $('#error-follow').hide();
               $('#submit').attr('disabled', false);
          }
      }

      function checkCapital() {
          const capital = document.getElementById('capital')


          if ( capital.value === "0") {
              $('#error-capital').show();
              $('#sumit').attr('disabled', true);
          }  else {
              $('#error-capital').hide();
              $('#sumit').attr('disabled', false);
          }
      }


      function setOption(){
          const option = document.getElementById('money-option')
          if (option.value === "0") {
              $('#risk-input').hide();
              $('#fixed-input').hide();
              return;
          }
          if (option.value === "1") {
              $('#fixed-input').show();
              $('#risk-input').hide();
              return;
          }
          if (option.value === "2") {
              $('#fixed-input').hide();
              $('#risk-input').show();
              return;
          }

      }

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



      @endsection
