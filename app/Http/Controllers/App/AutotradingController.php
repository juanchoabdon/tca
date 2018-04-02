<?php

namespace App\Http\Controllers\App;

use Auth;
use Session;
use App\User;
use Mail;
use App\AutotradingLog;
use App\Types;
use Carbon\Carbon;
use App\ServersName;
use App\MasterAccounts;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class AutotradingController extends MainAdminController
{

    public function index()
    {

        if (empty(Auth::User())) {
          \Session::flash('flash_message', 'Ingrese su Usuario y Contraseña');
          return redirect('/login');
        }

         $user = User::findOrFail(Auth::user()->id);
         $accounts = MasterAccounts::all();
         $master_account = MasterAccounts::where("mt4_login","=",$user->master_account_id)->get();
         $servers = ServersName::orderBy('name')->get();

        return view('app.pages.autotrading',compact('user','accounts','master_account','servers'));
    }


    public function settings()
    {
        if (empty(Auth::User())) {
          \Session::flash('flash_message', 'Ingrese su Usuario y Contraseña');
          return redirect('/login');
        }

         $user = User::findOrFail(Auth::user()->id);
         $accounts = MasterAccounts::all();
         $master_account = MasterAccounts::where("mt4_login","=",$user->master_account_id)->get();
         $servers = ServersName::orderBy('name')->get();
        return view('app.pages.autotradingsettings',compact('user','accounts','master_account','servers'));
    }


    public function subscribe($mt4_login)
    {
        if (empty(Auth::User())) {
          \Session::flash('flash_message', 'Ingrese su Usuario y Contraseña');
          return redirect('/login');
        }

        $master = MasterAccounts::where("mt4_login","=",$mt4_login)->get();
        $user = User::findOrFail(Auth::user()->id);

        if($user->master_account_id==$mt4_login){
            \Session::flash('info_message', 'Ya estabas suscrito a '.$master[0]->description);
            return redirect()->back();
        }

        $user->master_account_id = $mt4_login;
        $user->save();

        \Session::flash('flash_message', 'Te has suscrito a '.$master[0]->title);
        return redirect()->back();


    }

    public function unsubscribe()
    {
        if (empty(Auth::User())) {
          \Session::flash('flash_message', 'Ingrese su Usuario y Contraseña');
          return redirect('/login');
        }

        $user = User::findOrFail(Auth::user()->id);
        $master =  MasterAccounts::where("mt4_login","=",$user->master_account_id)->get();

        $user->master_account_id = 0;
        $user->save();

        \Session::flash('flash_message', 'Te has dado de baja de '.$master[0]->title);
        return redirect()->back();


    }

    public function account()
    {

    if (empty(Auth::User())) {
      \Session::flash('flash_message', 'Ingrese su Usuario y Contraseña');
      return redirect('/login');
    }

    $user = User::findOrFail(Auth::user()->id);
    $accounts = MasterAccounts::all();
    $master_account = MasterAccounts::where("mt4_login","=",$user->master_account_id)->get();
    $servers = ServersName::orderBy('name')->get();

    return view('app.pages.autotradingaccount',compact('user','accounts','master_account','servers'));
    }

    public function updateAcount(Request $request)
    {

    if (empty(Auth::User())) {
      \Session::flash('flash_message', 'Ingrese su Usuario y Contraseña');
      return redirect('/login');
    }

    $user = User::findOrFail(Auth::user()->id);
    $user->mt4_server = $request->mt4_server;
    $user->mt4_password = $request->mt4_password;
    $user->mt4_login = $request->mt4_login;
    $user->save();

    \Session::flash('flash_message', 'Cuenta actualizada');
    return redirect()->back();
    }



    public function configuration(Request $request)
    {
        if (empty(Auth::User())) {
          \Session::flash('flash_message', 'Ingrese su Usuario y Contraseña');
          return redirect('/login');
        }

        $user = User::findOrFail(Auth::user()->id);

        if((!($user->fixed_size==$request->fixed_input))||(!($user->capital_to_risk == $request->capital_to_risk))){
            $user->autotrading_settings_updated = 1;
        }
        $user->mirror_management_type = 1;
        $user->fixed_size = $request->fixed_input;
        $user->capital_to_risk = $request->capital_to_risk;
        $user->save();

        $autotrading_log = new AutotradingLog();
        $autotrading_log->mirror_management_type = 1;
        $autotrading_log->user_id = $user->id;
        $autotrading_log->fixed_size = $request->fixed_input;
        $autotrading_log->capital_to_risk = $request->capital_to_risk;
        $autotrading_log->save();

        \Session::flash('flash_message', 'Cartera actualizada');
        return redirect()->back();

        // if($request->money_option==0){
        //
        //     \Session::flash('error_message', 'Debes seleccionar un campo');
        //     return redirect()->back();
        // }
        // if($request->money_option==1){
        //     $user->mirror_management_type = 1;
        //     $user->fixed_size= $request->fixed_input;
        // }
        // if($request->money_option==2){
        //     $user->mirror_management_type =0;
        //     $user->amount_to_mirror = $request->risk_input;
        // }
    }

    public function changeAutotradingStatus()
    {

        if (empty(Auth::User())) {
          \Session::flash('flash_message', 'Ingrese su Usuario y Contraseña');
          return redirect('/login');
        }

        $user = User::where('id', '=', Auth::user()->id )->first();
        if($user->master_account_id<1&&$user->autotrading==0){

            \Session::flash('error_message', 'Para activar el autotrading tienes que estar suscrito a una estrategia');
            return redirect()->back();

        }else{

            if((empty($user->mt4_server)||empty($user->mt4_password)||empty($user->mt4_login))&&$user->master_account_id<1)
            {
                \Session::flash('error_message', 'Para activar el autotrading tienes completar los datos de tu cuenta');
                return redirect()->back();

            }else{
                $user->autotrading = +!($user->autotrading);
                $user->save();

                if($user->autotrading==1){
                   //  $text = 'autotrading activado';
                   //  Mail::send('app.emails.autotrading', $text ,function ($message) use ($text)  {
                   //
                   //    $message->to('danielmurte1@gmail.com','AGC');
                   //    $message->subject('Autotrading activado');
                   // });

                    \Session::flash('flash_message', 'El autotrading ha sido activado!');
                }else {

                    \Session::flash('flash_message', 'El autotrading ha sido desactivado!');
                }

                return redirect()->back();
            }
        }


        }

    }
