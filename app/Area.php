<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function curso()
    {
    	return $this->belongsTo('App\Curso');
    }

    public function docentes()
    {
    	 return $this->belongsToMany('App\Docente', 'docente_areas', 'area_id', 'docente_id');
    }
    public function temas($value='')
    {
      $this->hasMany('App\Tema');
    }
}
