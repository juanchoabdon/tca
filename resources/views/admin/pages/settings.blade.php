@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2>Informacion</h2>
		<a href="{{ URL::to('admin/dashboard') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Atras</a>

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
            <a href="#account" aria-controls="account" role="tab" data-toggle="tab">General</a>
        </li>
        <li role="presentation">
            <a href="#social_links" aria-controls="social_links" role="tab" data-toggle="tab">Redes Sociales</a>
        </li>

        <li role="presentation">
            <a href="#about_us" aria-controls="about_us" role="tab" data-toggle="tab">Nosotros</a>
        </li>
        <li role="presentation">
            <a href="#terms_conditions" aria-controls="terms_conditions" role="tab" data-toggle="tab">Terminos</a>
        </li>
        <li role="presentation">
            <a href="#privacy_policy" aria-controls="privacy_policy" role="tab" data-toggle="tab">Politica de privacidad</a>
        </li>

        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content tab-content-default">
        <div role="tabpanel" class="tab-pane active" id="account">
            {!! Form::open(array('url' => 'admin/settings','class'=>'form-horizontal padding-15','name'=>'account_form','id'=>'account_form','role'=>'form','enctype' => 'multipart/form-data')) !!}


                <div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Logo</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if($settings->site_logo)

									<img src="{{ URL::asset('upload/'.$settings->site_logo) }}" width="150" alt="person">
								@endif

                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="site_logo" class="filestyle">
                                <small class="text-muted bold">200x75px</small>
                            </div>
                        </div>

                    </div>
                </div>
				<div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Favicon</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if($settings->site_favicon)

									<img src="{{ URL::asset('upload/'.$settings->site_favicon) }}" width="50" alt="person">
								@endif

                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="site_favicon" class="filestyle">
                                <small class="text-muted bold">16x16px</small>
                            </div>
                        </div>

                    </div>
                </div>
								<div class="form-group">
										<label for="" class="col-sm-3 control-label">Frase de motivación</label>
										<div class="col-sm-9">
												<input type="text" name="site_motivation" value="{{ $settings->site_motivation }}" class="form-control" value="">
										</div>
								</div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" name="site_email" value="{{ $settings->site_email }}" class="form-control" value="">
                    </div>
                </div>
								<div class="form-group">
										<label for="" class="col-sm-3 control-label">Telefonos</label>
										<div class="col-sm-9">
												<input type="text" name="site_phone" value="{{ $settings->site_phone }}" class="form-control" value="">
										</div>
								</div>
								<div class="form-group">
										<label for="" class="col-sm-3 control-label">Dirección</label>
										<div class="col-sm-9">
												<input type="text" name="site_address" value="{{ $settings->site_address }}" class="form-control" value="">
										</div>
								</div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Descripcion</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="site_description" class="form-control" rows="5" placeholder="A few words about site">{{ $settings->site_description }}</textarea>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">Guardar <i class="md md-lock-open"></i></button>

                    </div>
                </div>

            {!! Form::close() !!}
        </div>

        <div role="tabpanel" class="tab-pane" id="social_links">

            {!! Form::open(array('url' => 'admin/social_links','class'=>'form-horizontal padding-15','name'=>'social_links_form','id'=>'social_links_form','role'=>'form')) !!}


                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Facebook URL</label>

                    <div class="col-sm-9">
                        <input type="text" name="social_facebook" value="{{ $settings->social_facebook }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Twitter URL</label>

                    <div class="col-sm-9">
                        <input type="text" name="social_twitter" value="{{ $settings->social_twitter }}" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Linkedin URL</label>

                    <div class="col-sm-9">
                        <input type="text" name="social_linkedin" value="{{ $settings->social_linkedin }}" class="form-control" value="">
                    </div>
                </div>


                <hr>
                 <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">Guardar <i class="md md-lock-open"></i></button>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>



        <div role="tabpanel" class="tab-pane" id="about_us">

            {!! Form::open(array('url' => 'admin/about_us','class'=>'form-horizontal padding-15','name'=>'pass_form','id'=>'pass_form','role'=>'form')) !!}


                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Titulo</label>

                    <div class="col-sm-9">
                        <input type="text" name="about_us_title" value="{{ $settings->about_us_title }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Descripcion</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="about_us_description" class="form-control summernote" rows="5">{{ $settings->about_us_description }}</textarea>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">Guardar <i class="md md-lock-open"></i></button>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>

        <div role="tabpanel" class="tab-pane" id="careers_with_us">

            {!! Form::open(array('url' => 'admin/careers_with_us','class'=>'form-horizontal padding-15','name'=>'careers_with_us_form','id'=>'careers_with_us_form','role'=>'form')) !!}


                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Titulo</label>

                    <div class="col-sm-9">
                        <input type="text" name="careers_with_us_title" value="{{ $settings->careers_with_us_title }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Descripcion</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="careers_with_us_description" class="form-control summernote" rows="5">{{ $settings->careers_with_us_description }}</textarea>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">Guardar<i class="md md-lock-open"></i></button>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>


        <div role="tabpanel" class="tab-pane" id="terms_conditions">

            {!! Form::open(array('url' => 'admin/terms_conditions','class'=>'form-horizontal padding-15','name'=>'terms_conditions_form','id'=>'terms_conditions_form','role'=>'form')) !!}


                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Titulo</label>

                    <div class="col-sm-9">
                        <input type="text" name="terms_conditions_title" value="{{ $settings->terms_conditions_title }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Descripcion</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="terms_conditions_description" class="form-control summernote" rows="5">{{ $settings->terms_conditions_description }}</textarea>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">Guardar <i class="md md-lock-open"></i></button>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>


        <div role="tabpanel" class="tab-pane" id="privacy_policy">

            {!! Form::open(array('url' => 'admin/privacy_policy','class'=>'form-horizontal padding-15','name'=>'privacy_policy_form','id'=>'privacy_policy_form','role'=>'form')) !!}


                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Titulo</label>

                    <div class="col-sm-9">
                        <input type="text" name="privacy_policy_title" value="{{ $settings->privacy_policy_title }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Descripcion</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="privacy_policy_description" class="form-control summernote" rows="5">{{ $settings->privacy_policy_description }}</textarea>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">Guardar <i class="md md-lock-open"></i></button>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
        <div role="tabpanel" class="tab-pane" id="other_Settings">

            {!! Form::open(array('url' => 'admin/headfootupdate','class'=>'form-horizontal padding-15','name'=>'pass_form','id'=>'pass_form','role'=>'form')) !!}


                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Header Code</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="site_header_code" class="form-control" rows="5" placeholder="You may want to add some html/css/js code to header. ">{{ $settings->site_header_code }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Footer Code</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="site_footer_code" class="form-control" rows="5" placeholder="You may want to add some html/css/js code to footer. ">{{ $settings->site_footer_code }}</textarea>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">Save Changes <i class="md md-lock-open"></i></button>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>

    </div>
</div>
</div>

@endsection
