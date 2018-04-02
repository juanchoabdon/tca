<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Types;
use App\Models\Estrategias\Estrategias;
use App\EstrategiasContent;


use Carbon\Carbon;
#0use Request;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class EstrategiasController extends MainAdminController
{

    public function index()
    {
    	$estrategias = Estrategias::all();
      return view('admin.pages.estrategias',compact('estrategias'));
    }



    public function add(){
        return view('admin.pages.addEstrategia');
    }

    public function edit($id){
      $estrategia = Estrategias::where('id','=',$id)->first();
      return view('admin.pages.editEstrategia',compact('estrategia','id'));
    }


      public function store(Request $request){
        $data =  \Input::except(array('_token')) ;
        $inputs = $request->all();
        $rule=array(
              'titulo' => 'required','precio' => 'required'
             );

         $validator = \Validator::make($data,$rule);

          if ($validator->fails())
          {
                  return redirect()->back()->withErrors($validator->messages());
          }


          if(!empty($inputs['id'])){

                  $estrategia = Estrategias::findOrFail($inputs['id']);

              }else{

                  $estrategia = new Estrategias();

          }



          $featured_image = $request->file('img');

          if($featured_image){

            \File::delete(public_path() .'/upload/training/'.$estrategia->img.'-b.png');
            \File::delete(public_path() .'/upload/training/'.$estrategia->img.'-s.jpg');


                  $tmpFilePath = 'upload/training/';

                  $hardPath =  str_slug($inputs['titulo'], '-').'-'.md5(rand(0,99999));

                  $img = Image::make($featured_image);

                  $img->fit(600, 600)->save($tmpFilePath.$hardPath.'-b.png');
                  $img->fit(600, 600)->save($tmpFilePath.$hardPath.'-s.jpg');

                  $estrategia->img = $hardPath;
                //  dd($training->img);

              }


          $estrategia->titulo = $inputs['titulo'];
          $estrategia->descripcion = $inputs['descripcion'];
          $estrategia->precio = $inputs['precio'];
          $estrategia->slug = $inputs['slug'];
          $estrategia->video = $inputs['video'];
          $estrategia->fecha = $inputs['fecha'];


          $estrategia->save();
          \Session::flash('flash_message', 'Cambios Guardados');
          return \Redirect::back();

      }

      public function content($id){

        $contents = EstrategiasContent::where('estrategias_id','=',$id)->get();
        return view('admin.pages.EstrategiasContent',compact('contents','id'));
      }

      public function addcontent($id){
        return view('admin.pages.addEstrategiasContent',compact('id'));
      }

      public function storecontent($id,Request $request){


          if (!empty($request->ide)) {
              $content = EstrategiasContent::findOrFail($request->id);
          }else{


            if(empty($request->video)){
              \Session::flash('flash_message', 'Algo fallo , revise que adjunto el video');
              return \Redirect::back();
            }
            $content = new EstrategiasContent();
            $content->estrategias_id = $id;
          }
          if($request->video){

            $file = $request->file('video');
            $filename = time()."_".$file->getClientOriginalName();
            $path = public_path().'/upload/videos/';
            $path_local = '/upload/videos/';
            $path = $file->move($path, $filename);
            $content->ruta = $path_local.$filename;
          }

          $content->titulo = $request->titulo;
          $content->descripcion =  $request->descripcion;


          $content->save();


            \Session::flash('flash_message', 'Cambios Guardados');
            return \Redirect::back();



      }
      public function editcontent($id){

                $content = EstrategiasContent::where('id','=',$id)->first();
                return view('admin.pages.editEstrategiasContent',compact('id','content'));

      }





}
