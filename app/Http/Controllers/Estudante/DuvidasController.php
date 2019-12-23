<?php

namespace App\Http\Controllers\Estudante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supervisao;
use App\Categoria;
use App\Duvida;
use App\Resposta;
use Sentinel;
use App\Helpers\Helpers;


class DuvidasController extends Controller
{
    public function index($supervisao_id)
    {
        $supervisao = Supervisao::find($supervisao_id);
        $categorias = Categoria::all();
        $duvidas = Duvida::all();

        return view('estudante.duvidas.index')->withSupervisao($supervisao)->withCategorias($categorias)
                ->withDuvidas($duvidas);
    }
    public function show($supervisao_id, $duvida_id)
    {//quando descomentar a sua rota, acresta mais um parametro {duvida_id}
      $supervisao = Supervisao::find($supervisao_id);
      $duvida = Duvida::find($duvida_id);
      //$categorias = Categoria::all();
      return view('estudante.duvidas.show')->withSupervisao($supervisao)->withDuvida($duvida);
    }

    public function registar_duvida(Request $request, $supervisao_id)
    {
      $categoria_ids = $request->input('categorias');
      $supervisao = Supervisao::find($supervisao_id);
      $estudante = $supervisao->estudante;

      //$categoria = null;
      $duvida = new Duvida;
      $duvida->designacao = $request->input('duvida');
      if ($request->input('estado')=='nao') {
      $duvida->estado = 'Nao Publica';
      }
      $estudante->duvidas()->save($duvida);

      for ($i=0; $i < count($categoria_ids); $i++) {
        $categoria = Categoria::find($categoria_ids[$i]);
        $duvida->categorias()->attach($categoria);
      }
      // $mensagem = 'Caro supervisor, '.$supervisao->estudante->primeiro_nome.' submeteu uma dúvida! Para visualizá-la, acede à sua conta no opentima';
      // Helpers::enviar_sms_teste($supervisao->docente->celular, $mensagem);
      return redirect(url('/feng/estudantes/'.$supervisao_id.'/duvidas'));
    }

    public function registar_resposta(Request $request, $supervisao_id, $duvida_id)
    {
      $supervisao = Supervisao::find($supervisao_id);
      $duvida = Duvida::find($duvida_id);
      $user = Sentinel::getUser();

      $resposta = new Resposta;

      $resposta->resposta=$request->input('resposta');

      $resposta->usuario()->associate($user);

      $duvida->respostas()->save($resposta);

      return redirect(url('/feng/estudantes/'.$supervisao->id.'/duvidas/'.$duvida->id));
    }
}
