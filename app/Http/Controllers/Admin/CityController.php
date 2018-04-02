<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\City;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;

class CityController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
		
		 parent::__construct();
         
    }
    public function citylist()
    {  
    	$allcities = City::orderBy('id')->get();
		  
        return view('admin.pages.cities',compact('allcities'));
    } 
	
	 public function addeditcity()    { 
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
          
        return view('admin.pages.addeditcity');
    }
    
    public function addnew(Request $request)
    { 
    	
    	$data =  \Input::except(array('_token')) ;
	    
	    $inputs = $request->all();
	    
	    $rule=array(
		        'city_name' => 'required'
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
	      
		if(!empty($inputs['id'])){
           
            $city = City::findOrFail($inputs['id']);

        }else{

            $city = new City;

        }
		
		  
		 
		$city->city_name = $inputs['city_name'];		 
		  
		 
	    $city->save();
		
		if(!empty($inputs['id'])){

            \Session::flash('flash_message', 'Changes Saved');

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', 'Added');

            return \Redirect::back();

        }		     
        
         
    }     
    
    public function editcity($id)    
    {     
    	  if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }		
    		     
          $city = City::findOrFail($id);
           
          return view('admin.pages.addeditcity',compact('city'));
        
    }	 
    
    public function delete($id)
    {
    	
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
    		
        $city = City::findOrFail($id);
        
		$city->delete();
		
        \Session::flash('flash_message', 'Deleted');

        return redirect()->back();

    }
    
    public function status($id)
    { 
        $city = City::findOrFail($id);
       
       	if(Auth::User()->usertype!="Admin")
       	{

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
       
		if($city->status==1)
		{
			$city->status='0';		 
	   		$city->save();
	   		
	   		\Session::flash('flash_message', 'Unpublished');
		}
		else
		{
			$city->status='1';		 
	   		$city->save();
	   		
	   		\Session::flash('flash_message', 'Published');
		}
		 
        return redirect()->back();

    }
      
    	
}
