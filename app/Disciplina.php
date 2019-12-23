<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    public function cursos()
    {
    	return $this->belongsToMany('App\Curso', 'curso_disciplina', 'curso_id', 'disciplina_id');
    }

    public function estudantes()
    {
    	return $this->belongsToMany('App\Estudante', 'estudantes_disciplinas','estudante_id', 'disciplina_id');
    }
}
