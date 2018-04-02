<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'training';
	 public $timestamps = false;


   public function tipos()
   {
     return $this->belongsTo('App\Trainingtypes', 'tipo', 'id');

   }
}
