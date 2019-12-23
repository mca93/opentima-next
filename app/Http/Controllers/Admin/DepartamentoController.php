<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Departamento;
use App\Docente;
use App\Helpers\Helpers;
use Sentinel;
use Session;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos=Departamento::all();
        return view('administrador.departamentos.index')->withDepartamentos($departamentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      echo "3";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $departamento = new Departamento;

      $departamento->designacao = $request->input('designacao');
      $departamento->sigla= $request->input('sigla');

    $departamento->save();

    return redirect(route('administrador.departamentos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "2";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamento = Departamento::find($id);
        $docentes = $departamento->docentes;
       return view('administrador.departamentos.edit')->withDepartamento($departamento)->withDocentes($docentes);
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
        echo "string";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      echo "1";
    }
    public function actualizar(Request $request, $id)
    {
      $departamento = Departamento::find($id);
      $docente = Docente::find($request->input('chefe_id'));
      $departamento->update(['chefe_id'=>$docente->id]);

      $user= Sentinel::registerAndActivate([
                      'email'      => $docente->email,
                      'password'   => $docente->primeiro_nome,
                      'permissions'=>  [' '],
                      'last_login' =>  ' ',
                      'first_name' => $docente->primeiro_nome,
                      'last_name'  => $docente->ultimo_nome,
                      ]);

                    $role = Sentinel::findRoleBySlug('chefe_do_departamento');
                    $role->users()->attach($user);
                    Helpers::sendWelcomeMail($docente);
            Session::flash('success', 'Sucesso: E-mail enviado para o docente');
    return redirect()->route('departamentos.index');
    }
}
