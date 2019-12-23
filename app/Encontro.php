<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encontro extends Model
{
    public function supervisao()
    {
      return $this->belongsTo('App\Supervisao', 'supervisao_id');
    }

    public function acta()
    {
      return $this->hasOne('App\Acta');
    }
}
