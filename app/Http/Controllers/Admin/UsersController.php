<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\City;
use App\Bricks;
use App\UsersPermissions;
use App\Transaction_log;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use App\Subscription;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Storage;
use App\Models\Estrategias\Estrategias;
use App\Señales;
use App\ServersName;
use App\Training;
use App\Transaction;
use App\PermisosIndividuales;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;
use App\MultiLevel;
use App\SoftTrainings;
use App\Models\Logs\Users\userLog;
use App\Models\Logs\Users\MultiLevelLog;


class UsersController extends MainAdminController
{
	public function __construct()
	{
		$this->middleware('auth');

		parent::__construct();

	}
	public function userslist()    {

		if(Auth::User()->usertype!="Admin"){

			\Session::flash('flash_message', 'Access denied!');

			return redirect('admin/dashboard');

		}

		$allusers = User::all();


		return view('admin.pages.users',compact('allusers'));
	}

	public function addeditUser()    {

		if(Auth::User()->usertype!="Admin"){

			\Session::flash('flash_message', 'Acceso denegado!');

			return redirect('admin/dashboard');

		}

		$subscriptions = Subscription::all();
		$trainings = Training::all();
		$softTrainings = SoftTrainings::all();
		$estrategias = Estrategias::all();
		$señales = Señales::all();
		$servers = ServersName::orderBy('name')->get();
		$features =[];
		$agc = false;


		$city_list = City::orderBy('city_name')->get();

		return view('admin.pages.addeditUser',compact('city_list','agc','subscriptions','trainings','estrategias','señales','features','softTrainings','servers'));
	}

	public function viewcsv(){

		if(Auth::User()->usertype!="Admin"){

			\Session::flash('flash_message', 'Accesso denegado!');

			return redirect('/');

		}
		$productos = Bricks::all();


		return view('admin.pages.csv',compact('productos'));
	}

	public function addcsv(Request $request){



		for ($i=0; $i < count($request->cedula) ; $i++) { // cuuento un campo

			$transaccion = new Transaction;
			$transaccion->user_id = $request->cedula[$i];
			$transaccion->status = "1";
			$transaccion->packages_id = $request->producto[$i];
			$producto = Bricks::where('id','=',$request->producto[$i])->first();
			$transaccion->bricks = $producto->price;
			$transaccion->type = $producto->tipo;
			$transaccion->origen = "Csv";
			$transaccion->comision = $request->comision[$i];
			$transaccion->cantidad = $producto->cantidad;
			$transaccion->titulo = $producto->title." - AÑADIDO MASIVO";
			$transaccion->save();




		}

		\Session::flash('flash_message', 'Cambios guardados');

		return redirect()->back();

	}






	public function addnew(Request $request)
	{




		$data =  \Input::except(array('_token')) ;

		$inputs = $request->all();

		if(!empty($inputs['id'])){
			$user = User::findOrFail($inputs['id']);
			$user_rule_id = 'required';
		}else{
			$user = new User;
			$user_rule_id = 'required|unique:users';
			if (!empty($inputs['cc'])) {
				$user->id = $inputs['cc'];
				$inputs['id'] = $inputs['cc'];
				$nuevo = "1";
			}
		}



		$rule=array(
			'name' => 'required',

			'password' => 'min:6|max:15',
			'image_icon' => 'mimes:jpg,jpeg,gif,png'
		);



		$validator = \Validator::make($data,$rule);

		if ($validator->fails())
		{
			return redirect()->back()->withErrors($validator->messages());
		}






		//User image
		$user_image = $request->file('image_icon');

		if($user_image){

			\File::delete(public_path() .'/upload/members/'.$user->image_icon.'-b.jpg');
			\File::delete(public_path() .'/upload/members/'.$user->image_icon.'-s.jpg');

			$tmpFilePath = 'upload/members/';

			$hardPath =  str_slug($inputs['name'], '-').'-'.md5(time());

			$img = Image::make($user_image);

			$img->fit(376, 250)->save($tmpFilePath.$hardPath.'-b.jpg');
			$img->fit(80, 80)->save($tmpFilePath.$hardPath. '-s.jpg');

			$user->image_icon = $hardPath;

		}

		$user->usertype = $inputs['usertype'];
		$user->name = $inputs['name'];
		$user->email = $inputs['email'];
		$user->phone = $inputs['phone'];
		$user->address = $inputs['address'];
		$user->city= $inputs['city'];

		//artis
		if( !empty( $inputs['mt4_server'] ) ) {
			$user->mt4_server = $inputs['mt4_server'];
		}
		if( !empty( $inputs['mt4_login'] ) ) {
			$user->mt4_login = $inputs['mt4_login'];
		}
		if( !empty( $inputs['mt4_password'] ) ) {
			$user->mt4_password = $inputs['mt4_password'];
		}
		if( !empty( $inputs['btc_address'] ) ) {
			$user->btc_address = $inputs['btc_address'];
		}



		if($inputs['password'])
		{
			$user->password= bcrypt($inputs['password']);
		}
		$user->save();

		$id = $inputs['id'];

		PermisosIndividuales::where('user_id','=',$id)->delete();



		if($request->trainings){
			foreach ($request->trainings as $training) {
				$features = new PermisosIndividuales();
				$features->user_id = $id;
				$features->product_id = $training;
				$features->type="training";

				$features->save();
			}
		}


		if($request->estrategias){
			foreach ($request->estrategias as $estrategia) {
				$features = new PermisosIndividuales();
				$features->user_id = $id;
				$features->product_id = $estrategia;
				$features->type="estrategia";
				$features->save();
			}
		}


		if($request->senales){
			foreach ($request->senales as $senal) {
				$features = new PermisosIndividuales();
				$features->user_id = $id;
				$features->product_id = $senal;
				$features->type="senal";
				$features->save();
			}
		}
		if ($request->podcast) {
			$features = new PermisosIndividuales();
			$features->user_id = $id;
			$features->product_id = '1';
			$features->type="podcast";
			$features->save();
		}







		if ($inputs['subscription']) {
			$user_id = $user->id;
			UsersPermissions::where('user_id','=',$user_id)->delete();
			$subscription = new UsersPermissions();
			$subscription->user_id = $user_id;
			$subscription->subscription_id =  $inputs['subscription'];
			$subscription->save();



		}




		\Session::flash('flash_message', 'Cambios Guardados');
		return \Redirect::back();



	}

