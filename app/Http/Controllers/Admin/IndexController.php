<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\City;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\MultiLevel;

class IndexController extends MainAdminController
{

    public function index()
    {
      if (empty(Auth::User())) {
        \Session::flash('flash_message', 'Ingrese su Usuario y Contraseña de Administrador');

        return redirect('/login');
      }
      if(Auth::User()->usertype!="Admin" && Auth::User()->usertype!="Profesor" ){

            //\Session::flash('flash_message', 'Access denied!');

            return redirect('/app/dashboard');

        }
    	if (Auth::check()) {

            return redirect('admin/dashboard');
        }





        return view('admin.index');
    }

	/**
     * Do user login
     * @return $this|\Illuminate\Http\RedirectResponse
     */

    public function postLogin(Request $request)
    {

    //echo bcrypt('123456');
    //exit;


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

       // return array("errors" => 'The email or the password is invalid. Please try again.');
        //return redirect('/admin');
       return redirect('/admin')->withErrors('The email or the password is invalid. Please try again.');

    }

     /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $throttles
     * @return \Illuminate\Http\Response
     */
    protected function handleUserWasAuthenticated(Request $request)
    {

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::user());
        }
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

    public function postRegister(Request $request)
    {

    	$data =  \Input::except(array('_token')) ;

	    $inputs = $request->all();

	    $rule=array(
		        'name' => 'required',
		        'email' => 'required|email|max:75|unique:users',
		        'password' => 'required|min:3|confirmed'
		   		 );

	   	 $validator = \Validator::make($data,$rule);

        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        }


        $user = new User;



		$user->usertype = $inputs['usertype'];
		$user->name = $inputs['name'];
		$user->email = $inputs['email'];
		$user->password= bcrypt($inputs['password']);
		$user->phone= $inputs['phone'];
		$user->city= $inputs['city'];



	    $user->save();


            \Session::flash('flash_message', 'Register successfully....');

            return \Redirect::back();


    }




    public function logout()
    {
        //dd('salir');
      $id = MultiLevel::where('user_id', '=', Auth::user()->id)->first();
      Auth::logout();
      if( count($id) > 0 ) {
        return redirect('/artis');
      }
      return redirect('/');
    }

}
