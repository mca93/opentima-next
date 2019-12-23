<?php

namespace App\Http\Controllers\chefe_depto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Departamento;

class EstatisticasController extends Controller
{
    public function estatisticas($sigla)
    {
      $departamento = Departamento::where('sigla', '=', $sigla)->first();
      $categorias = \App\Categoria::with('duvidas')->get();
      $quantidadeDeDuvidas = [];
      foreach($categorias as $c) {
        $d = $c->duvidas()->count();
        array_push($quantidadeDeDuvidas, $d);
      }

      $designacoes = array_map(function($x) {
        return $x['designacao'];
      }, $categorias->toArray());

        $quantidadeDeDuvidas = json_encode($quantidadeDeDuvidas);
        $designacoes = json_encode($designacoes);
      return view('departamento.estatisticas.index')->with('quantidadeDeDuvidas',$quantidadeDeDuvidas)
              ->withDesignacoes($designacoes)->withDepartamento($departamento);
    }
}
