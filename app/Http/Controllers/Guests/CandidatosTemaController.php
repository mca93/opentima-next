<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Proposta_tema;
use App\Estudante;
use App\Candidato_tema;
use App\Candidatos_temas;

class CandidatosTemaController extends Controller
{
    public function lista_de_temas()
    {
      $propostas_de_temas = Proposta_tema::all();
      return view('guests.candidatos_temas.candidatos_temas')->withPropostas_de_temas($propostas_de_temas);
    }

    public function candidatar_se_tema(Request $request)
    {
      $estudante = Estudante::where('cod_estudante','=',$request->input('cod_estudante'))->first();


      if ($estudante==null) {
        Session::flash('error','Estudante sem registo associado'.$request->input('tema_id'));
      }elseif (Candidato_tema::where('cod_estudante','=',$estudante->cod_estudante)->first() == null) {

          $proposta_tema = Proposta_tema::find($request->input('tema_id'));
          $candidato = new Candidato_tema;
          $candidato->cod_estudante = $request->input('cod_estudante');
          $candidato->save();

          $cand_temas = new Candidatos_temas;

          $cand_temas->problema = $request->input('problema');
          $cand_temas->descricao_problema = $request->input('descricao_do_problema');
          $cand_temas->candidato_id = $candidato->id;
          $cand_temas->proposta_tema_id = $proposta_tema->id;
          $cand_temas->save();

      }else {
        $proposta_tema = Proposta_tema::find($request->input('tema_id'));
        $candidato = Candidato_tema::where('cod_estudante','=',$estudante->cod_estudante)->first();

        $cand_temas = new Candidatos_temas;

        $cand_temas->problema = $request->input('problema');
        $cand_temas->descricao_problema = $request->input('descricao_do_problema');
        $cand_temas->candidato_id = $candidato->id;
        $cand_temas->proposta_tema_id = $proposta_tema->id;
        $cand_temas->save();
      }
      return redirect(url('/feng/propostas_de_temas'));

    }
}
