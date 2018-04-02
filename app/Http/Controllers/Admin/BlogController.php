<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Articulos;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $articulos = Articulos::all();
        return view('admin.pages.blog')->with("articulos",$articulos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = DB::table('article_category')->get();
        return view('admin.pages.addarticle')->with('categorias',$categorias);
    }

    public function edit($id)
    {
        $articulo = Articulos::find($id);
        $categorias = DB::table('article_category')->get();
        return view('admin.pages.addarticle')->with('categorias',$categorias)->with('articulo',$articulo);
    }


    public function store(Request $request)
    {
       if (empty($request->id)) {
        $articulo = new articulos();
        $alert="Articulo Añadido";
      }else{
        $articulo = Articulos::find($request->id);
        $alert="Articulo Actualizado";
      }

        $articulo->titulo = $request->titulo;
        $articulo->contenido = $request->contenido;
        $articulo->autor = Auth::user()->name;
        $articulo->categoria = $request->categoria;

        $featured_image = $request->file('featured_image');

      if($featured_image){
      \File::delete(public_path() .'/upload/blogs/'.$articulo->featured_image.'-b.jpg');
      \File::delete(public_path() .'/upload/blogs/'.$articulo->featured_image.'-s.jpg');
        $tmpFilePath = 'upload/blogs/';
        $hardPath =  str_slug($articulo->titulo, '-').'-'.md5(rand(0,99999));
        $img = Image::make($featured_image);
        $img->fit(1024, 720)->save($tmpFilePath.$hardPath.'-b.jpg');
        $img->fit(358, 238)->save($tmpFilePath.$hardPath.'-s.jpg');
        $articulo->img = $hardPath;

        }






        $articulo->save();
        \Session::flash('flash_message', $alert);
        return \Redirect::back();
    }




    public function destroy($id)
    {
        //
    }
}
