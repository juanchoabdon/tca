@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
  		<h2>Editar Capitulo</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				     </div>
	@endif

<div class="panel panel-default panel-shadow">
	<form  action="/admin/podcast/add" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{$id}}">
		 {{ csrf_field() }}
	    <div class="panel-body">


	    <label>Titulo</label>
	    <input type="text" name="title" class="form-control" value="{{$chapter->title}}"  required>
	    <br>
			<label>Descripcion</label>
		 <textarea class="form-control summernote" name="description" rows="5">{{$chapter->description}}</textarea>
		 <br>
		 Audio
		 <input type="file" name="video" >
			<div class="row">
			<div class="col-md-6 col-md-offset-3">
			<center>
				<br>
			<div align="center" style="margin-bottom: 10%">
					<audio controls style="width: 100%" >
						  <source src="{{$chapter->audio_url}}" type="audio/mpeg">
					</audio>
			</div>


		</center>

			<center><input type="submit" class="btn btn-primary"> </center>
	    </div>
		</form>
    <div class="clearfix"></div>
</div>

</div>





@endsection
