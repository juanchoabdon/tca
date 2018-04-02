<?php

namespace App\Http\Controllers\App;

use Auth;
use App\User;
use App\City;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Funciones;
use App\Subscription;
use App\Transaction;
use App\MultiLevel;
use App\MultilevelLevels;
use App\ServersName;

class IndexController extends MainAdminController
{

    public function index()
    {
      if (empty(Auth::User())) {
        \Session::flash('flash_message', 'Ingrese su Usuario y Contraseña');
        return redirect('/login');
      }

    	if (Auth::check()) {
            return redirect('app/dashboard',compact('agc'));
        }


    }


    public function postLogin(Request $request)
    {
        
      $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
         if (Auth::attempt($credentials, $request->has('remember'))) {
            if(Auth::user()->usertype=='banned'){
                \Auth::logout();
                return array("errors" => 'You account has been banned!');
            }
            return $this->handleUserWasAuthenticated($request);
        }
       return redirect('/admin')->withErrors('The email or the password is invalid. Please try again.');

    }

    protected function handleUserWasAuthenticated(Request $request)
    {
        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::user());
        }
        dd("asd");
        return redirect('admin/dashboard');
    }

    public function register()
    {
    	if (Auth::check()) {
            return redirect('admin/dashboard');
        }
        $city_list = City::orderBy('city_name')->get();
        return view('admin.register',compact('city_list'));
    }

    public function dashboard(){

        $agc = MultiLevel::where('user_id','=',Auth::user()->id);

        if(empty($agc)){
            $agc = false;
        }else{
            $agc = true;
        }

      return view('app.pages.dashboard',compact('agc'));

    }

    public function profile()
    {
        $level = MultiLevel::where('user_id','=',Auth::user()->id)->pluck('level');
        $level = MultilevelLevels::where("id","=",$level)->pluck('nombre');
        $servers = ServersName::orderBy('name')->get();
        return view('app.pages.profile',compact('servers','level'));
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function buy($id){

      #obtiene el precio de un dolar al  bitcoin de hoy
      $dolar = Funciones::getCurrentPriceBTC();

      $suscription = Subscription::find('15');

      $cost_btc = $suscription->cost * $dolar;
      $wallet = Funciones::getWallet();

      #crea la transaccion.
      $transaction = new Transaction();
      $transaction->user_id = Auth::user()->id;
      $transaction->type = "5";
      $transaction->product_id = "15";
      $transaction->titulo = "Suscripcion a agc";
      $transaction->price = $suscription->cost;
      $transaction->amount_in_btc = $cost_btc;
      $transaction->address = $wallet;
      $transaction->save();







      return view('app.pages.buy',compact('suscription','cost_btc','wallet'));





    }

}
