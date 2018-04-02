<?php

namespace App\Http\Controllers\Admin;


use App\MultiLevel;
use App\MultiLevelDeleted;
use App\User;
use App\Funciones;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Excel;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\MultilevelLevels;
use App\Transaction;
use Ixudra\Curl\Facades\Curl;
use App\MultiLevelCommissions;


class MultiLevelController extends MainAdminController
{

  public function index()
  {

    $networkers = MultiLevel::all();
    return view('admin.pages.multilevel.multilevel',compact('networkers'));

  }



  public function pay(){

//      $user_commission = MultiLevelCommissions::all();
//      $user = User::where("id","=",$user_commission[23]->multilevel_users_id)->first();
// //dd($user);
//      $dolar = Funciones::getCurrentPriceBTCWithoutRound();
//      $value = round(($dolar*$user_commission[23]->amount*0.994),7);
//
//
//
//      $data = [
//         "BTC" =>$value,
//         "ADDRESS"=>$user->btc_address,
//         "name"=>$user->name
//  ];
//
//  $U = MultiLevelCommissions::where("multilevel_users_id","=",$user_commission[23]->multilevel_users_id)->first();
//
//  $U->amount_btc= $value;
//  $U->btc_price= $dolar;
//  $U->status= 1;
//  $U->save();
//  dd($data);


  }


  public function add(){
    $users = User::all();
    $networkers = MultiLevel::all();
    return view('admin.pages.multilevel.multilevelAdd',compact('users','networkers'));
  }
  public function store(Request $request){
    $request = $request->except('_token');
    $multilevel = new MultiLevel();
    $multilevel->user_id = $request['usuario'];
    $multilevel->parent_id = $request['referido'];
    if ($multilevel->parent_id==0) {
      $multilevel->parent_id=null;
    }
    $multilevel->save();
  }

  public function nivel(){
    $levels = MultilevelLevels::all();
    return \View::make('admin.pages.multilevel.levels',compact('levels'));
  }

  public function addNivel(){
    return view('admin.pages.multilevel.levelsAdd');
  }
  public function storeNivel(Request $request){
    if (!empty($request->id)) {
      $level = MultilevelLevels::find($request->id);
    }else{
      $level = new MultilevelLevels();
    }
    $data = $request->except('_token');
    $level->fill($data);
    $level->save();
    \Session::flash('flash_message', 'Accion completada');
    return redirect('admin/multinivel/nivel');
  }

  public function editNivel($id){

    $level = MultilevelLevels::find($id);
    return view('admin.pages.multilevel.levelsEdit',compact('level'));
  }

  public function team($id){

    $padre = MultiLevel::where('id', '=', $id)->first()->user->id;
    $parent = User::where('id', '=', $padre)->first();
    $tree = MultiLevel::where('id', '=', $id)->first()->getDescendantsAndSelf()->toHierarchy();
    //$tree = Category::where('name', '=', 'Books')->first()->getDescendantsAndSelf()->toHierarchy();
    //$tree->name = $tree->user()->nombre;
    $tree = json_decode($tree, true);

    function parse($data,$padre) {
      $temp = [];
      foreach ($data as $id => $v) {
        unset($v['parent_id']);
        unset($v['id']);
        unset($v['lft']);
        unset($v['rght']);
        $padre_ = MultiLevel::where('user_id','=',$padre)->first();


        $depth = $padre_->depth - $v['depth'];
        //unset($v['depth']);
        unset($v['level']);
        //$array0 = array("text" => array ("name" => User::find($v['user_id'])->name));
        if($v['status'] == 1) {
          $html = '<div class="well" style="background-color:#424242;color:white;text-decoration: none;">';
        } else {
          $html = '<div class="well" style="background-color:#66181A;color:white;text-decoration: none;">';
        }

        $html .= '<center>';
        $html .=  User::find($v['user_id'])->name;
        if (!$depth=="0") {
          if($v['status'] == 1) {
            $html .= ' '.$depth.'-';
          }
        }

        if (count($v['children'])< 3) {
          $html .= '<a target="_blank" href="/add/'.$padre.'/'.$v['user_id'].'"';
          $html .= '<br><p style="color: #FFD700;">Añadir</p>';
          $html .= '</a>';
        }

        $html .= '<a target="_blank" href="/admin/multinivel/reestructurar/'.$v['user_id'].'"';
        $html .= '<br><p style="color: #FFD700;"><i class="fa fa-sitemap" aria-hidden="true"></i></p>';
        $html .= '</a>';


        $html .= '</center>'>

        $html .= '</div>';

        $array0 = array("innerHTML" => $html);

        //$array0 = array_merge($array0,$array1);
        $v = array_merge($array0, $v);

        unset($v['user_id']);


        if (count($v['children'])) {
          $v['children'] = parse($v['children'],$padre);
        }else{
          unset($v['children']);
        }
        $temp[] = $v;
      }
      return $temp;
    }

    $depth = 0;
    $tree = json_encode(parse($tree,$padre));





    return \View::make('admin.pages.multilevel.team',compact('tree'), compact('parent'));
    //return response()->json(parse($tree));


  }

