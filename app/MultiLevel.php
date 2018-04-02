<?php

namespace App;

use Baum;

use Illuminate\Database\Eloquent\Model;

class MultiLevel extends Baum\Node
{
    protected $table = 'mutilevel_users';

	  public $timestamps = false;

      protected $parentColumn = 'parent_id';


      protected $leftColumn = 'lft';


      protected $rightColumn = 'rght';


      protected $depthColumn = 'depth';


      protected $guarded = array('id', 'parent_id', 'left', 'rght', 'depth');

      public function user(){
        return $this->belongsTo('App\User'); 
      }

      public function nivel(){
         return $this->belongsTo('App\MultilevelLevels', 'level');
      }


}
