<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Transaction_log extends Model
{
    protected $table = 'transactions_log';
    public $timestamps = false;


    protected $fillable = ['id', 'user_id', 'status', 'bricks', 'date', 'type','origen','packages_id','comision','cantidad','titulo'];


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

}
