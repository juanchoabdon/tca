<?php

namespace App\Http\Controllers\App;

use Auth;
use App\User;
use App\Types;
use App\MultiLevelCommissions;

use Carbon\Carbon;
#0use Request;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;



class CommissionsController extends MainAdminController
{

    public function index()
    {
      $fecha = date('Y-m-d');
      $dias = date('d');

      $nuevafecha = strtotime ( '-'.$dias.' day' , strtotime ( $fecha ) ) ;
      $nuevafecha = date ( 'Y-m-' , $nuevafecha );
      $date = $nuevafecha."29";

      $commissions = MultiLevelCommissions::where('multilevel_users_id','=',Auth::user()->id)->where('date','>=',$date)->get();
      return view('app.pages.commissions',compact('commissions'));
    }



}
