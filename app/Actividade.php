<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividade extends Model
{
    protected $fillable = ['designacao','prioridade','estado', 'peso'];

    public function supervisao()
    {
      return $this->belongsTo('App\Supervisao');
    }

    public function actas()
    {
      return $this->belongsToMany('App\Acta', 'actividades_actas', 'actividade_id', 'acta_id');
    }
}
