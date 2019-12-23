<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'web'], function () {
  Route::get('/', function () {
    return redirect(url('/login'));
  });

  Route::get('/login', 'Usuarios\UsuarioController@login');
  Route::post('/login', 'Usuarios\UsuarioController@postlogin');

  //Rotas para logout

  Route::get('/logout', 'Usuarios\UsuarioController@logout');

  //admin routes
  Route::post('/registaradmin', 'Usuarios\UsuarioController@registaActiva'); // admin registeration
  Route::get('/usuarios', 'Usuarios\UsuarioController@registo');
  Route::resource('departamentos', 'Admin\DepartamentoController');
  Route::Post('departamentos/{id}', 'Admin\DepartamentoController@actualizar');
  Route::resource('cursos', 'Admin\CursoController');
  Route::resource('docentes', 'Admin\DocenteController');
  Route::resource('estudantes', 'Admin\EstudanteController');

  //rotas chefe do departamentos
  Route::get('/feuem/{sigla}', 'chefe_depto\HomeController@home');
  Route::get('/feuem/{sigla}/propostas_de_temas', 'chefe_depto\HomeController@propostas_de_temas');
  Route::get('/feuem/{sigla}/propostas_de_temas/{proposta_tema_id}', 'chefe_depto\Proposta_temaController@propostas_de_temas_show');
  Route::get('/feuem/{sigla}/propostas_de_temas/{id}/validacao/{candidato}', 'chefe_depto\Proposta_temaController@validacao');
  Route::post('/feuem/{sigla}/propostas_de_temas/{id}/validacao/{candidato_ID}', 'chefe_depto\Proposta_temaController@alocacao');

  Route::post('/feuem/{sigla}/marcacao_de_defesa', 'chefe_depto\HomeController@marcacao_de_defesa');

  Route::get('/feuem/{sigla}/estatisticas', 'chefe_depto\EstatisticasController@estatisticas'); //
  Route::get('/feuem/{sigla}/{id}', 'chefe_depto\HomeController@curso');
  Route::post('/feuem/{sigla}/{id}/temas', 'chefe_depto\TemasController@novo_tema');
  Route::get('/feuem/{sigla}/{id}/temas/{tema_id}', 'chefe_depto\TemasController@tema_supervisor');
  Route::post('/feuem/{sigla}/{id}/temas/{tema_id}', 'chefe_depto\TemasController@tema_supervisor_save');
  Route::get('/feuem/{sigla}/{curso_id}/estudantes/{estuante_id}', 'chefe_depto\EstudanteController@detalhes_estudante');
  Route::post('/feuem/{sigla}/{curso_id}/estudantes/{estuante_id}/notificacao_interveniente', 'chefe_depto\EstudanteController@notificacao_interveniente');


  Route::post('/feuem/{sigla}/{id}/area', 'chefe_depto\AreaController@nova_area');
  Route::get('/feuem/{sigla}/{id}/area/{area_id}', 'chefe_depto\AreaController@show_area');
  Route::post('/feuem/{sigla}/{id}/area/{area_id}', 'chefe_depto\AreaController@docente_areas');



  //Route::get('/feuem', 'HomeController@search');
  Route::get('/feuem/{sigla}/estudantes', 'EstudanteDepartamentoController@cursos');
  Route::get('/feuem/{sigla}/estudantes/{id}', 'EstudanteDepartamentoController@estudante');

  //rotas estudante
  Route::get('/feng/estudantes/{supervisao_id}', 'Estudante\HomeController@home');
  Route::post('/feng/estudantes/{supervisao_id}/monografia', 'Estudante\HomeController@monografia');

  Route::get('/feng/estudantes/{supervisao_id}/actas', 'Estudante\HomeController@vizualizar_actas');
  Route::post('/feng/estudantes/{supervisao_id}/actas/novaActa', 'Estudante\ActasController@novaActa');
  Route::get('/feng/estudantes/{supervisao_id}/duvidas', 'Estudante\DuvidasController@index');
  Route::post('/feng/estudantes/{supervisao_id}/duvidas/registar_duvida', 'Estudante\DuvidasController@registar_duvida');
  Route::get('/feng/estudantes/{supervisao_id}/duvidas/{duvida_id}', 'Estudante\DuvidasController@show');

  Route::post('/feng/estudantes/{supervisao_id}/duvidas/{duvida_id}/resposta', 'Estudante\DuvidasController@registar_resposta');




  Route::post('/feng/estudantes/{supervisao_id}/actividades/create', 'Estudante\ActividadeController@novaActividade');
  Route::get('/feng/estudantes/actividades/{id}/{estado}', 'Estudante\ActividadeController@actualizar_estado');
});
//teste de rotas
Route::get('/administracao', 'Admin\HomeController@admin');
Route::get('/teste', 'Supervisao\SupervisorController@home'); //testar a interface
Route::get('/estatisticas', 'Supervisao\SupervisorController@estatisticas'); //testar a interface
//Route::get('/sms','Testes\SMSController@enviar_sms_teste'); //testar SMS
Route::get('/baixar/{acta_id}', 'Ficheiros\FicheirosController@show')->name('download');
Route::get('/baixar_monografia/{monografia_id}', 'Ficheiros\FicheirosController@baixar_monografia');



//Route::get('/cadastros','AdministracaoController@cadastros');

//Rotas do docente supervisor

Route::get('/feng/supervisores/{id}', 'Supervisao\SupervisorController@home');
Route::get('/feng/supervisores/{id}/supervisandos/{supervisao_id}', 'Supervisao\SupervisandosController@show');
Route::post('/feng/supervisores/{id}/supervisandos/{supervisao_id}/actas/validacao', 'Supervisao\SupervisandosController@validar_actas');
Route::post('/feng/supervisores/{id}/supervisandos/{supervisao_id}/monografias/validacao', 'Supervisao\SupervisandosController@validar_monografia');

Route::get('/feng/supervisores/{id}/calendario', 'Supervisao\SupervisorController@visualizar_calendario');
Route::post('/feng/supervisores/{id}/calendario/create', 'Supervisao\SupervisorController@registo_de_encontro');

Route::get('/feng/supervisores/{id}/meus_temas', 'Supervisao\SupervisorController@propostas_de_temas');
Route::post('/feng/supervisores/{id}/meus_temas/create', 'Supervisao\SupervisorController@nova_proposta');


//Rotas públicas
Route::get('/feng/propostas_de_temas', 'Guests\CandidatosTemaController@lista_de_temas');
Route::post('/feng/propostas_de_temas/candidatar-se', 'Guests\CandidatosTemaController@candidatar_se_tema');
Route::get('/feng/monografias', 'Guests\MonografiasTemaController@monografias');
