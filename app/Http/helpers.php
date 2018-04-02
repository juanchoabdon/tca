<?php
use App\Settings;
use App\User;
use App\Properties;
use App\Types;
use App\MultiLevel;
use App\MultilevelLevels;

if (! function_exists('getcong')) {

    function getcong($key)
    {

        $settings = Settings::findOrFail('1');

        return $settings->$key;
    }
}



if (! function_exists('getAgcStatus')) {

    function getAgcStatus($id)
    {

        $agc = MultiLevel::where('user_id', '=', $id)->first();
        if(count($agc) === 1) {
          return $agc;
        }
        return false;
    }
}


if (! function_exists('getUserLevel')) {

    function getUserLevel($id)
    {
        $level = MultiLevel::where('user_id','=',$id)->pluck('level');
        $level = MultilevelLevels::where("id","=",$level)->pluck('nombre');
        return $level;
    }
}



if (! function_exists('getconfiguracion')) {

    function getconfiguracion($key)
    {

        $settings = Settings::findOrFail('1');

        return $settings->$key;
    }
}


if (!function_exists('classActivePath')) {
    function classActivePath($path)
    {
        $path = explode('.', $path);
        $segment = 2;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return ' active';
    }
}

if (!function_exists('classActivePathPublic')) {
    function classActivePathPublic($path)
    {
        $path = explode('.', $path);
        $segment = 1;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return ' active';
    }
}

if (! function_exists('getUserInfo')) {
	function getUserInfo($id)
	{
		return User::find($id);
	}
}

if (! function_exists('countPropertyType')) {
	function countPropertyType($type_id)
	{
		return Properties::where('property_type',$type_id)->count();
	}
}

if (! function_exists('PropertyTypeName')) {
	function getPropertyTypeName($id)
	{
		return Types::find($id);
	}
}

if (! function_exists('getUserBricks')) {
    function getUserBricks($id)
    {

      $id = Auth::user()->id;

        return DB::table('transactions')->where('user_id','=',$id)->where('status','=','1')->where('type','=','1')->sum('cantidad');
        //
    }
}


if (! function_exists('primer_parrafo')) {
   function primer_parrafo($texto){
    $contenido=explode(".",$texto);
   return $contenido[0].".";
  }
}
if (! function_exists('cortar_string')) {
function cortar_string ($string, $largo) {
   $marca = "<!--corte-->";

   if (strlen($string) > $largo) {

       $string = wordwrap($string, $largo, $marca);
       $string = explode($marca, $string);
       $string = $string[0];
   }
   return $string;

}
}
if (! function_exists('money')) {
function money ($number) {
  return   number_format($number, 0, '', '.');
}
}
