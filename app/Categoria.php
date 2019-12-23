<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function duvidas()
    {
      return $this->belongsToMany('App\Duvida', 'categorias_duvidas', 'categoria_id', 'duvida_id');
    }
}
