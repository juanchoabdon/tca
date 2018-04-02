<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Types;
use App\Tutorials;



use Carbon\Carbon;
#0use Request;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class TutorialsController extends MainAdminController
{

    public function index()
    {
    	$tutorials = Tutorials::all();
      return view('admin.pages.tutorials',compact('tutorials'));
    }



    public function add(){
        return view('admin.pages.addTutorial');
    }

    public function edit($id){
      $tutorial = Tutorials::where('id','=',$id)->first();
      return view('admin.pages.editTutorial',compact('tutorial','id'));
    }


      public function store(Request $request){

        //$data =  \Input::except(array('_token')) ;
        $inputs = $request->all();
        $rule=array(
              'title' => 'required','video_url' => 'required'
             );

         $validator = \Validator::make($inputs,$rule);

          if ($validator->fails())
          {
                  return redirect()->back()->withErrors($validator->messages());
          }


          if(!empty($inputs['id'])){

                  $tutorial = Tutorials::findOrFail($inputs['id']);

              }else{
                  $tutorial = new Tutorials();
          }


          $tutorial->title = $inputs['title'];
          $tutorial->video_url = $inputs['video_url'];
          $tutorial->multilevel = $inputs['status'];



          $tutorial->save();
          \Session::flash('flash_message', 'Cambios Guardados');
          return \Redirect::back();

      }







}
