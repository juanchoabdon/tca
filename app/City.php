<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = ['id','city_name','city_state'];

 
	
	 public $timestamps = false;
    
}
