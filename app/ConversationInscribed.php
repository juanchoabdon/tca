<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class ConversationInscribed extends Model
{
    protected $table = 'conversations_inscribed';
    protected $fillable = ['identification','conversations_id'];
	  public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\User','id','identification');
    }

}
