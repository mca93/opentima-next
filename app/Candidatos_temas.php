<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidatos_temas extends Model
{
    protected $table = 'candidatos_temas';

    public function proposta_temas()
  {
   return $this->belongsToMany('App\Proposta_tema', 'candidatos_temas','proposta_tema_id','candidato_id');
  }
}
