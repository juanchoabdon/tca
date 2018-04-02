<?php

namespace App\Http\Controllers\App;

use Auth;
use Session;
use App\User;
use App\Types;
use Carbon\Carbon;
use App\EstrategiasContent;
use App\PermisosIndividuales;
use App\MultiLevelUsers;
use App\MultiLevel;
use App\SubscriptionFeatures;
use App\Models\Estrategias\Estrategias;
#0use Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class EstrategiasController extends MainAdminController
{

  public function index()
  {
    $user = Auth::user();
    $permisos = $user->permissions;


    $agc = MultiLevel::where('user_id', '=', $user->id)->first();
    if(count($agc) === 1) {
      $strategies_id = SubscriptionFeatures::where("type","=","estrategia")->where("suscriptions_id","=",15)->get()->pluck('training_id')->toArray();
    } else {
      $agc = false;
    }

    if (!($permisos->isEmpty())) { // si tiene una suscripcion activa siga.
      foreach ($permisos as $permiso) {
        $suscripcion = $permiso->subscription()->first();
        $features = $suscripcion->features()->where('type','=','training')->get()->pluck('training_id')->toArray();


      }
    }else{
      $features = PermisosIndividuales::where('user_id','=',$user->id)->where('type','=','estrategia')->get()->pluck('product_id')->toArray();
    }

    $estrategias = Estrategias::all();
    return view('app.pages.estrategias',compact('estrategias','permisos','features','agc','strategies_id'));
  }


  public function estrategia($id){

    $contents = EstrategiasContent::where('estrategias_id','=',$id)->get();
    return view('app.pages.estrategia',compact('contents'));


  }

  public function ver($id){

    $content = EstrategiasContent::find($id);
    return view('app.pages.estrategiasSee',compact('content'));

  }





}
