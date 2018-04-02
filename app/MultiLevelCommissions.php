<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultiLevelCommissions extends Model
{
  protected $table = 'multilevel_commissions';

	 public $timestamps = false;

   protected $fillable = ['multilevel_users_id','multinivel_transaction_id','amount','amount_btc','date','status','observacion'];


   public function user()
    {
        return $this->belongsTo('App\User','multilevel_users_id');
    }

    public function transaction(){
      return $this->belongsTo('App\Transaction','multinivel_transaction_id');
    }


}
