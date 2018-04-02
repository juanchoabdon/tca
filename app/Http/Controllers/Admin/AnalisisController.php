<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Types;
use App\Analisis;



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
    	$analisis = Analisis::all();
      return view('admin.pages.analisis',compact('analisis'));
    }



    public function add(){
        return view('admin.pages.addAnalisis');
    }

    public function edit($id){
      $analisis = Analisis::where('id','=',$id)->first();
      return view('admin.pages.editAnalisis',compact('analisis','id'));
    }


      public function store(Request $request){
        $data =  \Input::except(array('_token')) ;
        $inputs = $request->all();
        $rule=array(
              'title' => 'required','video_url' => 'required'
             );

         $validator = \Validator::make($data,$rule);

          if ($validator->fails())
          {
                  return redirect()->back()->withErrors($validator->messages());
          }


          if(!empty($inputs['id'])){

                  $analisi = Analisis::findOrFail($inputs['id']);

              }else{

                  $analisi = new Analisis();

          }


          $analisi->title = $inputs['title'];
          $analisi->video_url = $inputs['video_url'];
          $analisi->multiLevel = $inputs['agc-status'];




          $analisi->save();
          \Session::flash('flash_message', 'Cambios Guardados');
          return \Redirect::back();

      }

      public function delete($id){
        $analisis= Analisis::find($id);
        $analisis->delete();
        return redirect('/admin/analisis');
      }







}
