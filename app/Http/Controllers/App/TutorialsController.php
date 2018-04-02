<?php

namespace App\Http\Controllers\App;

use Auth;
use App\User;
use App\Types;
use App\Tutorials;
use App\MultiLevel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class TutorialsController extends MainAdminController
{

  public function index()
  {
    $agc = MultiLevel::where('user_id', '=', Auth::User()->id)->first();
    if($agc) {
      $tutorials = Tutorials::where('multilevel', '=', '1')->get();
    } else {
      $tutorials = Tutorials::all();
    }

    return view('app.pages.tutorials',compact('tutorials'));
  }


  public function see($id){
    $tutorial = Tutorials::where('id','=',$id)->first();
    return view('app.pages.tutorial',compact('tutorial','id'));
  }

}
