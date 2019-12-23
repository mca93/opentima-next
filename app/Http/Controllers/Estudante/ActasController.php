<?php

namespace App\Http\Controllers\Estudante;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Acta;
use App\Encontro;
use App\Supervisao;
use App\Ficheiro;
use App\Actividade;
use App\Helpers\Helpers;

class ActasController extends Controller
{
    public function novaActa(Request $request, $supervisao_id)
    {
      $supervisao = Supervisao::find($supervisao_id);
      $actividades_ids= $request->input('actividades');
      $encontro = Encontro::find($request->input('encontro'));

  //  dd($request->has('file'));

      if ($request->hasFile('file')) {
                       $file =$request->file('file');
                        $path          =str_random(20);
                       $ficheiro = new Ficheiro;
                        $ficheiro->extensao = $file->guessExtension();
                        $ficheiro->tamanho = $file->getMaxFilesize();
                        $ficheiro->mime = $file->getMimeType();
                if (in_array($ficheiro->mime, ['application/x-pdf', 'application/pdf'])) {
                  $acta = new Acta;
                  $acta->encontro()->associate($encontro);
                  $acta->supervisao()->associate($supervisao);
                  $acta->save();

                  $ficheiro->acta()->associate($acta);
                  $ficheiro->path =$path;
                if ($ficheiro->save()) {
                  $file->move("./imagem",$path);

                  for ($i=0; $i <count($actividades_ids) ; $i++) {
                    $actividade = Actividade::find($actividades_ids[$i]);
                    $acta->actividades()->attach($actividade);
                  }
        }else {
            Session::flash('error','Houve um erro');
        }

      }else {
          Session::flash('error','O ficheiro anexado deve ser pdf');
      }
          }else {
            Session::flash('error','Adicione um ficheiro');
          }
          // $mensagem = 'Caro supervisor, '.$supervisao->estudante->primeiro_nome.' submeteu nova acta! Para validá-la acede à sua conta no opentima';
          // Helpers::enviar_sms_teste($supervisao->docente->celular, $mensagem);
          return redirect(url('/feng/estudantes/'.$supervisao->id.'/actas'));

    }
}
