<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Defesa extends Model
{
  public function supervisao($value='')
  {
    return $this->belongsTo('App\Supervisao', 'supervisao_id');
  }
  public function oponente($value='')
  {
    return $this->belongsTo('App\Docente','oponente_id');
  }
}
