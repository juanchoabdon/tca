<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use App\User;
use App\City;
use App\Properties;
use App\Testimonials;
use App\Subscriber;
use App\Subscription;
use App\Partners;
use App\Transaction;
use App\TrainingContent;
use App\Training;
use App\Estrategias;
use App\EstrategiasContent;
use App\SubscriptionFeatures;
use App\Señales;
use App\Articulos;
use App\Conversation;
use App\ConversationInscribed;
use App\MultiLevel;
use App\Funciones;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;
use App\Slider;

class IndexController extends Controller
{


    public function index()
    {
      $sliders = Slider::all();
      $blogs = Articulos::orderBy('id','desc')->take(3)->get();
      $testimonials = Testimonials::orderBy('id', 'desc')->get();

      return view('pages.index',compact('sliders','blogs' , 'testimonials'));
    }


    public function artisLanding()
    {
      return view('pages.artis_landing');
    }

    public function subscribe(Request $request)
    {

    	$data =  \Input::except(array('_token')) ;

	    $inputs = $request->all();

	    $rule=array(
		        'email' => 'required|email|max:75'
		   		 );

	   	 $validator = \Validator::make($data,$rule);

        if ($validator->fails())
        {
                echo '<p style="color: #db2424;font-size: 20px;">The email field is required.</p>';
                exit;
        }

    	$subscriber = new Subscriber;

    	$subscriber->email = $inputs['email'];
    	$subscriber->ip = $_SERVER['REMOTE_ADDR'];


	    $subscriber->save();

	    echo '<p style="color: #189e26;font-size: 20px;">Gracias por suscribirse</p>';
        exit;

    }

	/**
     * If application is already installed.
     *
     * @return bool
     */
    public function alreadyInstalled()
    {
        return file_exists(storage_path('installed'));
    }


	public function aboutus_page()
    {
        return view('pages.about');
    }

    public function credits_page()
      {
          return view('pages.credits');
      }

    public function profile()
    {
        return view('pages.profile');
    }

    public function postProfile()
    {
        return view('pages.profile');
    }



    public function transactions()
    {
      $transacciones = Transaction::where('origen','!=','Csv')->where('status','!=','1')->get();
      foreach ($transacciones as $transaccion) {
        $url = "https://api.payulatam.com/reports-api/4.0/service.cgi";
        $data_json='{
       "test": false,"language": "en","command": "ORDER_DETAIL_BY_REFERENCE_CODE","merchant": {
          "apiLogin": "T102JZRA926hzg9",
          "apiKey": "ZOMhRfJc08dw0aG59J2gDI7uM4"
       },
       "details": {  "referenceCode": "'.$transaccion->id.'"   } }';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response  = curl_exec($ch);
        curl_close($ch);

        $obj = (json_decode($response));


        //dd(($obj->result->payload[0]->status)); // estado de orden
        if(!empty($obj->result)){
        $respuesta = ($obj->result->payload[0]->transactions[0]->transactionResponse->state);
        //echo $respuesta." ".$transaccion->id. "<br>";

        if ($respuesta=="PENDING") {
          $transaccion->status = "0";
        }
        if ($respuesta=="CAPTURING_DATA") {
          $transaccion->status = "0";
        }

        if ($respuesta=="APPROVED") {
          $transaccion->status = "1";
        }
        if ($respuesta=="DECLINED") {
          $transaccion->status = "2";
        }
        if ($respuesta=="ERROR") {
          $transaccion->status = "3";
        }
        if ($respuesta=="EXPIRED") {
          $transaccion->status = "4";
        }


      }else{
        $transaccion->status = "3";
      }
      if (empty($transaccion->status)) {
        $transaccion->status = "0";
      }


      $transaccion->save();

      }


