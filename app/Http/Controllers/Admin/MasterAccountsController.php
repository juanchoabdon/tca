<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\MasterAccounts;


use Carbon\Carbon;
#0use Request;
use Illuminate\Http\Request;
use Session;

class MasterAccountsController extends MainAdminController
{

  public function index() {
    $accounts = MasterAccounts::all();
    return view('admin.pages.master-accounts.list',compact('accounts'));
  }

  public function addView() {
    return view('admin.pages.master-accounts.add');
  }

  public function editView($id) {
    $account = MasterAccounts::where('id','=', $id)->first();
    return view('admin.pages.master-accounts.edit',   compact('account','id')   );
  }

  public function edit(Request $request) {

    $inputs =  \Input::except(array('_token')) ;
    $rule=array(
          'title' => 'required',
          'description' => 'required',
          'mt4_server' => 'required',
          'mt4_password' => 'required',
          'mt4_login' => 'required'
         );
     $validator = \Validator::make($inputs,$rule);

      if ($validator->fails())
      {
              return redirect()->back()->withErrors($validator->messages());
      }

      $account = MasterAccounts::findOrFail($inputs['id']);
      $account->title = $inputs['title'];
      $account->url = $inputs['link'];
      $account->description = $inputs['description'];
      $account->mt4_server = $inputs['mt4_server'];
      $account->mt4_password = $inputs['mt4_password'];
      $account->mt4_login = $inputs['mt4_login'];
      $account->save();

      \Session::flash('flash_message', 'Cambios Guardados');
      return redirect('/admin/master-accounts');;
  }


  public function create(Request $request) {

    $inputs =  \Input::except(array('_token')) ;
    $rule=array(
          'title' => 'required',
          'description' => 'required',
          'mt4_server' => 'required',
          'mt4_password' => 'required',
          'mt4_login' => 'required'
         );

     $validator = \Validator::make($inputs,$rule);

      if ($validator->fails())
      {
              return redirect()->back()->withErrors($validator->messages());
      }

      $account = new MasterAccounts;
      $account->title = $inputs['title'];
      $account->url = $inputs['link'];
      $account->description = $inputs['description'];
      $account->mt4_server = $inputs['mt4_server'];
      $account->mt4_password = $inputs['mt4_password'];
      $account->mt4_login = $inputs['mt4_login'];
      $account->save();

      \Session::flash('flash_message', 'Cuenta creada');
      return redirect('/admin/master-accounts');;
  }



  public function delete($id){
    $account = MasterAccounts::find($id);
    $account->delete();
    \Session::flash('flash_message', 'Eliminado correctamente');
    return redirect('/admin/master-accounts');
  }




}
