<?php

namespace App\Http\Controllers\App;

use Auth;
use App\User;
use App\Types;
use App\MultiLevel;

use Carbon\Carbon;
#0use Request;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class TeamController extends MainAdminController
{

    public function index()
    {

      $id = MultiLevel::where('user_id', '=', Auth::User()->id)->first()->id;

      $padre = MultiLevel::where('id', '=', $id)->first()->user->id;

      $parent = User::where('id', '=', $padre)->first();


      $tree = MultiLevel::where('id', '=', $id)->first()->getDescendantsAndSelf()->toHierarchy();

      $tree = json_decode($tree, true);

      function parse($data,$padre) {
        $temp = [];
        foreach ($data as $id => $v) {
          unset($v['parent_id']);
          unset($v['id']);
          unset($v['lft']);
          unset($v['rght']);
          unset($v['depth']);
          unset($v['level']);
          //$array0 = array("text" => array ("name" => User::find($v['user_id'])->name));
          if($v['status'] == 1) {
            $html = '<div class="well" style="background-color:#424242;color:white;text-decoration: none;">';
          } else {
            $html = '<div class="well" style="background-color:#66181A;color:white;text-decoration: none;">';
          }

          $html .= '<center>';
          $html .=  User::find($v['user_id'])->name;
          if (count($v['children'])< 3) {
            $html .= '<a target="_blank" href="/add/'.$padre.'/'.$v['user_id'].'"';
            $html .= '<br><p style="color: #FFD700;">Añadir</p>';
            $html .= '</a>';
          }


          $html .= '</center>'>

          $html .= '</div>';

          $array0 = array("innerHTML" => $html);

          //$array0 = array_merge($array0,$array1);
          $v = array_merge($array0, $v);

          unset($v['user_id']);


          if (count($v['children'])) {
            $v['children'] = parse($v['children'],$padre);
          }else{
            unset($v['children']);
          }
          $temp[] = $v;
        }
        return $temp;
      }

      $tree = json_encode(parse($tree,$padre));



      return view('app.pages.team', compact('tree'));
    }



}
