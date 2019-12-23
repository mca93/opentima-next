<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    public function curso()
    {
    	return $this->belongsTo('App\Curso');
    }
    public function disciplinas()
    {
    	return $this->belongsToMany('App\Disciplina', 'estudantes_disciplinas','estudante_id','disciplina_id');
    }

    public function temas($value='')
    {
      $this->hasMany('App\Tema');
    }
    public function supervisaos(){
    	return $this->hasMany('App\Supervisao');
    }
    public function proposta_temas($value='')
    {
      $this->hasMany('App\Proposta_tema');
    }

    public function duvidas($value='')
    {
      return $this->hasMany('App\Duvida');
    }
}
