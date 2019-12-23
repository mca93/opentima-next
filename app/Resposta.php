<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    public function duvida($value='')
    {
      return $this->belongsTo('App\Duvida');
    }

    public function usuario($value='')
    {
      return $this->belongsTo('App\User', 'user_id');
    }
}
