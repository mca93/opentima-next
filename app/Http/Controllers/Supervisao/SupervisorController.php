<?php

namespace App\Http\Controllers\Supervisao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Docente;
use App\Supervisao;
use App\Proposta_tema;
use App\Area;
use App\Encontro;
use Carbon\Carbon;


class SupervisorController extends Controller
{
    public function home($docente_id)
    {
      $docente = Docente::find($docente_id);
      return view('supervisor.home')->withDocente($docente);
    }
    public function estatisticas($value='')
    {
      return view('departamento.estatisticas.index');
    }

    public function visualizar_calendario($supervisor_id)
    {
      $encontros = Encontro::all();
      $eventos = [];
      $supervisor = Docente::find($supervisor_id);
       $supervisaos= Supervisao::where('supervisor_id','=',$supervisor->id)->get();

      foreach ($supervisaos as $supervisao) {
        foreach ($supervisao->encontros as $encontro) {
          $eventos[] = array(
                "title" => 'Encontro com '.$supervisao->estudante->primeiro_nome.' '.$supervisao->estudante->ultimo_nome,
                "start" => $encontro->data

            );
      }
      }

        $eventos = json_encode($eventos);

      return view('supervisor.encontros.calendario')->withEventos($eventos)->withSupervisor($supervisor);
    }
    public function registo_de_encontro(Request $request, $supervisor_id)
    {
      $data_icial = Carbon::createFromDate($request->input('ano_do_encontro'),$request->input('mes_do_encontro'),$request->input('dia_do_encontro'), 'Africa/Maputo');
        $supervisao = Supervisao::find($request->input('supervisao_id'));
        if($request->input('frequencia')==14){
          for ($i=0; $i <6; $i++) {
          $encontro = new Encontro;
          $encontro->data = $data_icial;
          $encontro->hora = '09:30:00';
          $supervisao->encontros()->save($encontro);
          $data_icial = $encontro->data->addWeeks(2);//cria a data do proximo encontro.
          }
        }else {
          for ($i=0; $i < 12; $i++) {
          $encontro = new Encontro;
          $encontro->data = $data_icial;
          $encontro->hora = '09:30:00';
          $supervisao->encontros()->save($encontro);
          $data_icial = $encontro->data->addWeeks(1);
        }
    }
    return redirect(url('/feng/supervisores/'.$supervisor_id.'/calendario'));

  }

    public function propostas_de_temas($docente_id)
    {
      $docente = Docente::find($docente_id);

      return view('supervisor.propostas_temas.index')->withDocente($docente);
    }

    public function nova_proposta(Request $request, $docente_id)
    {
        $docente= Docente::find($docente_id);
        $area = Area::find($request->input('area'));
        $proposta_tema = new Proposta_tema;

          $proposta_tema->designacao = $request->input('designacao');
          $proposta_tema->descricao = "Bla bla bla";
          $proposta_tema->area()->associate($area);
          $proposta_tema->docente_proponente()->associate($docente);
        $proposta_tema->save();


      return redirect(url('/feng/supervisores/'.$docente->id.'/meus_temas'));
    }
}
