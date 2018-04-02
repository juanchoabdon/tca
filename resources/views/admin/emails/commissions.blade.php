<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Artis Global Club</title>
</head>
<body>
    <div class="row">
        <div class="col-sm-4">
    <img src="http://artisglobalclub.com/assets3/img/logo-agc.png" alt="" width="200"><br>

    <form action="be_forms_elements_bootstrap.html" method="post" onsubmit="return false;">

    <label class="col-12" for="example-select">Recibo de comision de Artis Global Club</label>
    <label class="col-12" for="example-select">Eres {{!!}} en AGC</label>

    </div>
    <div class="form-group row" >
        <label class="col-12" for="example-select">Comision en BTC</label>
        <div class="col-lg-12" >
            <div class="input-group" >
                <input type="number" class="form-control" readonly   value="{{$user->amount_btc}}">
            </div>
        </div>
    </div>
    <div class="form-group row" >
        <label class="col-12" for="example-select">Comision en USD</label>
        <div class="col-lg-12" >
            <div class="input-group" >
                <input type="number" class="form-control"  readonly  value="{{$user->amount}}">
            </div>
        </div>
    </div>
    <div class="form-group row" >
        <label class="col-12" for="example-select">Precio de BTC al momento de la transaccion</label>
        <div class="col-lg-12" >
            <div class="input-group" >
                <input type="number" class="form-control"  readonly  value="{{ }}">
            </div>
        </div>
    </div>
    <div class="form-group row" >
        <label class="col-12" for="example-select">Hora de la transacción</label>
        <div class="col-lg-12" >
            <div class="input-group" >
                <input type="number" class="form-control"readonly value="{{ }}">
            </div>
        </div>
    </div>
    </form>
    <p>{!!!!}<p>

    </body>
</html>
