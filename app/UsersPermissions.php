<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class UsersPermissions extends Model
{
    protected $table = 'users_permissions';
	  public $timestamps = false;

    public function features()
    {
        return $this->belongsTo('App\SubscriptionFeatures','suscriptions_id','suscriptions_id');
    }

    public function subscription()
    {
        return $this->belongsTo('App\Subscription');
    }

}
