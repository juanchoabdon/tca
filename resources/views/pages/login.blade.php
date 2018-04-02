@extends("app")

@section('head_title', 'Login | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")

<div id="page-container" class="main-content-boxed">
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-gd-primary">
            <div class="hero-static content content-full bg-white invisible" data-toggle="appear">
                <!-- Header -->
                <div class="py-30 px-5 text-center">
                    <a class="link-effect font-w700" href="/">
                      <h4>TCA</h4>  
                    </a>
                </div>
                <!-- END Header -->

                @if(Session::has('flash_message'))
                <div style="margin-bottom:5%;" class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span  aria-hidden="true">&times;</span></button>
                {{ Session::get('flash_message') }}
                </div>
                @endif
                <div class="message">
            <!--{!! Html::ul($errors->all(), array('class'=>'alert alert-danger errors')) !!}-->
                        @if (count($errors) > 0)
          <div style="margin-bottom:5%;" class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
                      @foreach ($errors->all() as $error)
                        {{ $error }}
                      @endforeach
              </div>
          @endif
                <!-- Sign In Form -->
                <div class="row justify-content-center px-5">
                    <div class="col-sm-8 col-md-6 col-lg-4">
                        <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.js) -->
                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-signin" action="login" method="POST">
                            <div class="form-group row">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        <input type="email" id="inputEmail" name="email"  class="form-control" required autofocus>
                                        <label for="inputEmail">Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        <input  type="password" id="inputPassword" name="password" class="form-control" required autofocus>
                                        <label for="inputPassword">Contraseña</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row gutters-tiny">
                                <div class="col-12 mb-10">
                                    <button style="cursor: pointer" type="submit" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-warning">
                                        <i class="si si-login mr-10"></i> Ingresar
                                    </button>
                                </div>
                                <div class="col-sm-12 mb-12">
                                    <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" href="/admin/password/email">
                                        <i class="fa fa-warning text-muted mr-5"></i> Recordar
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Sign In Form -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>





@endsection
