<?php

namespace App\Http\Controllers\chefe_depto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Curso;
use App\Departamento;
use App\Area;
use App\Docente;

class AreaController extends Controller
{
    public function nova_area($sigla, $curso_id, Request $request)
    {
        $curso = Curso::find($curso_id);
        $departamento = Departamento::where('sigla','=',$sigla);

        $area = new Area;

        $area->designacao = $request->input('designacao');
        $area->descricao = $request->input('descricao');

        $curso->areas()->save($area);
        Session::flash('success','Adicionou-se nova area de interesse');
        return redirect(url('/feuem/'.$curso->departamento->sigla.'/'. $curso->id));
    }
    public function show_area($sigla, $curso_id,$area_id)
    {
      $area = Area::find($area_id);
      $curso = Curso::find($curso_id);
      $docentes = Docente::where('departamento_id','=', $curso->departamento->id)->get();
      $departamento = Departamento::where('sigla','=',$sigla)->first();


      return view('departamento.areas.show')->withDocentes($docentes)
                                            ->withArea($area)
                                            ->withCurso($curso)->withDepartamento($departamento);
    }
    public function docente_areas(Request $request, $sigla, $curso_id, $area_id)
    {
      $area  = Area::find($area_id);
      $curso = Curso::find($curso_id);
      $docentes_ids= $request->input('docentes');

      for ($i=0; $i <count($docentes_ids) ; $i++) {
        $docente = Docente::find($docentes_ids[$i]);
        $area->docentes()->attach($docente);
      }
      Session::flash('success', count($docentes_ids).' docentes foram adicionados à area de '.$area->designacao);
      return redirect(url('/feuem/'.$curso->departamento->sigla.'/'. $curso->id));
    }
}
