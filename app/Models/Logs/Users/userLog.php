<?php

namespace App\Models\Logs\Users;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Transactions;

class userLog extends Model implements AuthenticatableContract,AuthorizableContract,CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;


    protected $table = 'users_log';


    protected $fillable = ['id','name', 'email', 'password','phone','address','city','facebook','twitter','gplus','linkedin','image_icon','referred'];

    protected $hidden = ['password', 'remember_token'];


    public static function getUserInfo($id)
    {
		    return User::find($id);
	  }

    public static function get()
    {
        $id = Auth::user()->id;
        return Transactions::where('user_id','=',$id)->sum('bricks');
    }

    public function permissions()
    {
        return $this->hasMany('App\UsersPermissions');
    }




}
