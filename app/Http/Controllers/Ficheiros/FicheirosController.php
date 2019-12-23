<?php

namespace App\Http\Controllers\Ficheiros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Acta;
use App\Ficheiro;
use App\Monografia;
use Session;
use Sentinel;

class FicheirosController extends Controller
{
  public function show($id)
  {
      $acta=Acta::find($id);
      if (isset($acta)) {
              $ficheiro= $acta->ficheiro()->first();
             // dd($ficheiro);
          if (isset($ficheiro)) {
              ob_end_clean();
          return response()->download("./imagem/".$ficheiro->path, sprintf("%s.%s", $ficheiro->path, $ficheiro->extensao), ['Content-Type' => $ficheiro->mime]);
          }else{
            Session::flash('error','Ficheiro não encontrado');
       }
      }else{
        Session::flash('error','Ficheiro não existente');
      }
  }

  public function baixar_monografia($id)
  {
      $monografia= Monografia::find($id);
      if (isset($monografia)) {
              $ficheiro= $monografia->ficheiro_monografia()->first();
             // dd($ficheiro);
          if (isset($ficheiro)) {
              ob_end_clean();
          return response()->download("./imagem/".$ficheiro->path, sprintf("%s.%s", $ficheiro->path, $ficheiro->extensao), ['Content-Type' => $ficheiro->mime]);
          }else{
            Session::flash('error','Ficheiro não encontrado');
       }
      }else{
        Session::flash('error','Ficheiro não existente');

      }
    // $slug = Sentinel::getUser()->roles()->first()->slug;
    // if($slug=='estudante') {
    //     return redirect(url('/feng/estudantes/'.$monografia->supervisao()->id));
    //   }elseif($slug=='docente'){
    //     return redirect(url('/feng/supervisores/'.$monografia->supervisao()->docente()->id.'/supervisandos/'.$monografia->supervisao()->id));
    //   }else {
    //     return redirect(url('/feng/monografias'));
    //   }
    }

}
