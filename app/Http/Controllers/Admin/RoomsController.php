<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Types;
use App\Rooms;
use Session;
use Illuminate\Support\Facades\Password;
use Carbon\Carbon;
#0use Request;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class RoomsController extends MainAdminController
{

    public function index()
    {
    	$rooms = Rooms::all();
        return view('admin.pages.rooms',compact('rooms'));
    }


    public function add(){
        return view('admin.pages.addRoom');
    }


    public function edit($id){
      $room = Rooms::where('id','=',$id)->first();
      return view('admin.pages.editRooms',compact('room','id'));
    }


  public function store(Request $request){
    $data =  \Input::except(array('_token')) ;
    $inputs = $request->all();
    $rule=array(
          'name' => 'required','description' => 'required','status'=>'required'
          ,'video'=>'required'
         );

     $validator = \Validator::make($data,$rule);

      if ($validator->fails())
      {
              return redirect()->back()->withErrors($validator->messages());
      }


      if(!empty($inputs['id'])){

              $rooms = Rooms::findOrFail($inputs['id']);

          }else{

              $rooms = new Rooms();

      }


      $rooms->name = $inputs['name'];
      $rooms->description = $inputs['description'];
      $rooms->status = $inputs['status'];
      $rooms->video = $inputs['video'];
      $rooms->save();

      \Session::flash('flash_message', 'Cambios Guardados');
      return \Redirect::back();

  }

      public function status($id){
        $rooms = Rooms::findOrFail($id);
        $rooms->status =!$rooms->status;
        $rooms->save();
        if(!$rooms->status){
            \Session::flash('flash_message', 'La sala '.$rooms->name.' ha sido desactivada');
        }else{
            \Session::flash('flash_message', 'La sala '.$rooms->name.' ha sido activada');
        }


        return \Redirect::back();
      }

      public function delete($id){
        $rooms = Rooms::findOrFail($id);
        $rooms->delete();
        \Session::flash('flash_message', 'La sala '.$rooms->name.' ha sido eliminada');
        return \Redirect::back();
      }





      }
