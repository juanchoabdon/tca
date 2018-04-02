<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Conversation;
use App\ConversationInscribed;
use Intervention\Image\Facades\Image;

class ConversationController extends Controller
{


    public function index()
    {
      $conversations = Conversation::all();
      return view('admin.pages.conversation')->with("conversations",$conversations);
    }

    public function add(){
      return view('admin.pages.conversationaddedit');
    }


    public function store(Request $request){

      $featured_image = $request->file('featured_image');
      $inputs = $request->all();
        if($featured_image){
        \File::delete(public_path() .'/upload/conversations/'.$request->title.'-b.png');
        \File::delete(public_path() .'/upload/conversations/'.$request->title.'-s.jpg');
              $tmpFilePath = 'upload/conversations/';
              $hardPath =  str_slug($request->title, '-').'-'.md5(rand(0,99999));
              $img = Image::make($featured_image);
              $img->fit(1024, 768)->save($tmpFilePath.$hardPath.'-b.png');
              $img->fit(600, 600)->save($tmpFilePath.$hardPath.'-s.jpg');
              $inputs['img']= $hardPath;

          }

      if (!empty($request->id)) {

          $conversation = Conversation::find($request->id);
          $conversation->update($inputs);

      }else{

        Conversation::create($inputs);
      }


      return redirect('/admin/conversations');
    }
    public function edit($id){
      $conversation = Conversation::find($id);
      return view('admin.pages.conversationaddedit',compact('conversation'));

    }
    public function delete($id){
      $conversation = Conversation::find($id);
      $conversation->delete();
      return redirect('/admin/conversations');
    }
    public function inscribed($id){
      $inscribed = ConversationInscribed::where('conversations_id','=',$id)->get();

      return view('admin.pages.conversationinscribed',compact('inscribed'));

    }



}
