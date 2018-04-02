<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    protected $table = 'property_types';

    protected $fillable = ['types','slug'];

 
	
	 public $timestamps = false;
    
}
