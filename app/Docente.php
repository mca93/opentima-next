<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    public function departamento()
    {
    	return $this->belongsTo('App\Departamento');
    }

        public function areas()
    {
    	 return $this->belongsToMany('App\Area', 'docente_areas','docente_id','area_id');
    }
    public function supervisaos(){

      	return $this->hasMany('App\Supervisao','supervisor_id');
      }

      public function proposta_temas($value='')
      {
        return $this->hasMany('App\Proposta_tema', 'docente_id');

      }
      public function defesas($value='')
      {
        return $this->hasMany('App\Docente','oponente_id');
      }
}
