<?php

namespace App\Http\Controllers\App;

use Auth;
use App\User;
use App\Types;
use App\Analisis;

use App\MultiLevel;
use Carbon\Carbon;
#0use Request;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class AnalisisController extends MainAdminController
{

  public function index()
  {
    $agc = MultiLevel::where('user_id', '=', Auth::User()->id)->first();

    if($agc) {
      $analisis = Analisis::where('multilevel', '=', '1')->get();
    } else {
      $analisis = Analisis::all();
    }

    return view('app.pages.analisis',compact('analisis'));
  }


  public function see($id){
    $analisis = Analisis::where('id','=',$id)->first();
    return view('app.pages.analisi',compact('analisis','id'));
  }



}
