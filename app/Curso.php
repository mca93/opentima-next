<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public function departamento()
    {
    	return $this->belongsTo('App\Departamento');
    }
    public function estudantes()
    {
    	return $this->hasMany('App\Estudante');
    }

    public function areas($value='')
     {
     	return $this->hasMany('App\Area');
     }
    public function disciplinas()
    {
        return $this->belongsToMany('App\Disciplina', 'curso_disciplina', 'curso_id', 'disciplina_id');

    }
}
