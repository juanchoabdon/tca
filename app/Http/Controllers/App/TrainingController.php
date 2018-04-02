<?php

namespace App\Http\Controllers\App;

use Auth;

use Session;
use App\User;
use App\Types;
use Carbon\Carbon;
use App\Training;
use App\LiveStatus;
use app\MultiLevel;
use App\TrainingContent;
use Illuminate\Http\Request;
use App\PermisosIndividuales;
use App\SubscriptionFeatures;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class TrainingController extends MainAdminController
{

  public function index()
  {

    $features=[];
    $user = Auth::user();
    $permisos = $user->permissions;

    $agc = MultiLevel::where('user_id', '=', $user->id)->first();
    if(count($agc) === 1) {
      $trainings_id = SubscriptionFeatures::where("type","=","training")->where("suscriptions_id","=",15)->get()->pluck('training_id')->toArray();
    } else {
      $agc = false;
    }

    $live = LiveStatus::where('status','=','1')->orderBy('date','desc')->get()->pluck('training_id')->toArray();
    if (!($permisos->isEmpty())) { // si tiene una suscripcion activa siga.
      foreach ($permisos as $permiso) {
        $suscripcion = $permiso->subscription()->first();
        $features = $suscripcion->features()->where('type','=','training')->get()->pluck('training_id')->toArray();

      }
    }
    $permisos_individuales = PermisosIndividuales::where('user_id','=',$user->id)->where('type','=','training')->get()->pluck('product_id')->toArray();

    if (!empty($permisos_individuales)) {
      $features = array_unique(array_merge($permisos_individuales,$features));
    }

    //$permisos_individuales = PermisosIndividuales::where('user_id','=',$user->id)->where('type','=','training')->get()->pluck('product_id')->toArray();

    $trainings = Training::all();


    return view('app.pages.trainings',compact('trainings','permisos','features','live','agc','trainings_id'));
  }



  public function entrenamiento($id){


    $contents = TrainingContent::where('training_id','=',$id)->orderBy('order')->get();

    $training = Training::find($id);
    $stream = "rtmp://tradingclubacademy.com/live/".$training->slug;

    $live= LiveStatus::where('training_id','=',$id)->orderBy('date','desc')->first();



    return view('app.pages.training',compact('contents','stream','id','live', 'training'));



  }

  public function ver($id){
    $content = TrainingContent::find($id);
    $training = Training::find($content->training_id);
    $contents = TrainingContent::where('training_id','=', $training->id)->where('order', '>', $content->order)->orderBy('order')->get();
    return view('app.pages.trainingSee',compact('content', 'training', 'contents'));

  }





}