        $transacciones = Transaction::where('user_id','=',Auth::user()->id)->get();
        return view('pages.transactions')->with('transacciones',$transacciones);
    }


    public function careers_with_page()
    {
        return view('pages.careers');
    }

    public function terms_conditions_page()
    {
        return view('pages.terms_conditions');
    }

    public function privacy_policy_page()
    {
        return view('pages.privacy');
    }

    public function contact_us_page()
    {
        return view('pages.contact');
    }

    public function contact_artis_page()
    {
        return view('pages.contact_artis');
    }

    public function contact_us_sendemail(Request $request)
    {

    	$data =  \Input::except(array('_token')) ;

	    $inputs = $request->all();

	    $rule=array(
		        'name' => 'required',
				'email' => 'required|email',
		        'user_message' => 'required'
		   		 );

	   	 $validator = \Validator::make($data,$rule);

        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        }



        Mail::send('emails.contact',
        array(
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'user_message' => $inputs['user_message']
        ), function($message)
	    {
	        $message->from(getcong('site_email'));
	        $message->to(getcong('site_email'), getcong('site_name'))->subject(getcong('site_name').' Contact');
	    });



 		 return redirect()->back()->with('flash_message', 'Gracias por contactarnos');
    }


    /**
     * Do user login
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function login()
    {
      if (Auth::user()) {
        if(Auth::user()->usertype=='Admin' || Auth::user()->usertype=='Profesor') {
          return redirect('/admin/dashboard');
        }
        if(Auth::user()->usertype=='Estudiante'){
          return redirect('/app/dashboard');
        }
      }
        return view('pages.login');
    }


    public function login_artis()
    {
      if (Auth::user()) {
        if(Auth::user()->usertype=='Admin' || Auth::user()->usertype=='Profesor') {
          return redirect('/admin/dashboard');
        }
        if(Auth::user()->usertype=='Estudiante'){
          return redirect('/app/dashboard');
        }
      }
        return view('pages.login_artis');
    }


    public function postLogin(Request $request)
    {


      $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);


        $credentials = $request->only('email', 'password');



         if (Auth::attempt($credentials, $request->has('remember'))) {

            if(Auth::user()->status=='0'){
                \Auth::logout();
                return redirect('/login')->withErrors('Your account is not activated yet, please check your email.');
            }

            //return $thello->json()

            return $this->handleUserWasAuthenticated($request);
        }


       return redirect()->back()->withErrors('Credenciales incorrectas.');

    }


    protected function handleUserWasAuthenticated(Request $request)
    {

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::user());
        }

        if(Auth::user()->usertype=='Admin' || Auth::user()->usertype=='Profesor') {
          return redirect('/admin/dashboard');
        }
        if(Auth::user()->usertype=='Estudiante'){
          return redirect('/app/dashboard');
        }



    }

    public function register()
    {
    	if (Auth::check()) {

            return redirect('admin/dashboard');
        }

        $city_list = City::where('status','1')->orderBy('city_name')->get();

        return view('pages.register',compact('city_list'));
    }

    public function postRegister(Request $request)
    {

      $request = $request->except('_token');




	    $rule=array(
		        'name' => 'required',
            'id' => 'required|unique:users',
		        'email' => 'required|email|max:75|unique:users'
		   		 );

	   	 $validator = \Validator::make($request,$rule);

        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        }

        //creo el usuario primero.
    $user = new User;
    $user->fill($request);
    $user->address = null;
    $user->city = null;
    $user->id = $request['id'];
    $user->usertype= "Estudiante";
    $user->password = bcrypt($request['password']);
    $user->status ="1";
    $user->save();


    //creo el usuario normal.

    if ($request['padre']) {
      $multilevel = new MultiLevel();
      $multilevel->user_id = $request['id'];
      $multilevel->parent_id = null;
      $multilevel->added_by = $request['padre'];
      $multilevel->status = "0";
      $multilevel->save();
      //dd($multilevel);
      $root = MultiLevel::where('user_id','=',$request['hijo'])->first();
      $multilevel->makeChildOf($root);
    }

    $token = Funciones::getToken();




    if($request['padre']) {

          $credentials = array(
                'password' => $request['password'],
    		        'email' => $request['email']
    		   		 );

               if (Auth::attempt($credentials, true ) ) {

                  if(Auth::user()->status=='0') {
                      \Auth::logout();
                      return redirect('/login-artis')->withErrors('Your account is not activated yet, please check your email.');
                  }

                  //return $thello->json()

                  return redirect('/app');
              }
              return redirect('/login-artis')->withErrors('Credenciales incorrectas.');
      //\Session::flash('flash_message', 'Bienvenido! te enviaremos un correo cuando estemos al aire...');
    } else {
      \Session::flash('flash_message', 'Registro con exito');
    }

    return \Redirect::back();


    }

		public function blog()
		{
					$articulos = Articulos::orderBy('id','desc')->paginate(10);
  				return view('pages.blog')->with('articulos',$articulos);
		}

    public function article($id)
		{

					$articulo= Articulos::find($id);
  				return view('pages.article')->with('articulo',$articulo);
		}

    public function conversations(){
      $conversations = Conversation::all();
      return view('pages.conversations',compact('conversations'));
    }
    public function conversation($id){

      if (!empty(Auth::user()->id)) {
        $suscribe = ConversationInscribed::where('conversations_id','=',$id)->where('identification','=',Auth::user()->id)->first();
      }else{
        $suscribe = null;
      }

      $conversation = Conversation::find($id);
      return view('pages.conversation',compact('conversation','suscribe'));
    }

    public function conversationsuscribe($id){

      $suscribe = new ConversationInscribed;
      $suscribe->identification = Auth::user()->id;
      $suscribe->conversations_id = $id;
      $suscribe->save();
      \Session::flash('flash_message', 'Inscrito Correctamente');
      return \Redirect::back();
    }
    public function conversationsuscribecancel($id){
      $suscribe = ConversationInscribed::where('id','=',$id)->where('identification','=',Auth::user()->id);
      $suscribe->delete();
      \Session::flash('flash_message', 'Cancelado');
      return \Redirect::back();
    }

    public function memberships()
    {
      $memberships = Subscription::where('id','!=','14')->get();
      return view('pages.memberships',compact('memberships'));
    }

    public function courses()
    {

      $trainings = Training::all();
      foreach ($trainings as $training) {
        $entramientoMembresia = SubscriptionFeatures::where('training_id','=',$training->id)->where('type','=','training')->first(); //condicion de que si un entrenamiento esta en una membresia no salga
        if (!empty($entramientoMembresia)) {
          $excluidos[]=$training->id;
        }

      }

      $trainings= Training::whereNotIn('id', $excluidos)->get();


      return view('pages.courses',compact('trainings'));
    }

    public function course($id)
    {
      $course= Training::find($id);
      $contents = TrainingContent::where('training_id','=',$id)->get();
      return view('pages.course_content', compact('contents'))->with('course',$course);
    }


    public function strategies()
    {
      $strategies = Estrategias::all();
      return view('pages.strategies',compact('strategies'));
    }


    public function strategie($id)
    {
      $strategie = Estrategias::find($id);
      $contents = EstrategiasContent::where('estrategias_id','=',$id)->get();
      return view('pages.strategie', compact('contents'))->with('strategie',$strategie);
    }


    public function alerts()
    {
      $alerts = Señales::all();
      return view('pages.alerts', compact('alerts'));
    }


    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function confirm($code)
    {

        $user = User::where('confirmation_code',$code)->first();

 		$user->status = '1';

 		$user->save();

 		\Session::flash('flash_message', 'Confirmación correcta...');

        return view('pages.login');
    }

    public function verificar(){


    $transacciones = Transaction::where('status','!=','1')->where('status','!=','4')->get();
    foreach ($transacciones as $transaccion) {
      $url = "https://api.payulatam.com/reports-api/4.0/service.cgi";
      $data_json='{
     "test": false,"language": "en","command": "ORDER_DETAIL_BY_REFERENCE_CODE","merchant": {
        "apiLogin": "T102JZRA926hzg9",
        "apiKey": "ZOMhRfJc08dw0aG59J2gDI7uM4"
     },
     "details": {  "referenceCode": "'.$transaccion->id.'"   } }';
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json'));
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response  = curl_exec($ch);
      curl_close($ch);

      $obj = (json_decode($response));


      //dd(($obj->result->payload[0]->status)); // estado de orden
      if(!empty($obj->result)){
      $respuesta = ($obj->result->payload[0]->transactions[0]->transactionResponse->state);
      //echo $respuesta." ".$transaccion->id. "<br>";

      if ($respuesta=="PENDING") {
        $transaccion->status = "0";
      }
      if ($respuesta=="CAPTURING_DATA") {
        $transaccion->status = "0";
      }

      if ($respuesta=="APPROVED") {
        $transaccion->status = "1";
      }
      if ($respuesta=="DECLINED") {
        $transaccion->status = "2";
      }
      if ($respuesta=="ERROR") {
        $transaccion->status = "3";
      }
      if ($respuesta=="EXPIRED") {
        $transaccion->status = "4";
      }


    }else{
      $transaccion->status = "3";
    }
    if (empty($transaccion->status)) {
      $transaccion->status = "0";
    }


    $transaccion->save();

    }

    }

    public function addTeam($id_padre,$hijo){

      /*if (Auth::check()) {

            return redirect('admin/dashboard');
        }*/

        $id = MultiLevel::where('user_id', '=', $hijo)->first()->id;

        $padre = MultiLevel::where('id', '=', $id)->first()->user->id;

        $parent = User::where('id', '=', $padre)->first();


        $tree = MultiLevel::where('id', '=', $id)->first()->getDescendantsAndSelf()->toHierarchy();

        $tree = json_decode($tree, true);

        function parse($data,$padre) {
          $temp = [];
          foreach ($data as $id => $v) {
            unset($v['parent_id']);
            unset($v['id']);
            unset($v['lft']);
            unset($v['rght']);
            unset($v['depth']);
            unset($v['level']);
            //$array0 = array("text" => array ("name" => User::find($v['user_id'])->name));
            if($v['status'] == 1) {
              $html = '<div class="well" style="background-color:#424242;color:white;text-decoration: none;">';
            } else {
              $html = '<div class="well" style="background-color:#66181A;color:white;text-decoration: none;">';
            }

            $html .= '<center>';
            $html .=  User::find($v['user_id'])->name;
            if (count($v['children'])< 3) {
              $html .= '<a target="_blank" href="/add/'.$padre.'/'.$v['user_id'].'"';
              $html .= '<br><p style="color: #FFD700;">Añadir</p>';
              $html .= '</a>';
            }


            $html .= '</center>'>

            $html .= '</div>';

            $array0 = array("innerHTML" => $html);

            //$array0 = array_merge($array0,$array1);
            $v = array_merge($array0, $v);

            unset($v['user_id']);


            if (count($v['children'])) {
              $v['children'] = parse($v['children'],$padre);
            }else{
              unset($v['children']);
            }
            $temp[] = $v;
          }
          return $temp;
        }

        //$tree = json_encode(parse($tree,$padre));
        $u = $tree[$id];
        if( count($u['children']) >= 3 ) {
           return redirect('/404');
        }

        $padre  = User::find($id_padre);
        $hijo =  User::find($hijo);

        return view('pages.register_multinivel',compact('padre','hijo'));


    }


    public function appLogin(Request $request){

      $this->validate($request, ['email' => 'required|email', 'password' => 'required']);
        $credentials = $request->only('email', 'password');

         if (Auth::attempt($credentials, $request->has('remember'))) {

            if(Auth::user()->status=='0'){
                dd(Auth::user()->status=='0');
                \Auth::logout();
                return response()->json(['login' => False,'message' => 'Tu cuenta no ha sido activada aun, revisa tu e-mail']);

            }else {
                 $user = User::where('email', '=', $request->email)->first();
                 $multilevel_user = MultiLevel::where('user_id', '=', $user->id)->first();

                 if(empty($multilevel_user)){
                     return response()->json(['login' => False,'message' => 'No eres un usuario multinivel']);

                 }else{
                     if($multilevel_user->status==0){
                         return response()->json(['login' => True,'multilevel_status' => 0]);
                     }else {
                         return response()->json(['login' => True,'multileve_status' => 1]);
                     }
                 }
            }
        }
           return response()->json(['login' => False,'message' => 'Credenciales incorrectas']);

    }

    public function appUpdateProfile(Request $request)
    {

        $user = User::findOrFail($request->id);
        $inputs = $request->all();

        $user->mt4_server = $inputs['mt4_server'];
        $user->mt4_login = $inputs['mt4_login'];
        $user->mt4_password = $inputs['mt4_password'];
        $user->btc_address = $inputs['btc_address'];
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->phone = $inputs['phone'];
        $user->address = $inputs['address'];
        $user->city= $inputs['city'];
        $user->save();

        $user = User::findOrFail($request->id);

        return response()->json([
        "message" => 'Cuenta Actualizada',
        "mt4_server" => $inputs['mt4_server'],
        "mt4_login" => $inputs['mt4_login'],
        "mt4_password" => $inputs['mt4_password'],
        "btc_address" => $inputs['btc_address'],
        "id" => $user->id,
        "name" => $inputs['name'],
        "email" => $inputs['email'],
        "phone" => $inputs['phone'],
        "address" => $inputs['address'],
        "city"=> $inputs['city']
    ]);

    }



    public function appTransactions(Request $request)
    {
      $transacciones = Transaction::where('user_id','=',$request->id)->get();
      return($transacciones);
    }


   public function appTeam(Request $request)
   {
       $tree = MultiLevel::where('user_id','=',$request->id)->first()->getDescendantsAndSelf()->toHierarchy();
        return($tree);
   }

   public function appLevel(Request $request)
   {
       $user = MultiLevel::where('user_id','=',$request->id)->first();
        $level = MultilevelLevels::where('id','=',$user->level)->first();
        return($level);
    }
}