	public function editUser($id)
	{
		if(Auth::User()->usertype!="Admin") {

			\Session::flash('flash_message', 'Accesso denegado!');

			return redirect('admin/dashboard');

		}
		$trainings = Training::all();
		$estrategias = Estrategias::all();
		$señales = Señales::all();
		$softTrainings = SoftTrainings::all();
		$servers = ServersName::orderBy('name')->get();
		$features =  PermisosIndividuales::where('user_id','=',$id)->get();

		$agc = MultiLevel::where('user_id', '=', $id)->first();
		if(count($agc) === 1) {
			$agc_status = $agc->status;
			$agc = true;
		} else {
			$agc = false;
		}

		$user = User::findOrFail($id);

		$subscriptions = Subscription::all();

		$suscription = UsersPermissions::where('user_id','=',$id)->first();


		$transacciones = Transaction::where('user_id','=',$user->id)->where('status','=','1')->where('type','!=','1')->get();

		//dd($transacciones);
		$city_list = City::orderBy('city_name')->get();

		return view('admin.pages.addeditUser',compact('user', 'agc', 'agc_status', 'city_list','ladrillos','transacciones','subscriptions','suscription','estrategias','señales','trainings','features','id','servers','softTrainings'));

	}


	public function transacciones(){
		$transacciones = Transaction::paginate(10);
		return view('admin.pages.transacciones',compact('transacciones'));
	}


	public function deletetransaccion($id){

		if(Auth::User()->usertype!="Admin"){
			\Session::flash('flash_message', 'Access denied!');
			return redirect('/');
		}
		$transaccion = Transaction::findOrFail($id);
		$log = new Transaction_log;
		$datos =  $transaccion->toArray();
		$log->fill($datos);
		$log->eliminado_por = Auth::User()->id;
		$log->save();
		$transaccion->delete();
		\Session::flash('flash_message', 'Eliminado');
		return redirect()->back();

	}

	public function delete($id)
	{

		if(Auth::User()->usertype!="Admin"){

			\Session::flash('flash_message', 'Access denied!');

			return redirect('admin/dashboard');

		}

		$user = User::findOrFail($id);
		//dd($user);
		$userLog = new userLog();
		$userLog->fill($user->toArray());
		$userLog->save();

		\File::delete(public_path() .'/upload/members/'.$user->image_icon.'-b.jpg');
		\File::delete(public_path() .'/upload/members/'.$user->image_icon.'-s.jpg');
		$user->delete();

		$multilevel = MultiLevel::where('user_id','=',$id)->first();
		$multilevelLog = new MultiLevelLog();
		$multilevelLog->fill($multilevel->toArray());
		$multilevelLog->save();

		$multilevel->delete();



		\Session::flash('flash_message', 'Eliminado');

		return redirect()->back();

	}



	public function changeAgcStatus($id)
	{

		$user = MultiLevel::where('user_id', '=', $id)->first();
		$user->status = +!($user->status);
		$user->save();

		\Session::flash('flash_message', 'Estatus Artis Global club cambiado!');

		return redirect()->back();

	}

	public function changeAutotradingStatus($id)
	{

		$user = User::where('id', '=', $id)->first();
		$user->autotrading = +!($user->autotrading);
		$user->save();

		\Session::flash('flash_message', 'Estatus de autotrading cambiado!');

		return redirect()->back();

	}




}
