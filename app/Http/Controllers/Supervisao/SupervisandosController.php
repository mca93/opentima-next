<?php

namespace App\Http\Controllers\Supervisao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supervisao;
use App\Docente;
use App\Acta;
use App\Monografia;
use App\Helpers\Helpers;
class SupervisandosController extends Controller
{
    public function show($docente_id, $supervisao_id)
    {
      $supervisao = Supervisao::find($supervisao_id);
      $docente = Docente::find($docente_id);
      $monografias = Monografia::join('supervisaos', 'supervisaos.id', '=', 'monografias.supervisao_id')
            ->join('docentes', 'docentes.id', '=', 'supervisaos.supervisor_id')
            ->select('monografias.id', 'monografias.estado', 'monografias.supervisao_id')->get();
      return view('supervisor.supervisandos.show')->withDocente($docente)->withSupervisao($supervisao)->withMonografias($monografias);
    }
    public function validar_actas(Request $request, $docente_id, $supervisao_id)
    {
      $supervisao = Supervisao::find($supervisao_id);
      $docente = Docente::find($docente_id);

      $acta = Acta::find($request->input('acta_id'));
      $progresso =0;
      if ($request->input('estado') == 'Valida') {
        $acta->update(['estado'=>"Valida"]);

        foreach ($acta->actividades as $actividade) {
          $progresso+=$actividade->peso;
        }
        $progresso_Actual = $supervisao->progresso;

        $supervisao->update(['progresso'=> $progresso_Actual+$progresso]);
      }

      return redirect(url('/feng/supervisores/'.$docente->id.'/supervisandos/'.$supervisao->id));
    }

    public function validar_monografia(Request $request, $docente_id, $supervisao_id)
    {
      $supervisao = Supervisao::find($supervisao_id);
      $docente = Docente::find($docente_id);

      $monografia = Monografia::find($request->input('monografia_id'));

      if ($request->input('estado')=='Valida') {
        $monografia->update(['estado'=>'Valida']);
        $mensagem_chefe = 'Caro Chefe do '.$docente->departamento->sigla.'o supervisor do tema com ref: '.$supervisao->tema->referencia.' emitiu o parecer da monografia';
        //Helpers::enviar_sms_teste($docente->departamento->chefe->celular,$mensagem_chefe); //Notifica-se ao chefe do departamento

        $mensagem_estudante= 'Caro Estudante, o supervisor emitiu um parecer positivo da sua monografia! Encontre no opentima';
        //Helpers::enviar_sms_teste($supervisao->estudante->celular,$mensagem_estudante); //Notifica-se ao estudate

        $supervisao->update(['estado'=>'Terminada']); //Declaram-se terminadas as actividades de supervisão
      }else{
        $monografia->update(['estado'=>'Invalida']);
        $mensagem_chefe = 'Caro Chefe do '.$docente->departamento->sigla.'o supervisor do tema com ref: '.$supervisao->tema->referencia.' emitiu o parecer negativo a monografia';
        //Helpers::enviar_sms_teste($docente->departamento->chefe->celular,$mensagem_chefe); //Notifica-se ao chefe do departamento

        $mensagem_estudante= 'Caro Estudante, o supervisor emitiu um parecer negativo da sua monografia! Encontre no opentima';
        //Helpers::enviar_sms_teste($supervisao->estudante->celular,$mensagem_estudante); //Notifica-se ao estudate

      }
      return redirect(url('/feng/supervisores/'.$docente->id.'/supervisandos/'.$supervisao->id));
        }
}
