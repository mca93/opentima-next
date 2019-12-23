<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
  protected $fillable = ['estado'];

    public function actividades()
    {
      return $this->belongsToMany('App\Actividade', 'actividades_actas','acta_id');
    }

    public function ficheiro()
    {
      return $this->hasOne('App\Ficheiro');
    }
    public function encontro()
    {
      return $this->belongsTo('App\Encontro');
    }
    public function supervisao()
    {
      return $this->belongsTo('App\Supervisao', 'supervisao_id');
    }
}
