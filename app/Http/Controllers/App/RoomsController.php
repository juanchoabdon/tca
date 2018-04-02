<?php

namespace App\Http\Controllers\App;

use Auth;
use Session;
use App\User;
use App\Types;
use Carbon\Carbon;
use App\SubscriptionFeatures;
use App\Rooms;
#0use Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class RoomsController extends MainAdminController
{

  public function index()
  {
      $rooms = Rooms::where("status","=",1)->get();
      return view('app.pages.rooms',compact('rooms'));
  }

  public function content($id)
  {
      $room = Rooms::where("id","=",$id)->get()->first();
    
      return view('app.pages.room',compact('room'));
  }

}
