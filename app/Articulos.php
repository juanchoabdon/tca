<?php

namespace App;
use App\ArticulosCategorias;

use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
  protected $table = 'article';
  public $timestamps = false;

  public function categoria(){
     return ArticulosCategorias::where('id','=',$this->categoria)->first();
  }

}
