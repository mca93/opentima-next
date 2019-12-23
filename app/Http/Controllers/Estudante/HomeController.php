<?php

namespace App\Http\Controllers\Estudante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Departamento;
use App\Curso;
use App\Supervisao;
use App\Acta;
use App\Monografia;
use App\Ficheiro_Monografia;
use App\Helpers\Helpers;
use Session;

class HomeController extends Controller
{
  public function home($supervisao_id)
  {
    $progresso = 0;
    $total_actas =0;
    $actas_validas=0;
    $supervisao = Supervisao::find($supervisao_id);
    $actas = Acta::where('supervisao_id','=',$supervisao->id)->get();

    if ($actas !==null) {
      $total_actas= count($actas);
      foreach ($actas as $acta) {
        if ($acta->estado!= 'Pendente') {
          $actas_validas+=1;

        }if ($acta->estado == 'Valida') {
          foreach ($acta->actividades as $actividade) {
            $progresso+=$actividade->peso;
          }
        }

      }
    }
     return view('estudante.home')->withSupervisao($supervisao)->withProgresso($progresso)
              ->withTotal_actas($total_actas)->withActas_validas($actas_validas);
  }
  public function vizualizar_actas($supervisao_id)
  {

    $supervisao = Supervisao::find($supervisao_id);


    return view('estudante.actas.index')->withSupervisao($supervisao);
  }

  public function monografia(Request $request, $supervisao_id)
  {
    $supervisao = Supervisao::find($supervisao_id);

    $monografia = new Monografia;

    $supervisao->monografia()->save($monografia);

    if ($request->hasFile('file')) {
                     $file =$request->file('file');
                      $path          =str_random(20);
                     $ficheiro = new Ficheiro_Monografia;
                      $ficheiro->extensao = $file->guessExtension();
                      $ficheiro->tamanho = $file->getMaxFilesize();
                      $ficheiro->mime = $file->getMimeType();
              if (in_array($ficheiro->mime, ['application/x-pdf', 'application/pdf'])) {
                $ficheiro->monografia()->associate($monografia);
                $ficheiro->path =$path;
              if ($ficheiro->save()) {
                $file->move("./imagem",$path);

      }else {
          Session::flash('error','Houve um erro');
      }

    }else {
        Session::flash('error','O ficheiro anexado deve ser pdf');
    }
        }else {
          Session::flash('error','Adicione um ficheiro');
        }
        // $mensagem_supervisor = 'Caro supervisor, '.$supervisao->estudante->primeiro_nome.' submeteu o relatório final! Aguarda-se parecer';
        //
        // $mensagem_chefe = 'Caro Chefe do '.$supervisao->docente->departamento->sigla.', o estudante '.$supervisao->estudante->primeiro_nome.', com ref. do tema: '.$supervisao->tema->referencia.', submeteu o relatório final! Por agora aguarda-se o relatorio do supervisor';
        //
        // Helpers::enviar_sms_teste($supervisao->docente->celular, $mensagem_supervisor); // Notifica o supervisor
        //
        // Helpers::enviar_sms_teste($supervisao->departamento->chefe->celular, $mensagem_chefe); //Notifica o chefe do departamento

Session::flash('success','Parabéns, a sua monografia foi partilhada com o supervisor e o departamento');
        return redirect(url('/feng/estudantes/'.$supervisao->id));

  }
}
