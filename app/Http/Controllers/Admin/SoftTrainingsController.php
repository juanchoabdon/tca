<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Types;
use App\SoftTrainingsContent;
use App\LiveStatus;
use App\SoftTrainings;


use Carbon\Carbon;
#0use Request;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class SoftTrainingsController extends MainAdminController
{

    public function index()
    {
    	$trainings = SoftTrainings::all();
      return view('admin.pages.soft-trainings.softTrainings',compact('trainings'));
    }

    public function addView() {
      $tipos = DB::table('training_types')->get();
        return view('admin.pages.soft-trainings.add', compact('tipos'));
    }

    public function add(Request $request){
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

                $training = SoftTrainings::findOrFail($inputs['id']);

            }else{

                $training = new SoftTrainings();

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

    public function edit($id){
      $training = SoftTrainings::where('id','=',$id)->first();
      $tipos = DB::table('training_types')->get();
      return view('admin.pages.soft-trainings.edit',compact('tipos','training','id'));
    }

    public function content($id){
      $contents = SoftTrainingsContent::where('softskill_id','=',$id)->get();
      return view('admin.pages.soft-trainings.content',compact('contents','id'));
    }

    public function addcontent($id){
      return view('admin.pages.soft-trainings.addContent',compact('id'));
    }


    public function storecontent($id,Request $request){

        if (!empty($request->ide)){
            $content = SoftTrainingsContent::findOrFail($request->ide);
        }
        else
        {
          if(empty($request->video)){
            \Session::flash('flash_message', 'Algo fallo , revise que adjunto el video');
            return \Redirect::back();
          }

        $content = new SoftTrainingsContent();
        $content->softskill_id = $id;
        }
        if($request->video){
        $content->ruta = $request->video;
        }

        $content->titulo = $request->titulo;
        $content->descripcion =  $request->descripcion;


        $content->save();


          \Session::flash('flash_message', 'Cambios Guardados');
          return \Redirect::back();



    }
    public function editcontent($id){

      $content = SoftTrainingsContent::where('id','=',$id)->first();
      return view('admin.pages.soft-trainings.editContent',compact('id','content'));

    }
    public function delete($id)
    {

      if(Auth::User()->usertype!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('/');

        }

    $training = SoftTrainings::findOrFail($id);
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

    $training = SoftTrainingsContent::findOrFail($id);
    $training->delete();

        \Session::flash('flash_message', 'Eliminado');

        return redirect()->back();

    }






}
