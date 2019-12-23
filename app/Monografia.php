<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monografia extends Model
{ protected $fillable = ['estado'];
  public function ficheiro_monografia()
  {
    return $this->hasOne('App\Ficheiro_Monografia');
  }

  public function supervisao()
  {
    return $this->belongsTo('App\Supervisao');
  }
}
