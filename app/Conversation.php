<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Conversation extends Model
{
    protected $table = 'conversations';
    protected $fillable = ['title','text','date','quota','img'];
	  public $timestamps = false;




    public function user()
    {
        return $this->hasOne('App\User','identification');
    }

}
