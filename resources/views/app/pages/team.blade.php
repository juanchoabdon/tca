@extends("app.admin_app")

@section("content")

  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/treant-js/1.0/Treant.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/treant-js/1.0/Treant.css">
  <div class="content">
      <h2 class="content-heading">Tu Equipo</h2>

      <div class="chart" id="tree-simple"></div>


        <script type="text/javascript">
            var data = <?php echo $tree; ?>;
            data = data[0];
            simple_chart_config = {
                chart: {
                    container: "#tree-simple",
                    connectors: {
                      type: 'step'
                  },
                },

                nodeStructure: data
            };


            new Treant( simple_chart_config );
        </script>
  </div>


@endsection
