<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    public $timestamps = false;


    public function status($id)
    {
        //return DB::table('transaccion_status')->where('id','=',$id)->get();
        dd("asdasd");
    }

    public function tipo()
    {
      return $this->belongsTo('App\Brickstipes', 'type', 'id');
    }
    public function estado()
    {
      return $this->belongsTo('App\TransactionStatus', 'status', 'id');
    }
    public function package()
    {
      return $this->belongsTo('App\Bricks', 'packages_id', 'id');
    }
    public function user()
    {
         return $this->belongsTo('App\User','user_id');
    }

}
