<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MultiLevel;
use App\MultilevelLevels;
use App\Transaction;
use Ixudra\Curl\Facades\Curl;
use App\MultiLevelCommissions;
use App\Funciones;

class Niveles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calcular:niveles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calcular los niveles de los integrantes de la red';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
     public function handle()
     {

         $users = MultiLevel::all();
         $activos = 0;

         foreach ($users as $user) {
           if ($user->status=="1") {
           $consumo = 0;
           $hijos = $user->children;
           foreach ($hijos as $hijo) {

             $networkes = MultiLevel::whereBetween('lft', [$hijo->lft, $hijo->rght])->get();
             foreach ($networkes as $network) {
               if ($network->status=="1") {
                 $activos = $activos +1;
               }
               $transacciones = Transaction::where('user_id','=',$network->user_id)->where('status','=','1')->get();
               foreach ($transacciones as $transaccion) {
                 $consumo = $consumo + $transaccion->price;
               }
             }


           }
           if ($activos>="40") {
           $consumo = $consumo * 0.4;
           $nivel = 0;
           $levels = MultilevelLevels::all();
           foreach ($levels as $level) {
             $nivel = 0;
             if ($activos >= $level->active_membres && $consumo>=$level->group_volume) {
               //echo "subio de nivel ".$user->user->name."a ".$level->nombre."<br>";
               $comision = new MultiLevelCommissions();
               $comision->amount = $level->recompensa;
               $comision->amount_btc = Funciones::getCurrentPriceBTC() * $comision->amount;
               $comision->observacion = "pago de comision subio de nivel ".$user->user->name." a ".$level->nombre;
               $comision->multilevel_users_id = $user->user->id;
               if ($comision->amount>0 && $level->id<$user->level) {

                 $comision->save();
                 $user->level = $level->id;
                 $user->save();
               }
             }
           }
           }


           $activos = 0;
           $consumo = 0;
         }
         }

     $this->info('Se calcularon los niveles.');

     }
}
