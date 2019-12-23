<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = ['designacao','sigla','chefe_id'];
    protected $hidden = ['id','created_at', 'updated_at'];


    public function cursos()
    {
    	return $this->hasMany('App\Curso');
    }

    public function docentes()
    {
    	return $this->hasMany('App\Docente');
    }

    public function chefe()
    {
    	return $this->hasOne('App\Docente');
    }
}
