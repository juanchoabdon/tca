<?php

namespace App;
use Ixudra\Curl\Facades\Curl;
use App\MultiLevelCommissions;


class Funciones
{
  private static $app_id = "8486d0accc5d4d09";
  private static $app_secret = "5f0f05f4b2f34559b18499ed255a9243";
  private static $redirect_uri = "https://www.artisglobalclub.com/";
  public static $id = "15113593"; // debe ser el wallet de btc



  public static function getToken(){
    $baerer =  base64_encode(Funciones::$app_id . ":". Funciones::$app_secret);

    $response = Curl::to('https://v2.api.xapo.com/oauth2/token')
          ->withContentType('application/x-www-form-urlencoded')
          ->withHeader('Authorization: Basic '.$baerer)
          ->withData( array( 'grant_type' => 'client_credentials','redirect_uri' => Funciones::$redirect_uri ) )
          ->post();

    return $response;
  }
  public static function getWallet(){
    $url = "https://v2.api.xapo.com/accounts/".Funciones::$id."/deposit_addresses";
    $token = json_decode(Funciones::getToken())->access_token;
    $response = Curl::to($url)
          ->withContentType('application/x-www-form-urlencoded')
          ->withHeader('Authorization: Bearer '.$token)->post();
          $response = json_decode($response)->address;
    return $response;

  }

  public static function getCurrentPriceBTC(){
    $response = Curl::to('http://api.coindesk.com/v1/bpi/currentprice.json')->returnResponseObject()->get();
    if ($response->status=='200') {
      $currentPriceBTC = json_decode($response->content)->bpi->USD->rate;
      $currentPriceBTC = floatval(preg_replace('/[^\d.]/', '', $currentPriceBTC));
      $dolar = 1/$currentPriceBTC;
      $dolar = round($dolar, 6);
      return $dolar;
    }else{
      dd("no se puede obtener el precio del btc hoy.");
    }
  }

  public static function getCurrentPriceBTCWithoutRound(){
    $response = Curl::to('http://api.coindesk.com/v1/bpi/currentprice.json')->returnResponseObject()->get();
    if ($response->status=='200') {
      $currentPriceBTC = json_decode($response->content)->bpi->USD->rate;
      $currentPriceBTC = floatval(preg_replace('/[^\d.]/', '', $currentPriceBTC));
      $dolar = 1/$currentPriceBTC;
      return $dolar;
    }else{
      dd("no se puede obtener el precio del btc hoy.");
    }
  }

  public static function getChildrensUser($parent){
      $i=0;

      $children = MultiLevel::where('lft','>',$parent->lft)->where('lft','<',$parent->rght)->get();
      foreach ($children as $chd) {
        if ($chd->depth > $parent->depth+2) { // nivel 3
          if ($chd->status>0) { //valido que haya pagado.
            $i++;
            if ($i>'27') {
              $countComisiones = MultiLevelCommissions::where('multilevel_users_id','=',$parent->user_id)->count();
              if ($countComisiones<=27) {
                return true; //run.
              }
              if ($parent->status_level=="0") {
                $parent->status_level="1";
                $parent->save();
              }
              return false; //stop comissions.
            }
          }
        }

      }


      return true; //run.


  }


}
