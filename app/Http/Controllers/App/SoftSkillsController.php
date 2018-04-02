<?php

namespace App\Http\Controllers\App;

use Auth;
use Session;
use App\User;
use App\Types;
use Carbon\Carbon;
use App\SoftTrainings;
use App\SoftTrainingsContent;
use App\PermisosIndividuales;
use App\MultiLevelUsers;
use App\MultiLevel;
use App\SubscriptionFeatures;

#0use Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class SoftSkillsController extends MainAdminController
{
    public function index(){

      $softskills = SoftTrainings::all();
     
      return view('app.pages.softskills',compact('softskills'));

    }

    public function softskill($id){

      $softskill = SoftTrainings::find($id);
      $contents = SoftTrainingsContent::where('softskill_id','=',$id)->get();

      return view('app.pages.softskill',compact('contents','softskill'));

    }

    public function ver($id){

    $content = SoftTrainingsContent::find($id);
    $softskill = SoftTrainings::find($content->softskill_id);
    $contents = SoftTrainingsContent::where('softskill_id','=', $softskill->id )->get();

    return view('app.pages.seesoftskill',compact('content','softskill','contents'));

    }


}
