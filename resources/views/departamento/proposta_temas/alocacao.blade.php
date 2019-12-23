@extends('layouts.departamento')
@section('side_nav')
@include('partials.departamento._verticalnav')
@stop
@section('content')
<div class="ui grid">
  <div class="four column row">
    <div class="ui breadcrumb left floated">
      <a href="{{url('/feuem/'.$departamento->sigla)}}" class="section">Home</a>
      <i class="right arrow icon divider"></i>
      <a href="{{url('/feuem/'.$departamento->sigla.'/propostas_de_temas')}}"class="section">Propostas de temas</a>
      <i class="right arrow icon divider"></i>
      <a href="{{url('/feuem/'.$departamento->sigla.'/propostas_de_temas')}}"class="active section">{{$tema->designacao}}</a>
      <i class="right arrow icon divider"></i>
      <a href="{{url('/feuem/'.$departamento->sigla.'/propostas_de_temas')}}"class="active section">{{$candidato->cod_estudante}}</a>
    </div>
  </div>
    <div class="twelve wide column">
      <form class="ui form" action="{{url('/feuem/'.$departamento->sigla.'/propostas_de_temas/'.$tema->id.'/validacao/'.$candidato->id)}}" method="post">
          {{ csrf_field() }}
          <div class="inline fields">
            <label for="">Validação da acta</label>
            <div class="field">
              <div class="ui radio checkbox">
                <input name="estado" checked="checked" type="radio" value="Valida">
                <label>Aprovar a candidatura</label>
              </div>
            </div>
            <div class="field">
              <div class="ui radio checkbox">
                <input name="estado" type="radio" value="Invalida">
                <label>Reprovar a candidatura</label>
              </div>
            </div>
          </div>
          <div class="field">
            <button type="submit" class="fluid ui green button" onsubmit="">Alocar o tema ao candidato</button>
          </div>
      </form>
    </div>
</div>
@endsection
