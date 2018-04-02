<?php

namespace App\Http\Controllers\App;

use Auth;
use App\Conversation;

use Carbon\Carbon;
#0use Request;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class ConversatoriosController extends MainAdminController
{

    public function index()
    {
      //$conversatorios = Conversation::all();
      dd("works");
    }
    





}
