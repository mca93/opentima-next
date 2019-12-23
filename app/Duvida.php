<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duvida extends Model
{
    public function categorias()
    {
      return $this->belongsToMany('App\Categoria', 'categorias_duvidas', 'duvida_id', 'categoria_id');
    }
    public function estudante()
    {
      return $this->belongsTo('App\Estudante', 'estudante_id');

    }
    public function respostas($value='')
    {
      return $this->hasMany('App\Resposta', 'duvida_id');
   }
}
