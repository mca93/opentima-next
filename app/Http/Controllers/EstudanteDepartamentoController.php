<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudante;
use App\Departamento;

class EstudanteDepartamentoController extends Controller
{
    public function cursos($departamento_sigla)
    {
        $departamento = Departamento::where('sigla', '=', $departamento_sigla)->first();
        $cursos = $departamento->cursos;
        return view('departamento.estudantes.index')->withCursos($cursos)
                                                    ->withDepartamento($departamento);
    }

    public function estudante($sigla,$id)
    {
      $estudante = Estudante::find($id);
      $departamento = Departamento::where('sigla', '=', $sigla)->first();


    return view('departamento.estudantes.show')->withEstudante($estudante)
                                               ->withDepartamento($departamento);
    }

}
