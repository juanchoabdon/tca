@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
  		<h2>Añadir Suscripcion</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
	<form  action="/admin/subscription/update/{{$subscription->id}}" method="post" enctype="multipart/form-data">
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<br>
	    <label>Titulo</label>
	    <input type="text" name="name" class="form-control"  value="{{$subscription->name}}" required>
	    <br>

	    <label>Descripcion</label>
	    <textarea class="form-control summernote" name="description" rows="5">{{$subscription->description}}</textarea>
			<br>
			<label>Precio</label>
			<input type="text" id="number" name="cost" class="form-control" value="{{$subscription->cost}}" required>
		  <br>
			<h4>Entrenamientos</h4>

			@foreach($trainings as $training)
			<input type="checkbox"  name="trainings[]"

      @foreach($features as $feature)

        @if($feature->training_id == $training->id && $feature->type == "training" && $feature->suscriptions_id == $id)
        {{"checked"}}
        @endif
      @endforeach



      value="{{$training->id}}"> {{$training->title}}<br>
			@endforeach

			<br>

			<h4>Entrenamientos blandos</h4>

			@foreach($softTrainings as $training)
			<input type="checkbox"  name="softskills[]"

      @foreach($features as $feature)

        @if($feature->training_id == $training->id && $feature->type == "softskills" && $feature->suscriptions_id == $id)
        {{"checked"}}
        @endif
      @endforeach



      value="{{$training->id}}"> {{$training->title}}<br>
			@endforeach

			<br>

			<h4>Estrategias</h4>


			@foreach($estrategias as $estrategia)

			<input type="checkbox"  name="estrategias[]"

      @foreach($features as $feature)

        @if($feature->training_id == $estrategia->id && $feature->type=="estrategia" && $feature->suscriptions_id == $id)
        {{"checked"}}
        @endif
      @endforeach



      value="{{$estrategia->id}}"> {{$estrategia->titulo}}<br>
			@endforeach

						<br>
						<h4>Señales</h4>


						@foreach($señales as $señal)

						<input type="checkbox"  name="senales[]"

			        @foreach($features as $feature)

			        @if($feature->training_id == $señal->id && $feature->type=="senal" && $feature->suscriptions_id == $id)
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




			<center><input type="submit" class="btn btn-primary"> </center>
	    </div>
		</form>
    <div class="clearfix"></div>
</div>

</div>





@endsection
