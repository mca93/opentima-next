<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use Session;
use App\Docente;
use App\Estudante;
use App\Supervisao;


class UsuarioController extends Controller
{
  public function registo()
  {
    return view('usuarios.register');
  }
  public function registaActiva(Request $request)
  {
    $user = Sentinel::registerAndActivate([
      'email'      => 'estudante@estudante.com',
      'password'   => 'estudante',
      'permissions' =>  [' '],
      'last_login' =>  ' ',
      'first_name' => 'Estudante',
      'last_name'  => 'Teste',
    ]);

    $role = Sentinel::findRoleBySlug('estudante');
    $role->users()->attach($user);
    Session::flash('success', 'Sucesso: Utilizador Cadastrado com Sucesso');
    return redirect('/');
  }

  public function cadatraUsuario(Request $request)
  {
    $usuario = Sentinel::registerAndActivate([
      'email'      => $request->input('email'),
      'password'   => $request->input('password'),
      'permissions' =>  [' '],
      'last_login' =>  ' ',
      'first_name' => $request->input('first_name'),
      'last_name'  => $request->input('last_name'),
    ]);

    if ($request->input('role_id') == 2) {
      $role = Sentinel::findRoleById(2);
      $role->users()->attach($user);
    }
    return redirect('/');
  }

  public function login()
  {
    return view('guests.login');
  }
  public function postLogin(Request $request)
  {
    Sentinel::authenticate($request->all());
    $slug = Sentinel::getUser()->roles()->first()->slug;
    if ($slug == 'administrador') {

      Session::flash('success', 'Admin authenticated successfully!');
      return redirect(route('departamentos.index'));;
    } elseif ($slug == 'chefe_do_departamento') {
      $docente = Docente::where('email', '=', Sentinel::getUser()->email)->first();
      Session::flash('success', 'authenticated successfully!');
      return redirect(url('/feuem/' . $docente->departamento->sigla));
    } elseif ($slug == 'estudante') {
      $estudante = Estudante::where('email', '=', Sentinel::getUser()->email)->first();
      $supervisao = Supervisao::where('estudante_id', '=', $estudante->id)->first();

      return redirect(url('/feng/estudantes/' . $supervisao->id));
    } elseif ($slug == 'docente') {
      $docente = Docente::where('email', '=', Sentinel::getUser()->email)->first();
      return redirect(url('/feng/supervisores/' . $docente->id));
    }
  }
  public function logout($value = '')
  {
    Sentinel::logout();
    Session::flash('success', 'Sessão terminada!');
    return redirect('/');
  }
}
