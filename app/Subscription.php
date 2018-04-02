<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'suscriptions';

	  public $timestamps = false;

    public function features()
    {
        return $this->hasMany('App\SubscriptionFeatures','suscriptions_id')->select(array('training_id','type'));
    }

}
