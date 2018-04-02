<?php

namespace App\Console\Commands;
use App\Transaction;
use App\MultiLevel;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Console\Command;
use App\MultiLevelCommissions;
use App\Funciones;

class CheckTransactions extends Command
{

    protected $signature = 'check:transactions';
    protected $description = 'Verifica las transacciones y ademas ingresa las comisiones.';


    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
    dd("!");


          function parsear($data,$nivel,$transaccion) {
            $parents = $data->parent()->get();
            foreach ($parents as $parent) {
              $temp = [];
              $SinNivel = Funciones::getChildrensUser($parent);
              if ($SinNivel) {
              if ($parent->status=="1") {
                dd($data);

                $comision = new MultiLevelCommissions();
                $comision->multinivel_transaction_id = $transaccion->id;
                if ($nivel=="0") {
                  $comision->multilevel_users_id = $parent->user_id;
                  $comision->observacion = "pago de comision agc ,primer nivel";
                  $comision->amount = 35;
                }
                if ($nivel=="1") {
                  $comision->multilevel_users_id = $parent->user_id;
                  $comision->amount = 15;
                  $comision->observacion = "pago de comision agc , segundo nivel";
                }
                if ($nivel=="2") {
                  $comision->multilevel_users_id = $parent->user_id;
                  $comision->amount = 10;
                  $comision->observacion = "pago de comision agc , tercer nivel";
                }
                if ($nivel<=2) {
                  $comision->amount_btc = Funciones::getCurrentPriceBTC() * $comision->amount;
                  $comision->save();
                }


              }
              }
              $nivel++;



            } //end foreach



            if (count($data->parent()->get())) {
              $data->parent = parsear($data->parent,$nivel,$transaccion);
            }else{
              //unset($data->parent);
            }
            $temp[] = $data;

            return $temp;

          }



          $diaAnterior = $dt_Ayer= date('Y-m-d H:i:s', strtotime('-2 day')) ; // resta 2 día
          $transacciones = Transaction::where('type','=','5')->where('status','=',"0")->where('date','<=',$diaAnterior)->get();
          foreach ($transacciones as $transaccion) {
          $transaccion->observacion = "Transaccion expirada";
          $transaccion->status="2";
          $transaccion->save();
          }




        $transacciones = Transaction::where('type','=','5')->where('status','=',"0")->where('date','>=',$diaAnterior)->get();
        $transacciones = Transaction::all();

        foreach ($transacciones as $transaccion) {

          $user = MultiLevel::where('user_id','=',$transaccion->user_id)->first();

          if ($user) {

            $url = "https://blockchain.info/es/rawaddr/".$transaccion->address;
            $response = Curl::to($url)->returnResponseObject()->get();

            if ($response->status=='200') {

              $response = json_decode($response->content);
              if ($response->final_balance>0) {
                //la api nos devuelve los btc en satoshis que 1 BTC = 100.000.000
                $satoshis = $response->final_balance;
                $btc = 100000000; //1 BTC = 100.000.000 de satoshis
                $btc = $satoshis/$btc;

                if ($transaccion->amount_in_btc==$btc || $transaccion->amount_in_btc>$btc ) {
                  $transaccion->verificaciones = $transaccion->verificaciones +1;
                  $transaccion->status="1";


                  $user = MultiLevel::where('user_id','=',$transaccion->user_id)->first();

                  $user->status="1";

                  MultiLevelCommissions::where('multinivel_transaction_id','=',$transaccion->id)->delete();
                  $nivel = 0;
                  $transaccion->observacion ="Transaccion completa";
                  $parents = parsear($user,$nivel,$transaccion);
                  unset($user->parent);
                  $user->save();
                  $transaccion->save();
                }else{
                  if ($response->final_balance==0) {
                    $transaccion->verificaciones = $transaccion->verificaciones +1;
                    $transaccion->save();
                  }else{
                    $transaccion->verificaciones = $transaccion->verificaciones +1;
                    $restante =  $transaccion->amount_in_btc - $btc;
                    $transaccion->observacion ="Transaccion incompleta, hace falta ".$restante." BTC";
                    $transaccion->save();
                  }
                }
              }else{
                $transaccion->verificaciones = $transaccion->verificaciones +1;
                $transaccion->save();
              }

            }else{

            }
          }

        }




      $this->info('Termine de validar las transacciones');
    }
}
