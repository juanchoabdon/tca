<?php

namespace App\Http\Controllers\App;

use Auth;
use App\User;
use App\Types;
use App\Estrategias;
use App\EstrategiasContent;
use App\PermisosIndividuales;
use App\Podcast;


use Carbon\Carbon;
#0use Request;
use Illuminate\Http\Request;
use Session;
use App\MultiLevel;
use App\SubscriptionFeatures;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class PodcastController extends MainAdminController
{

    public function index()
    {
      $features=[];
      $user = Auth::user();
      $permisos = $user->permissions;
      $agc = MultiLevel::where('user_id', '=', $user->id)->first();

      if(count($agc) === 1) {
        $features = [1];
      }

      if (!($permisos->isEmpty())) { // si tiene una suscripcion activa siga.
        foreach ($permisos as $permiso) {
          $suscripcion = $permiso->subscription()->first();
          $features = $suscripcion->features()->where('type','=','podcast')->get()->pluck('training_id')->toArray();

        }
      }
      $permisos_individuales = PermisosIndividuales::where('user_id','=',$user->id)->where('type','=','podcast')->get()->pluck('product_id')->toArray();
      if (!empty($permisos_individuales)) {
        $features = array_unique(array_merge($permisos_individuales,$features));
      }
    	$podcast = Podcast::all();
      return view('app.pages.podcast',compact('podcast','features'));
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
