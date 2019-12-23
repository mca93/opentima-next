<?php

namespace App\Http\Controllers\chefe_depto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tema;
use App\Area;
use App\Estudante;
use App\Curso;
use App\Supervisao;
use App\Docente;
use App\Departamento;
use App\Helpers\Helpers;
use Sentinel;

class TemasController extends Controller
{
    public function novo_tema(Request $request, $sigla, $curso_id)
    {
      $area = Area::find($request->input('area_id'));
      $estudante = Estudante::find($request->input('estudante_id'));
      $curso = Curso::find($curso_id);

      $tema = new Tema;
      $tema->designacao = $request->input('designacao');
      $tema->referencia = $request->input('referencia');
      $tema->descricao  = $request->input('descricao');

      $tema->area()->associate($area);
      $tema->estudante()->associate($estudante);

      $tema->save();

      return redirect(url('/feuem/'.$curso->departamento->sigla.'/'. $curso->id));
    }

    public function tema_supervisor($sigla, $curso_id, $tema_id)
    {
      $tema = Tema::find($tema_id);
      $departamento = Departamento::where('sigla','=',$sigla)->first();


      return view('departamento.temas.show')->withTema($tema)->withDepartamento($departamento);
    }
    public function tema_supervisor_save(Request $request, $sigla, $curso_id, $tema_id)
    {
      //dd($request->input());
      $tema = Tema::find($tema_id);
      $curso = Curso::find($curso_id);
      $supervisor = Docente::find($request->input('docente_id'));

      $supervisao = new Supervisao;
      $tema->update(['status'=>'Alocado']);
      $supervisao->dia_inicio = $request->input('dia_inicio');
      $supervisao->mes_inicio = $request->input('mes_inicio');
      $supervisao->ano_inicio = $request->input('ano_inicio')!==null ? $request->input('ano_inicio') : 2017;
      $supervisao->dia_limite = $request->input('dia_limite');
      $supervisao->mes_limite = $request->input('mes_limite');
      $supervisao->ano_limite = $request->input('ano_limite') !==null ? $request->input('ano_limite') : 2017;;
      $supervisao->tema()->associate($tema);
      $supervisao->estudante()->associate($tema->estudante);
      $supervisao->docente()->associate($supervisor);

      $supervisao->save();

        $user= Sentinel::registerAndActivate([
                        'email'      => $tema->estudante->email,
                        'password'   => $tema->estudante->primeiro_nome,
                        'permissions'=>  [' '],
                        'last_login' =>  ' ',
                        'first_name' => $tema->estudante->primeiro_nome,
                        'last_name'  => $tema->estudante->ultimo_nome,
                        ]);

                      $role = Sentinel::findRoleBySlug('estudante');
                      $role->users()->attach($user);
                  //    Helpers::sendProjectInviteMail($user->email, $tema->referencia, $supervisor);

        $user= Sentinel::registerAndActivate([
                        'email'      => $supervisor->email,
                        'password'   => $supervisor->primeiro_nome,
                        'permissions'=>  [' '],
                        'last_login' =>  ' ',
                        'first_name' => $supervisor->primeiro_nome,
                        'last_name'  => $supervisor->ultimo_nome,
                        ]);

                      $role = Sentinel::findRoleBySlug('docente');
                      $role->users()->attach($user);
                //      Helpers::sendWelcomeMail($user);


      return redirect(url('/feuem/'.$curso->departamento->sigla.'/'. $curso->id));

    }
}
