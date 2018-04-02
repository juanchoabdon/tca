<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Types;
use App\Training;
use App\TrainingContent;
use App\LiveStatus;


use Carbon\Carbon;
#0use Request;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class TrainingController extends MainAdminController
{

    public function index()
    {
    	$trainings = Training::all();
      return view('admin.pages.training',compact('trainings'));
    }

    public function streaming($id){

      $training = Training::where('id','=',$id)->first();
      $slug = $training->slug;
      $livestatus= LiveStatus::where('training_id','=',$id)->orderBy('date','desc')->first();


      $stream = "rtmp://".env('STREAMING_HOST', 'localhost')."/live/".$slug;


    //  $stream ="rtmp://tradingclubacademy.com:/live/".$slug;
      return view('admin.pages.streaming',compact('stream','training','id','livestatus'));
    }

    public function add(){
      $tipos = DB::table('training_types')->get();
        return view('admin.pages.addTraining',compact('tipos'));
    }

    public function edit($id){
      $training = Training::where('id','=',$id)->first();
      $tipos = DB::table('training_types')->get();
      return view('admin.pages.editTraining',compact('tipos','training','id'));
    }


      public function store(Request $request){
        $data =  \Input::except(array('_token')) ;
        $inputs = $request->all();
        $rule=array(
              'title' => 'required','price' => 'required'
             );

         $validator = \Validator::make($data,$rule);

          if ($validator->fails())
          {
                  return redirect()->back()->withErrors($validator->messages());
          }


          if(!empty($inputs['id'])){

                  $training = Training::findOrFail($inputs['id']);

              }else{

                  $training = new Training();

          }



          $featured_image = $request->file('img');

          if($featured_image){

            \File::delete(public_path() .'/upload/training/'.$training->featured_image.'-b.png');
            \File::delete(public_path() .'/upload/training/'.$training->featured_image.'-s.jpg');


                  $tmpFilePath = 'upload/training/';

                  $hardPath =  str_slug($inputs['title'], '-').'-'.md5(rand(0,99999));

                  $img = Image::make($featured_image);

                  $img->fit(600, 600)->save($tmpFilePath.$hardPath.'-b.png');
                  $img->fit(600, 600)->save($tmpFilePath.$hardPath.'-s.jpg');

                  $training->img = $hardPath;
                //  dd($training->img);

              }

          $training->tipo = $inputs['tipo'];
          $training->title = $inputs['title'];
          $training->subtitle = $inputs['subtitle'];
          $training->description = $inputs['description'];
          $training->price = $inputs['price'];
          $training->slug = $inputs['slug'];
          $training->cantidad = $inputs['cantidad'];
          $training->video_url = $inputs['video'];


          $training->save();
          \Session::flash('flash_message', 'Cambios Guardados');
          return \Redirect::back();

      }

      public function content($id){
        $contents = TrainingContent::where('training_id','=',$id)->get();
        return view('admin.pages.TrainingContent',compact('contents','id'));
      }

      public function addcontent($id){
        return view('admin.pages.addTrainingContent',compact('id'));
      }


      public function storecontent($id,Request $request){
          if (!empty($request->ide)) {
              $content = TrainingContent::findOrFail($request->id);
          }else{
            if(empty($request->video)){
              \Session::flash('flash_message', 'Algo fallo , revise que adjunto el video');
              return \Redirect::back();
            }
            $content = new TrainingContent();
            $content->training_id = $id;
          }
          if($request->video){
              
            $content->ruta = $request->video ;
          }

          $content->titulo = $request->titulo;
          $content->descripcion =  $request->descripcion;


          $content->save();


            \Session::flash('flash_message', 'Cambios Guardados');
            return \Redirect::back();



      }
      public function editcontent($id){

                $content = TrainingContent::where('id','=',$id)->first();
                return view('admin.pages.editTrainingContent',compact('id','content'));

      }
      public function delete($id)
      {

        if(Auth::User()->usertype!="Admin"){
              \Session::flash('flash_message', 'Access denied!');
              return redirect('/');

          }

      $training = Training::findOrFail($id);
      $training->delete();

          \Session::flash('flash_message', 'Eliminado');

          return redirect()->back();

      }

      public function contentdelete($id)
      {

        if(Auth::User()->usertype!="Admin"){
              \Session::flash('flash_message', 'Access denied!');
              return redirect('/');

          }

      $training = TrainingContent::findOrFail($id);
      $training->delete();

          \Session::flash('flash_message', 'Eliminado');

          return redirect()->back();

      }

      public function enableLive($id){
        $live = new LiveStatus();
        $live->status = 1;
        $live->training_id = $id;
        $live->save();
        \Session::flash('flash_message', 'Video en vivo Iniciado');

        return redirect()->back();
      }
      public function disableLive($id){
        $live = LiveStatus::where('training_id','=',$id)->orderBy('date','desc')->first();
        $live->status = 0;
        $live->save();
        \Session::flash('flash_message', 'Video en vivo finalizado');

        return redirect()->back();
      }






}
