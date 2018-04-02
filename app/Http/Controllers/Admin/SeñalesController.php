<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Mail;
use App\User;
use App\Types;
use App\Señales;
use App\SeñalesContent;
use App\MultiLevel;
use Illuminate\Support\Facades\Password;

use Carbon\Carbon;
#0use Request;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class SeñalesController extends MainAdminController
{

    public function index()
    {
    	$señales = Señales::all();
      return view('admin.pages.senales',compact('señales'));
    }



    public function add(){
        return view('admin.pages.addSeñal');
    }

    public function edit($id){
      $señal = Señales::where('id','=',$id)->first();
      return view('admin.pages.editSeñales',compact('señal','id'));
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

                  $señal = Señales::findOrFail($inputs['id']);

              }else{

                  $señal = new Señales();

          }



          $featured_image = $request->file('img');

          if($featured_image){

            \File::delete(public_path() .'/upload/training/'.$señal->img.'-b.png');
            \File::delete(public_path() .'/upload/training/'.$señal->img.'-s.jpg');


                  $tmpFilePath = 'upload/training/';

                  $hardPath =  str_slug($inputs['titulo'], '-').'-'.md5(rand(0,99999));

                  $img = Image::make($featured_image);

                  $img->fit(600, 600)->save($tmpFilePath.$hardPath.'-b.png');
                  $img->fit(600, 600)->save($tmpFilePath.$hardPath.'-s.jpg');

                  $señal->img = $hardPath;
                //  dd($training->img);

              }


          $señal->titulo = $inputs['titulo'];
          $señal->descripcion = $inputs['descripcion'];
          $señal->precio = $inputs['precio'];
          $señal->video = $inputs['video'];
          $señal->fecha = $inputs['fecha'];
          $señal->meses = $inputs['meses'];


          $señal->save();
          \Session::flash('flash_message', 'Cambios Guardados');
          return \Redirect::back();

      }

      public function content($id){

        $contents = SeñalesContent::where('señales_id','=',$id)->get();
        return view('admin.pages.SeñalesContent',compact('contents','id'));
      }

      public function addcontent($id){
        return view('admin.pages.addEstrategiasContent',compact('id'));
      }

      public function storecontent($id,Request $request){


          if (!empty($request->ide)) {
              $content = EstrategiasContent::findOrFail($request->id);
          } else {


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


      public function sendsignal(Request $request) {

        $users_id = MultiLevel::where("status","=","0")->get()->pluck('user_id')->toArray();
        foreach ($users_id as $i => $user_id){ $emails[$i] = User::where("id","=",$user_id)->pluck('email');}
        // $d = Password::
        $test = ['danielmurte1@gmail.com','juanchoabdons@gmail.com','danielmurte_@hotmail.com'];


            foreach ($emails as $email ) {

                $token = str_random(40);
                $pw_reset = DB::table('password_resets')->insert(
                    ['email' => $email,
                     'token' => $token ,
                     'created_at' => date('Y-m-d H:i:s')
                    ]
                );

                $r = $request->all();

                $r['token'] = $token;


                Mail::send('admin.emails.contact',$r,function ($message) use ($email)  {
                 $message->subject("Bienvenido a Artis Global Club!");
                 $message->to($email,'Juan de AGC');
                });
            }



        \Session::flash('flash_message', 'Señal enviada');
        return \Redirect::back();

    }


      }