  public function deleteUser($id){
    $user = MultiLevel::where('user_id','=',$id)->first();
    $user->delete();
    \Session::flash('flash_message', 'Eliminado');
    return \Redirect::back();
  }

  public function delete($id){
    $level = MultilevelLevels::find($id);
    $level->delete();
    \Session::flash('flash_message', 'Cambios Guardados');
    return \Redirect::back();
  }

  public function calcularNiveles(){
    $users = MultiLevel::all();
    $activos = 0;

    foreach ($users as $user) {
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
      $consumo = $consumo * 0.4;
      $nivel = 0;
      $levels = MultilevelLevels::all();
      foreach ($levels as $level) {
        $nivel = 0;
        if ($activos >= $level->active_membres && $consumo>=$level->group_volume) {
          //echo "subio de nivel ".$user->user->name."a ".$level->nombre."<br>";
          $user->level = $level->id;
          $user->save();
        }
      }
      $activos = 0;
      $consumo = 0;
    }
  }

  public function checkTransactionsBTC(){

      function parsear($data,$nivel,$transaccion) {
        $parents = $data->parent()->get();
        foreach ($parents as $parent) {
          $temp = [];
          $SinNivel = Funciones::getChildrensUser($parent);
          if ($SinNivel) {
          if ($parent->status=="1") {
            $comision = new MultiLevelCommissions();
            $comision->multinivel_transaction_id = $transaccion->id;
            $pago = "0";
            if ($nivel=="0") {
              if (count($parent->children)=="3") {
                if (Funciones::nivelCompleto($parent->children)) {
                  $pago = "1";
                }else{
                  $pago = "0";
                }
              }else{
                $pago = "0";
              }


              $comision->multilevel_users_id = $parent->user_id;
              $comision->observacion = "pago de comision agc ,primer nivel";
              $comision->amount = 35;
            }
            if ($nivel=="1") {

              if (count($parent->parent->children)=="9") {

                if (Funciones::nivelCompleto($parent->parent->children)) {
                  $pago = "1";
                }else{
                  $pago = "0";
                }
              }else{
                $pago = "0";
              }
              $comision->multilevel_users_id = $parent->user_id;
              $comision->amount = 15;
              $comision->observacion = "pago de comision agc , segundo nivel";
            }
            if ($nivel=="2") {
              if (count($parent->parent->parent->children)=="27") {
                if (Funciones::nivelCompleto($parent->parent->parent->children)) {
                  $pago = "1";
                }else{
                  $pago = "0";
                }
              }else{
                $pago = "0";
              }
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
      /*$transacciones = Transaction::where('type','=','5')->where('status','=',"0")->where('date','<=',$diaAnterior)->get();
      foreach ($transacciones as $transaccion) {
      $transaccion->observacion = "Transaccion expirada";
      $transaccion->status="2";
      $transaccion->save();
      }
      */



  //$transacciones = Transaction::where('type','=','5')->where('status','=',"0")->where('date','>=',$diaAnterior)->get();
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

    dd('Termine de validar las transacciones');
}




public function commissions()
{

   $fecha = date('Y-m-d');
  $dias = date('d');
  $nuevafecha = strtotime ( '-'.$dias.' day' , strtotime ( $fecha ) ) ;
  $nuevafecha = date ( 'Y-m-' , $nuevafecha );
  $date = $nuevafecha."29";

  $ganancias =  Transaction::where('status','=','1')->where('date','>=',$date)->select(DB::raw('SUM(price) as total_sales'))->first();
  $commissions = MultiLevelCommissions::where('date','>=',$date)->orderBy('multilevel_users_id','asc')->orderBy('amount','desc')->get();
  $amount = 0;
  $amount_BTC = 0;
  foreach ($commissions as $commission) {
    $amount = $amount + $commission->amount;
    $amount_BTC = $amount_BTC + $commission->amount_btc;
  }
  $id_user = 0;
  $ventas =  $ganancias->total_sales;
  $ganancias = $ganancias->total_sales - $amount;
  return view('admin.pages.multilevel.commissions',compact('commissions','amount','amount_BTC','ganancias','ventas','id_user'));
}

public function transaccionesManuales(){

  //dd("warning");
    $users = MultiLevel::where('status','=','1')->get();
    $count = MultiLevel::where('status','=','1')->count();

    $i=0;
    foreach ($users as $user) {

      $pago =  Transaction::where('status','=','1')->where('user_id','=',$user->user_id)->first();

        if ($pago) {
          unset($users[$i]);

        }
        $i++;
    }


    foreach ($users as $user) {
      $transaccion = new Transaction();
      $transaccion->user_id = $user->user_id;
      $transaccion->status = '0';
      $transaccion->date = '2017-11-27 03:40:43';
      $transaccion->type = '5';
      $transaccion->product_id = '15';
      $transaccion->titulo = 'Suscripcion a agc - pago manual';
      $transaccion->price = '250';
      $transaccion->amount_in_btc = '0.026';
      $transaccion->address = '3DZNLVNkXAVGUf1MK4GZg2o6D4sokjBzFX';
      $transaccion->verificaciones = '0';
      $transaccion->observacion = 'Transaccion manual.';
      $transaccion->save();
    }
  }

  public function downloadCommissions()
  {
    $fecha = date('Y-m-d');
    $dias = date('d');
    $nuevafecha = strtotime ( '-'.$dias.' day' , strtotime ( $fecha ) ) ;
    $nuevafecha = date ( 'Y-m-' , $nuevafecha );
    $date = $nuevafecha."29";
    $commissions = MultiLevelCommissions::where('date','>=',$date)->get();

     Excel::create(1,function($excel) use($commissions) {
     $excel->sheet('Comisiones', function($sheet) use($commissions) {
     $sheet->row(1,['ID','DNI','Monto (USD)','Monto (BTC)','Fecha','Estado','Observación']);

     foreach ($commissions as $commission) {
        $row = [];
        $row[0] = $commission->id;
        $row[1] = $commission->multilevel_users_id;
        $row[3] = $commission->amount;
        $row[4] = $commission->amount_btc;
        $row[5] = $commission->date;
        $row[6] = $commission->status ? 'Pagado':'Pendiente por pagar';
        $row[7] = $commission->observacion;
        $sheet->appendRow($row);
     }
        $size = count($commissions)+1;

        $sheet->setBorder('A1:H1','thin');
        $sheet->cells('B1:B'.$size,function($cells){$cells->setAlignment('left');});
        $sheet->cells('C1:C'.$size,function($cells){$cells->setAlignment('left');});
        $sheet->cells('D1:D'.$size,function($cells){$cells->setAlignment('left');});
        $sheet->cells('E1:E'.$size,function($cells){$cells->setAlignment('left');});
        $sheet->cells('F1:F'.$size,function($cells){$cells->setAlignment('left');});
        $sheet->cells('G1:G'.$size,function($cells){$cells->setAlignment('left');});
        $sheet->cells('H1:H'.$size,function($cells){$cells->setAlignment('left');});


            $sheet->cells('A1:H1',function($cells){
                $cells->setBackground('#0B2161');
                $cells->setFontColor('#E3F6CE');
                $cells->setalignment('center');
                $cells->setValignment('middle');
                $cells->setAlignment('center');
            });

    });
     })->export('xls');

    return \Redirect::back();

  }

  public function deleteNoPagos(){
    $noEliminar = ['987654987','321298846','1015435638'];
    $users = MultiLevel::where('status','=','0')->get();
    $i=0;

    foreach ($users as $user) {
     if (in_array($user->user_id, $noEliminar)) {
        unset($users[$i]);
      }
      $i++;
    }
    $i= 0;


    foreach ($users as $user) {
      $hijos = MultiLevel::where('parent_id','=',$user->id)->first();
      if (!$hijos) {
          echo $user->user->name;
          echo " - ";
          //$deleted = new MultiLevelDeleted();
          //$deleted = $deleted->fill($user->toArray());
          //$deleted->save();
          $user->delete();
          unset($users[$i]);
          echo  $i++;
          echo " - ";
          echo "<br>";
      }
    }

    $i= 0;

  /*  foreach ($users as $user) {
      echo $user->user->name;
      echo " - ";
      echo "<br>";
      $user->children[0]->makeChildOf($user->parent);
    }
    */

  //  $parents = MultiLevel::where('status','=','1')->where('id','<=','512')->get();

    /*foreach ($parents as $parent) {
      if (count($parent->children)>3) {
        $parent->children[3]->makeChildOf($parent->children[0]);
        echo $parent->user->name;
        echo " - ";
        echo "<br>";
      }
    }*/

  //  dd($users);



  }

  public function reestructurar($id){
    $parents = MultiLevel::where('status','=','1')->get();
    $user = MultiLevel::where('user_id','=',$id)->first();
    return view('admin.pages.multilevel.reestructurar',compact('parents','user'));
  }
  public function reestructurando($id,Request $request){
  //  dd($id);


  $root = MultiLevel::find($request->parent);
  $children = MultiLevel::find($id);
  $children->makeChildOf($root);
  \Session::flash('flash_message', 'Hecho!');
  return \Redirect::back();

  }







}
