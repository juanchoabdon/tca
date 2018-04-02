@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> {{ isset($property->property_name) ? 'Editar: '. $property->property_name : 'Añadir Inmueble' }}</h2>

		<a href="{{ URL::to('admin/properties') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Atrás</a>

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
                {!! Form::open(array('url' => array('admin/properties/addproperty'),'class'=>'form-horizontal padding-15','name'=>'property_form','id'=>'property_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                <input type="hidden" name="id" value="{{ isset($property->id) ? $property->id : null }}">


                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" name="property_name" value="{{ isset($property->property_name) ? $property->property_name : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Url</label>
                    <div class="col-sm-9">
                        <input type="text" name="property_slug" value="{{ isset($property->property_slug) ? $property->property_slug : null }}" class="form-control">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Tipo</label>
                    <div class="col-sm-4">
                        <select name="property_type" id="basic" class="selectpicker show-tick form-control" data-live-search="true">

										@if(isset($property->property_type))

										@foreach($types as $type)
										<option value="{{$type->id}}" @if($property->property_type==$type->id) selected @endif>{{$type->types}}</option>

										@endforeach

										@else

											@foreach($types as $type)
										<option value="{{$type->id}}">{{$type->types}}</option>

										@endforeach

										@endif

						</select>
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Proposito</label>
                    <div class="col-sm-4">
                        <select name="property_purpose" id="basic" class="selectpicker show-tick form-control" data-live-search="true" >
							@if(isset($property->property_purpose))

								<option value="Venta" @if($property->property_purpose=='Venta') selected @endif>Venta</option>
								<option value="Arriendo" @if($property->property_purpose=='Arriendo') selected @endif>Arriendo</option>

							@else

								<option value="Sale">Venta</option>
								<option value="Rent">Renta</option>

							@endif

						</select>
                    </div>
                </div>
								<div class="form-group">
														<label for="" class="col-sm-3 control-label">Estado</label>
														<div class="col-sm-4">
																<select name="state" id="basic" class="selectpicker show-tick form-control" data-live-search="true" >
											@if(isset($property->state))

												<option value="Normal" @if($property->state =='Normal') selected @endif>Normal</option>
												<option value="Vendido" @if($property->state =='Vendido') selected @endif>Vendido</option>
												<option value="Oferta" @if($property->state =='Oferta') selected @endif>Oferta</option>

											@else

												<option value="Normal">Normal</option>
												<option value="Vendido">Vendido</option>
												<option value="Oferta">Oferta</option>

											@endif

										</select>
														</div>
												</div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Habitaciones</label>
                    <div class="col-sm-9">
                        <input type="text" name="bedrooms" value="{{ isset($property->bedrooms) ? $property->bedrooms : null }}" class="form-control" placeholder="4">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Baños</label>
                    <div class="col-sm-9">
                        <input type="text" name="bathrooms" value="{{ isset($property->bathrooms) ? $property->bathrooms : null }}" class="form-control" placeholder="3">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Área</label>
                    <div class="col-sm-9">
                        <input type="text" name="area" value="{{ isset($property->area) ? $property->area : null }}" class="form-control" placeholder="800m2">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Precio de venta</label>
                    <div class="col-sm-9">
                        <input type="text" id="number" name="sale_price" value="{{ isset($property->sale_price) ? $property->sale_price : null }}" class="form-control" placeholder="800000">
                    </div>
                </div>
								<!--<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Precio de renta</label>
                    <div class="col-sm-9">
                        <input type="text" name="rent_price" value="{{ isset($property->rent_price) ? $property->rent_price : null }}" class="form-control" placeholder="10000">
                    </div>
                </div>-->
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Precio en Ladrillos</label>
                    <div class="col-sm-9">
                        <input type="text" name="brick_price" value="{{ isset($property->brick_price) ? $property->brick_price : null }}" class="form-control" placeholder="10000">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Caracteristicas</label>
                    <div class="col-sm-9">
                        <input type="text" name="property_features" value="{{ isset($property->property_features) ? $property->property_features : null }}" data-role="tagsinput tag-primary" class="form-control" placeholder="{{ isset($property->property_features) ? null : 'Balcony,Internet' }}">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Descripción</label>
                    <div class="col-sm-9">

						<textarea name="description" rows="10" class="form-control summernote">{{ isset($property->description) ? $property->description : null }}</textarea>
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Dirección</label>
                    <div class="col-sm-9">

						<textarea name="address" rows="3" class="form-control">{{ isset($property->address) ? $property->address : null }}</textarea>
                    </div>
                </div>
				<div class="form-group">

		                    <label for="usertype" class="col-sm-3 control-label">Ciudad</label>
		                     <div class="col-sm-4">
		                        <select name="city_id" id="basic" class="selectpicker show-tick form-control" data-live-search="true">
										@if(isset($property->city_id))

										@foreach($city_list as $city)
										<option value="{{$city->id}}" @if($property->city_id==$city->id) selected @endif>{{$city->city_name}}</option>

										@endforeach

										@else

											@foreach($city_list as $city)
										<option value="{{$city->id}}">{{$city->city_name}}</option>

										@endforeach

										@endif
								</select>
							</div>

                		</div>

				<div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Imágen</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if(isset($property->featured_image))

									<img src="{{ URL::asset('upload/properties/'.$property->featured_image.'-s.jpg') }}" width="150" alt="person">

								@endif

                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="featured_image" class="filestyle">
                            </div>
                        </div>

                    </div>
                </div>

				<div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Imágen 1</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if(isset($property->property_images1) and $property->property_images1!='')

									<img src="{{ URL::asset('upload/properties/'.$property->property_images1.'-b.jpg') }}" width="150" alt="person">

								@endif

                            </div>
                            <div class="media-body media-middle">
							@if(isset($property->property_images1) and $property->property_images1!='')
							<div class="media-left"><a href="#" class="btn btn-default btn-rounded"><i class="md md-delete"></i></a></div><br />
							@endif

                                <input type="file" name="property_images1" class="filestyle">
                            </div>
                        </div>

                    </div>
                </div>

				<div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Imágen 2</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if(isset($property->property_images2) and $property->property_images2!='')

									<img src="{{ URL::asset('upload/properties/'.$property->property_images2.'-b.jpg') }}" width="150" alt="person">

								@endif

                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="property_images2" class="filestyle">
                            </div>
                        </div>

                    </div>
                </div>

				<div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Imágen 3</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if(isset($property->property_images3) and $property->property_images3!='')

									<img src="{{ URL::asset('upload/properties/'.$property->property_images3.'-b.jpg') }}" width="150" alt="person">

								@endif

                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="property_images3" class="filestyle">
                            </div>
                        </div>

                    </div>
                </div>

				<div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Imágen 4</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if(isset($property->property_images4) and $property->property_images4!='')

									<img src="{{ URL::asset('upload/properties/'.$property->property_images4.'-b.jpg') }}" width="150" alt="person">

								@endif

                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="property_images4" class="filestyle">
                            </div>
                        </div>

                    </div>
                </div>

				<div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Imágen 5</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if(isset($property->property_images5) and $property->property_images5!='')

									<img src="{{ URL::asset('upload/properties/'.$property->property_images5.'-b.jpg') }}" width="150" alt="person">

								@endif

                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="property_images5" class="filestyle">
                            </div>
                        </div>

                    </div>
                </div>




                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">{{ isset($property->property_name) ? 'Editar inmueble' : 'Añadir inmueble' }}</button>

                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>


</div>

@endsection
