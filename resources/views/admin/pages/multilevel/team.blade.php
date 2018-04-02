@extends("admin.admin_app")

@section("content")

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/treant-js/1.0/Treant.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/treant-js/1.0/Treant.css">


<div id="main">
	<div class="page-header">

		<div class="pull-right">


		</div>
		<h2>Equipo de {{$parent->name}}</h2>
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
      <div class="chart" id="tree-simple">
    	</div>

    	<script>

      var data = <?php echo $tree; ?>;

	  console.log(data)
      data = data[0];
      simple_chart_config = {
          chart: {
              container: "#tree-simple",
              connectors: {
                type: 'step'
            },
			animateOnInit: true,

			node: {
				collapsable: true
			},
			animation: {
				nodeAnimation: "easeOutBounce",
				nodeSpeed: 700,
				connectorsAnimation: "bounce",
				connectorsSpeed: 700
			}
          },

          nodeStructure: data
      };


    		new Treant( simple_chart_config );
    	</script>

    </div>
    <div class="clearfix"></div>
</div>

</div>





@endsection
