<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficheiro extends Model
{
  public function acta()
  {
    return $this->belongsTo('App\Acta');
  }
}
