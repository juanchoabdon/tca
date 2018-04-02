<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Types;
use App\Podcast;



use Carbon\Carbon;
#0use Request;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class PodcastController extends MainAdminController
{

    public function index()
    {
    	$chapters = Podcast::all();
      return view('admin.pages.podcast',compact('chapters'));
    }



    public function add(){
        return view('admin.pages.addPodcast');
    }

    public function edit($id){
      $chapter= Podcast::where('id','=',$id)->first();
      return view('admin.pages.editPodcast',compact('chapter','id'));
    }


    public function store(Request $request){

      $inputs = $request->all();


        if(!empty($inputs['id'])){

          $chapter = Podcast::findOrFail($inputs['id']);

        }else{
              if(empty($inputs['audio'])){
                \Session::flash('flash_message', 'Algo fallo , revise que adjunto el video');
                return \Redirect::back();
              }
                $chapter = new Podcast();

        }

        if(!empty($inputs['audio'])){
          $file = $request->file('audio');
          $filename = time()."_".$file->getClientOriginalName();
          $path = public_path().'/upload/videos/';
          $path_local = '/upload/videos/';
          $path = $file->move($path, $filename);
          $chapter->audio_url = $path_local.$filename;
        }


        $chapter->title = $inputs['title'];
        $chapter->description = $inputs['description'];



        $chapter->save();
        \Session::flash('flash_message', 'Cambios Guardados');
        return \Redirect::back();

    }

    public function delete($id){
      $chapter = Podcast::find($id);
      $chapter->delete();
      return redirect('/admin/podcast');
    }







}
