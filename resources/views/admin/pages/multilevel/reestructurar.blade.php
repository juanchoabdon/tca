@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		<div class="pull-right">
			<a href="{{URL::to('admin/multilevel/download/commissions')}}" class="btn btn-primary">Descargar Comisiones &nbsp;<i class="fa fa-download" aria-hidden="true"></i></a>
		</div>
		<h2>Reestructurando </h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
    <div class="panel-body">
      <form  action="/admin/multinivel/reestructurar/{{$user->id}}" method="post">
        {{ csrf_field() }}

      <div class="col-md-8 col-md-offset-2">
      <h3>Nuevo Lider de <b>{{$user->user->name}}</b></h3><br>
      <select class="form-control select2" name="parent">
        @foreach($parents as $parent)
        <option value="{{$parent->id}}">{{$parent->user->name}}</option>
        @endforeach
      </select>
      <br>
      <br>
      <center><input type="submit" class="btn btn-primary"></center>
    </div>
    </form>




    </div>

    <div class="clearfix"></div>
</div>

</div>



@endsection
