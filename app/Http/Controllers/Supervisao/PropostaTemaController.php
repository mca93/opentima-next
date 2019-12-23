<?php

namespace App\Http\Controllers\Supervisao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\proposta_tema;
use App\Docente;
use App\Area;

class PropostaTemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $docente_id)
    {
        $res = null;
        $docente= Docente::find($docente_id);
        $area = Area::find($request->input('area'));

          $posposta_tema = new proposta_tema;

          $proposta_tema->designacao = $request->input('designacao');
          $proposta_tema->descricao = $request->input('descricao');

          $proposta_tema->area()->associate($area);
          $proposta_tema->doente_proponente()->associate($docente);
        $proposta_tema->save();


      return redirect(url('/feng/supervisores/'.$docente->id.'/meus_temas'));
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
