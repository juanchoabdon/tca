@extends("app")

@section('head_title', 'Registrar | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")


<div id="page-container" class="main-content-boxed">
    <main id="main-container">
        <div  style="background: #0c2136!important;">
            <div class="hero-static content content-full bg-white invisible" data-toggle="appear">
                <div class="py-30 px-5 text-center">
                    <a class="link-effect font-w700" href="/">
                        <img  width="200" src="{{ URL::asset('assets3/img/logo-agc.png ')}}" alt="">
                    </a>
                    <h1 class="h2 font-w400 mt-50 mb-0 text-muted">{{$padre->name}}  te ha invitado a ser parte de la comunidad AGC</h1>
                </div>
                @if(Session::has('flash_message'))
                      <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
                          {{ Session::get('flash_message') }}
                      </div>
                  @endif
                  <div class="message">
                    <!--{!! Html::ul($errors->all(), array('class'=>'alert alert-danger errors')) !!}-->
               @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>

                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach

                  </div>
                @endif

                <div class="row justify-content-center px-5">
                    <div class="col-sm-8 col-md-6 col-lg-4">
                        <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.js) -->
                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                              {!! Form::open(array('url' => 'register','method'=>'post','class'=>'','id'=>'registerform','role'=>'form')) !!}
                              <div class="form-group row">
                                  <div class="col-12">
                                      <div class="form-material floating">
                                        <input type="hidden" name="padre" value="{{$padre->id}}">
                                        <input type="hidden" name="hijo" value="{{$hijo->id}}">

                                            <input type="number" class="form-control" name="id" id="id" required>
                                            <label for="id">Cedula</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-12">
                                      <div class="form-material floating">

                                        <input type="email" class="form-control" name="email" id="email" required>
                                            <label for="email">Email</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-12">
                                      <div class="form-material floating">
                                          <input type="password" name="password" class="form-control" id="password" name="signup-password" required>
                                          <label for="password">Contraseña</label>
                                      </div>
                                  </div>
                              </div>


                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">

                                      <input type="text" class="form-control" name="name" id="name" required>
                                        <label for="name">Nombres y apellidos</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">
                                      <input type="number" class="form-control" name="phone" id="phone" required>
                                      <label for="phone">Número Celular</label>
                                    </div>
                                </div>
                            </div>
                        <!-- <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">
                                      <input type="text" class="form-control" name="city" id="city" required>
                                          <label for="city">Ciudad</label>
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group row text-center">
                                <div class="col-12">
                                    <label class="css-control css-control-primary css-checkbox">
                                        <input type="checkbox" class="css-control-input" id="signup-terms" name="signup-terms" required>
                                        <span class="css-control-indicator"></span>
                                        Acepto los terminos y condiciones
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row gutters-tiny">
                                <div class="col-12 mb-10">
                                    <button type="submit" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-info">
                                        <i class="si si-user-follow mr-10"></i> Registrarme
                                    </button>
                                </div>
                                <div class="col-12">
                                    <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" target="_blank" href="/upload/terms.pdf">
                                        <i class="si si-book-open text-muted mr-10"></i> Terminos
                                    </a>
                                </div>

                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- END Sign Up Form -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>










@endsection
