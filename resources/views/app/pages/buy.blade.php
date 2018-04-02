@extends("app.admin_app")

@section("content")


<div class="content">
  <h2 class="content-heading">
    Pagar membresía
  </h2>
  <div class="row">
    <div class="col-lg-12">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        @foreach ($errors->all() as $error)
        <span>{{ $error }}</span>
        @endforeach
      </div>
      @endif
      @if(Session::has('flash_message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        {{ Session::get('flash_message') }}
      </div>
      @endif
    </div>
    <div class="col-lg-12">
      <div class="block">
        <div class="block-content tab-content">



              <!-- <div class="pull-right"><b><h2 style="color:green;">Transacción en progreso</h2></b></div> -->
          <div id="pay">


              <div class="text-center">
                      <h2><small>Escanea el código o copia la dirección para realizar el pago</small></h2>
              </div>



              <div style="display: flex; justify-content: space-around">


                      <div >



                        <br><br><br><br>

                        <div class="text-center">
                          <h3 style="color: #1F4156">{{$wallet}}</h3>

                                <p style="font-size: 18px">
                                  {{$cost_btc}} BTC a transferir
                                </p>

                                <div class="container timer">
                                  <div id="pm">
                                    <input type="button" id="plus" value="&#xf0de;">
                                    <input type="button" id="minus" value="&#xf0dd;">
                                  </div>
                                  <p id="result">120</p>
                                  <p id="sec">sec</p>
                                  <canvas id="progress" width="200" height="200"></canvas><!-- progress bar -->
                                </div>





                        </div>


                        <p></p>
                        <!-- <center><h7 style = "color: green;">Si al escanear el código QR el monto no corresponde, realiza el pago ingresando la dirección a mano</h7></center><br><br><br>
                        <center><h6>* Debido a las confirmaciones de blockchain la validación de tu suscripción se puede demorar hasta un día</h6></center> -->

                      </div>

                      <div>

                        <div >
                          <img src="https://chart.googleapis.com/chart?chs=350x350&cht=qr&chl=bitcoin:{{$wallet}}?amount={{$cost_btc}}" class="img-responsive" alt="">
                          <!-- <h1><small>o copia la siguiente direccion</small> {{$wallet}}</h1> -->
                        </div>



                      </div>
                    </div>

  </div>




  <div id="retry">
      <div class="text-center">
            <h3>  <small>  Si pagaste tu membresía, debido a las confirmaciones de blockchain la activación de esta puede demorar hasta un día </small>   </h3>

            <br>
            <br>


            <a href="#"  onclick="location.reload()"  class=" btn btn-alt-primary" > Reintentar pago </a>

            <br>
            <br>
      </div>
  </div>

</div>


</div>
<!-- <p id="pay-claim">* Debido a las confirmaciones de blockchain la validación de tu suscripción se puede demorar hasta un día</p> -->
      <script src="{{ URL::asset('assets3/js/core/jquery.min.js')}}"></script>
<script type="text/javascript">


    // $('#retry').hide();


    $('#retry').hide();

    setInterval( function() {
            $('#pay').hide();
            $('#retry').show();
    }, 120000 )

</script>


                                <style media="screen">
                                @import url(https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);

/* Roboto Condensed */
                                  @import url(https://fonts.googleapis.com/css?family=Roboto+Condensed:700);

                                  .container {
                                    position: relative;
                                    margin: 0 auto;
                                    width: 200px;
                                    height: 200px;
                                    border-radius: 50%;
                                    background: #fff;
                                    font-family: 'Roboto', sans-serif;
                                    text-align: center;
                                  }

                                  #progress {
                                    position: absolute;
                                    top: 0;
                                    left: 0;
                                    transition: all 1s ease-in-out;
                                  }

                                  .timer p {
                                    margin: 0;
                                    color:  #1F4156;
                                    font-weight: 700;
                                  }

                                  #result {
                                    padding: 60px 0 0;
                                    font-size: 40px;
                                    line-height: 60px;
                                  }

                                  #sec {
                                    font-size: 15px;
                                    margin-top: -10px;
                                  }

                                  #start, #stop {
                                    position: relative;
                                    width: 100px;
                                    height: 40px;
                                    outline: 0;
                                    border: 0;
                                    border-radius: 4px;
                                    color: #fff;
                                    cursor: pointer;
                                    font-weight: 700;
                                  }

                                  #start {
                                    background: #4897F0;
                                  }

                                  #start:hover {
                                    background: #4087d8;
                                  }

                                  #stop {
                                    background: #00CE9B;
                                  }

                                  #stop:hover {
                                    background: #00b98b;
                                  }

                                  #start:active, #stop:active {
                                    top: 1px;
                                  }

                                  #plus {
                                    width: 100%;
                                    padding: 0;
                                    outline: 0;
                                    border: 0;
                                    color: #aaa;
                                    background: transparent;
                                    cursor: pointer;
                                    font-size: 20px;
                                    font-family: FontAwesome, sans-serif;
                                  }

                                  #minus {
                                    width: 100%;
                                    padding: 0;
                                    outline: 0;
                                    border: 0;
                                    color: #aaa;
                                    background: transparent;
                                    cursor: pointer;
                                    font-size: 20px;
                                    font-family: FontAwesome, sans-serif;

                                  }

                                  #pm {
                                    position: absolute;
                                    top: 70px;
                                    left: 20px;
                                    opacity: .1;
                                    z-index: 9999;
                                  }

                                  .container:hover > #pm {
                                    opacity: 1;
                                  }

                                  .buttons {
                                    width: 300px;
                                    margin: 20px auto;
                                    text-align: center;
                                  }
                                </style>



                            <script type="text/javascript">




                            var timer, stopTimer,
                            result = document.getElementById('result'),
                            sec    = document.getElementById('sec'),
                            start  = document.getElementById('start'),
                            stop   = document.getElementById('stop'),
                            plus   = document.getElementById('plus'),
                            minus  = document.getElementById('minus'),
                            n      = +result.innerHTML;

                            // events
                            startTimer(n);


                            start.addEventListener('click', function() {
                            startTimer(n);
                            }, false);

                            stop.addEventListener('click', function() {
                            stopTimer();
                            }, false);

                            plus.addEventListener('click', function() {
                            result.innerHTML = ++n;
                            }, false);

                            minus.addEventListener('click', function() {
                            result.innerHTML = --n;
                            }, false);

                            // functions
                            function startTimer(n) {
                            var i = n-1; // fix 1 sec start delay
                            document.getElementById('pm').style.display = 'none'; // hide arrows

                            timer = setInterval( function() {
                              result.innerHTML = i--;

                               stopTimer = function() {
                                 clearInterval(timer);
                                 result.innerHTML = i + 1;
                               }

                               if (i < 5) {
                                result.style.color = '#ED3E42';
                                sec.style.color = ' #1F4156';
                              } // hurry up!

                              if (i < 0) { stopTimer(); } // finish

                              function updateProgress() {
                                var canvas = document.getElementById('progress');
                                var context = canvas.getContext('2d');
                                var centerX = canvas.width / 2;
                                var centerY = canvas.height / 2;
                                var radius = 50;
                                var circ = Math.PI * 2; // 360deg
                                var percent = i / n; // i%
                                context.beginPath();
                                context.arc(centerX, centerY, radius, ((circ) * percent), circ, false);
                                context.lineWidth = 10;
                                if (i < 5) {
                                  context.strokeStyle = '#1F41566';
                                } else {
                                  context.strokeStyle = ' #1F4156';
                                }
                                context.stroke();
                              } // progress

                              updateProgress();

                            }, 1000); // every sec

                            }
                            </script>






@endsection
