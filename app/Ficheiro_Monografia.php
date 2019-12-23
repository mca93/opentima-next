<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficheiro_Monografia extends Model
{
  public function monografia()
  {
    return $this->belongsTo('App\Monografia');
  }
}
