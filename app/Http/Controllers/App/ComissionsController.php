<?php

namespace App\Http\Controllers\App;

use Auth;
use App\User;
use App\Types;

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

      return view('app.pages.commissions');
    }



}
