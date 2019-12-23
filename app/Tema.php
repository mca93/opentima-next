<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
  protected $fillable = [
    'status', 'designacao', 'descricao', 'referencia'];
    public function area()
    {
      return $this->belongsTo('App\Area');
    }
    public function estudante($value='')
    {
      return $this->belongsTo('App\Estudante');
    }
    public function supervisaos(){
      return $this->hasMany('App\Supervisao');
    }
}
