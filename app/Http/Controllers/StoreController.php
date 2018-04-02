<?php

namespace App\Http\Controllers;

use App\User;
use Payu;
use Auth;
use App\Transaction;
use App\Subscription;
use App\Training;
use App\Estrategias;
use App\Señales;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{


    public function view_all()
    {

        return view('pages.store');
    }

    public function buy(Request $request){

      if(Auth::user()){

        $user = Auth::user();

        $transaccion = new Transaction;

        if ($request->type == 1) { //es una suscripcion
            $producto = Subscription::find($request->product_id);
            $transaccion->price = $producto->cost;
            $transaccion->titulo = $producto->name;

        }
        if ($request->type == 2) { //es una suscripcion
            $producto = Training::find($request->product_id);
            $transaccion->price = $producto->price;
            $transaccion->titulo = $producto->title;
        }
        if ($request->type == 3) { //es una suscripcion
            $producto = Estrategias::find($request->product_id);
            $transaccion->price = $producto->precio;
            $transaccion->titulo = $producto->titulo;
        }
        if ($request->type == 4) { //es una suscripcion
            $producto = Señales::find($request->product_id);
            $transaccion->price = $producto->precio;
            $transaccion->titulo = $producto->titulo;
        }


      $transaccion->user_id = Auth::user()->id;
      $transaccion->status = 0;
      $transaccion->type = $request->type;
      $transaccion->product_id = $producto->id;

      $transaccion->save();





      $referenceCode = $transaccion->id;
      //$referenceCode = "TestPayU";
      $apiKey = '0f2NdkgyJUUJA517trxn5bLal9';
      //$apiKey = '4Vj8eK4rloUd272L48hsrarnUA';

      $merchantId = 661766;
      //$merchantId = 508029; // pruebas sandbox

      $accountId = 664331;
      //$accountId = 512321;

      $amount = str_replace(".", "", $transaccion->price);
      $amount = str_replace("'", "", $transaccion->price);

      //$amount = 3;

      $currency = "COP";
      //$currency =  "USD";

      $buyerEmail = Auth::user()->email;
      $signature = md5($apiKey."~".$merchantId."~".$referenceCode."~".$amount.'~'.$currency);
      $produccion = "https://gateway.payulatam.com/ppp-web-gateway/";
      $desarrollo = "https://sandbox.gateway.payulatam.com/ppp-web-gateway";


      echo '<form action="'.$produccion.'" method="POST" id="payForm" name="payForm">
        <input type="hidden" name="merchantId" value="'.$merchantId.'">
        <input type="hidden" name="accountId" value="'.$accountId.'">
        <input type="hidden" name="description" value=" Trading Club Academy - '.$transaccion->titulo.'">
        <input type="hidden" name="referenceCode" value="'.$referenceCode.'">
        <input type="hidden" name="amount" value="'.$amount.'">
        <input type="hidden" name="tax" value="0">
        <input type="hidden" name="taxReturnBase" value="0">
        <input type="hidden" name="shipmentValue" value="0">
        <input type="hidden" name="currency" value="COP">
        <input type="hidden" name="lng" value="es">
        <input type="hidden" name="test" value="0">
        <input type="hidden" name="buyerEmail" value="'.$buyerEmail.'">
        <input type="hidden" name="sourceUrl" value="http://mircolombia.com/store/verificar">
        <input type="hidden" name="buttonType" value="SIMPLE">
        <input type="hidden" name="signature" value="'.$signature.'">
        <input style="display:none;" type="image" border="0" id="formButton" src="http://www.payulatam.com/img-secure-2015/boton_pagar_pequeno.png" onclick="this.form.urlOrigen.value = window.location.href;">
      </form>';

      echo '<script language="javascript">
        document.getElementById("formButton").click();
    </script>';

      }else{
        dd("necesita login");
      }


    }



}
