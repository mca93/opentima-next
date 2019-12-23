<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Estudante;
use App\Curso;
use App\Disciplina;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudantes = Estudante::orderBy('id','desc')->paginate(2);
        $cursos = Curso::all();
        $disciplinas = Disciplina::all();

        return view('administrador.estudantes.index')->withEstudantes($estudantes)
                                                     ->withCursos($cursos)
                                                     ->withDisciplinas($disciplinas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $curso = Curso::find($request->input('curso_id'));
      $estudante = new Estudante;

      $estudante->primeiro_nome = $request->input('primeiro_nome');
      $estudante->ultimo_nome   = $request->input('ultimo_nome');
      $estudante->email         = $request->input('email');
      $estudante->celular       = $request->input('celular');

      $curso->estudantes()->save($estudante);
      $this->alocacao_estudante_disciplina($estudante->email, $request->input('disciplina_id'));
   return redirect(route('estudantes.index'));
    }
public function alocacao_estudante_disciplina($email, $disciplina_id)
{
      $disciplina = Disciplina::find($disciplina_id);
      $estudante = Estudante::where('email','=',$email)->first();
      $estudante->disciplinas()->attach($disciplina);
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
