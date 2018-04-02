<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultiLevelTransactions extends Model
{
    protected $table = 'multilevel_levels';

	 public $timestamps = false;

     protected $fillable = ['nombre','descripcion','active_membres','prsv','recompensa','group_volume'];

}
