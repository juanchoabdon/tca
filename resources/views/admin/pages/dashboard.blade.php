@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2>Resumen</h2>
	</div>


<div class="row">



    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-orange panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Estudiantes</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$student_count}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
											<i class="fa fa-user fa-4x" style="margin: 8px;" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-green panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Profesores</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$teacher_count}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-star fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>













</div>

</div>

@endsection
