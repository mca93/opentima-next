@extends('layouts.departamento')
@section('side_nav')
@include('partials.departamento._verticalnav')
@stop
@section('content')
<div class="ui grid">
  <div class="four column row">
    <div class="ui breadcrumb left floated">
      <a href="{{url('/feuem/'.$curso->departamento->sigla)}}" class="section">Home</a>
      <i class="right arrow icon divider"></i>
      <a href="{{url('/feuem/'.$curso->departamento->sigla.'/'.$curso->id)}}"class="section">{{$curso->designacao}}</a>
      <i class="right arrow icon divider"></i>
      <a href="#"class="active section">{{$area->designacao}}</a>
    </div>
  </div>
  <div class="four wide column">

  </div>
  <div class="eight wide column">
    <form class="ui form" method="post" action="{{url('/feuem/'.$curso->departamento->sigla.'/'.$curso->id.'/area/'.$area->id)}}">
      {{csrf_field()}}
       <div class="field">
         <label>Desgnação da área</label>
               <input placeholder="o tema" type="text" name="designacao" value="{{$area->designacao}}" disabled="true">
       </div>
        <div class="field">
            <label>Docentes interessados</label>
                <select multiple="" class="ui dropdown" name="docentes[]">
                  @foreach($docentes as $docente)
                  <option value="{{$docente->id}}">{{$docente->primeiro_nome.' '.$docente->ultimo_nome}}</option>
                  @endforeach
                </select>
            </div>
        <div class="field">
          <button type="submit" class="fluid ui green button" onsubmit="">Alocar</button>
        </div>
      </form>
  </div>

</div>
@endsection
