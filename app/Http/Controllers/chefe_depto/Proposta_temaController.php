<?php

namespace App\Http\Controllers\chefe_depto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Departamento;
use App\Proposta_tema;
use App\Candidato_tema;
use Carbon\Carbon;
use App\Tema;
use App\Area;
use App\Estudante;
use App\Curso;
use App\Supervisao;
use App\Docente;
use App\Helpers\Helpers;
use Sentinel;

class Proposta_temaController extends Controller
{
  public function propostas_de_temas_show($sigla, $proposta_tema_id)
  {
    $departamento = Departamento::where('sigla', '=', $sigla)->first();
    $proposta_tema = Proposta_tema::find($proposta_tema_id);

    $candidatos = Candidato_tema::join('candidatos_temas','candidatos_temas.candidato_id','=', 'candidato_temas.id')
                                  ->where('candidatos_temas.proposta_tema_id','=', $proposta_tema->id)
                                  ->select('candidato_temas.id','candidato_temas.cod_estudante')->get();
                    //  dd($candidatos);

    return view('departamento.proposta_temas.show')->withDepartamento($departamento)->withProposta_tema($proposta_tema)
                                                ->withCandidatos($candidatos);
  }
  public function validacao($sigla, $proposta_tema_id, $candidato_id)
  {
    $tema = Proposta_tema::find($proposta_tema_id);
    $departamento = Departamento::where('sigla', '=', $sigla)->first();
    $candidato = Candidato_tema::find($candidato_id);

    return view('departamento.proposta_temas.alocacao')->withCandidato($candidato)->withTema($tema)
                                                        ->withDepartamento($departamento);
  }

  public function alocacao(Request $request, $sigla, $proposta_tema_id, $candidato_id)
  {
    $departamento = Departamento::where('sigla', '=', $sigla)->first();

    if ($request->input('estado')=='Valida') {
      $proposta_tema = Proposta_tema::find($proposta_tema_id);
      $candidato = Candidato_tema::find($candidato_id);
    //  dd($candidato);
      $proposta_tema->update(['estado'=>'Alocado']);
      $area = Area::find($proposta_tema->area->id);
      $estudante = Estudante::where('cod_estudante','=',$candidato->cod_estudante)->first();
      $curso = Curso::find($estudante->curso_id);
      $docente = Docente::find($proposta_tema->docente_id);

      $tema = new Tema;
      $tema->designacao = $proposta_tema->designacao;
      $tema->referencia = '2017EITLD'.$estudante->cod_estudante;
      $tema->descricao  = $proposta_tema->descricao;

      $tema->area()->associate($area);
      $tema->estudante()->associate($estudante);

      $tema->save();

      $this->alocacao_de_supervisor($tema, $curso, $docente, $estudante);

    return redirect(url('/feuem/'.$sigla.'/propostas_de_temas'));
    }

  }

  public function alocacao_de_supervisor(Tema $tema, Curso $curso, Docente $supervisor, $estudante)
  {
    $limite = Carbon::today()->addMonth(4);
    $supervisao = new Supervisao;
    $tema->update(['status'=>'Alocado']);
    $supervisao->dia_inicio = Carbon::today()->day;
    $supervisao->mes_inicio = Carbon::today()->month;
    $supervisao->ano_inicio = Carbon::today()->year;
    $supervisao->dia_limite = $limite->day;
    $supervisao->mes_limite = $limite->month;
    $supervisao->ano_limite = $limite->year;
    $supervisao->tema()->associate($tema);
    $supervisao->estudante()->associate($estudante);
    $supervisao->docente()->associate($supervisor);

    $supervisao->save();

      $user= Sentinel::registerAndActivate([
                      'email'      => $estudante->email,
                      'password'   => $estudante->primeiro_nome,
                      'permissions'=>  [' '],
                      'last_login' =>  ' ',
                      'first_name' => $estudante->primeiro_nome,
                      'last_name'  => $estudante->ultimo_nome,
                      ]);

                    $role = Sentinel::findRoleBySlug('estudante');
                    $role->users()->attach($user);
                    Helpers::sendProjectInviteMail($user->email, $tema->referencia, $supervisor);

                    $mensagem = 'Caro docente, foi designado para supervisionar um estudante com tema cuja referencia é:'.$tema->referencia;
              //      Helpers::enviar_sms_teste($supervisor->celular, $mensagem);
  }
}
