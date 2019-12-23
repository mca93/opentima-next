<?php

namespace App\Http\Controllers\chefe_depto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Estudante;
use App\Departamento;
use App\Supervisao;
use App\Curso;
use App\Helpers\Helpers;

class EstudanteController extends Controller
{
    public function detalhes_estudante($sigla, $curso_id, $estudante_id)
    {
      $departamento = Departamento::where('sigla', '=', $sigla)->first();
      $estudante = Estudante::find($estudante_id);
      $supervisao = Supervisao::where('estudante_id','=',$estudante->id)->first();
      return view('departamento.estudantes.show')->withEstudante($estudante)
                                                ->withDepartamento($departamento)->withSupervisao($supervisao);
    }

    public function notificacao_interveniente(Request $request, $sigla, $curso_id, $estudante_id)
    {
      $departamento = Departamento::where('sigla', '=', $sigla)->first();
      $estudante = Estudante::find($estudante_id);
      $curso = Curso::find($curso_id);

      if ($request->input('destinatario')!=0 && $request->input('destinatario')!=-1) {
        $supervisao = Supervisao::find($request->input('supervisao_id'));

        if ($request->input('destinatario')=='estudante') {
          Helpers::enviar_sms_teste($supervisao->estudante->celular, $request->input('mensagem'));
        }elseif ($request->input('destinatario')=='supervisor') {
          Helpers::enviar_sms_teste($supervisao->docente->celular, $request->input('mensagem'));
        }
      }elseif ($request->input('destinatario')==-1) {
        Helpers::enviar_sms_teste($supervisao->estudante->celular, $request->input('mensagem'));
        Helpers::enviar_sms_teste($supervisao->docente->celular, $request->input('mensagem'));
      }

      return redirect(url('/feuem/'.$departamento->sigla.'/'.$curso->id.'/estudantes/'.$estudante->id));
    }
}
