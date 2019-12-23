<?php

namespace App\Http\Controllers\Estudante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supervisao;
use App\Actividade;
use Session;

class ActividadeController extends Controller
{
    public function novaActividade($supervisao_id, Request $request)
    {
      $supervisao = Supervisao::find($supervisao_id);
      $peso_acumulado = 0;
      $peso = $request->input('peso');

      $actividades = $supervisao->actividades();

      foreach ($actividades as $actividad) {
        $peso_acumulado +=$actividad->peso;
      }
      if ($peso_acumulado + $peso <100) {
        $actividade = new Actividade;
        $actividade->designacao = $request->input('designacao');
        $actividade->peso       = $request->input('peso');
        $actividade->prioridade = $request->input('prioridade');
        $actividade->estado     = $request->input('estado');
        $actividade->descricao  = $request->input('descricao');

        $supervisao->actividades()->save($actividade);
        Session::flash('success', 'Uma nova actividade foi adicionada ao tema');

         }else {
        Session::flash('error', 'Certifique-se que o peso é menor ou igual que '.(100 - $peso_acumulado));
      }
      return redirect(url('/feng/estudantes/'.$supervisao->id));
    }

    public function actualizar_estado($actividade_id, $estado)
    {
      $actividade = Actividade::find($actividade_id);
      $actividade->update(['estado'=>$estado]);

      return redirect(url('/feng/estudantes/'.$actividade->supervisao->id));
    }
}
