@extends('layouts.admin')
@section('title', '|Area do Administrador')

@section('secundary_nav')
  @include('partials._admin_cadastros_nav')
@endsection

@section('content_Area')
<div class="eight wide column">
  <form class="ui form" action="{{url('departamentos/'.$departamento->id)}}" method="POST">
    {{ csrf_field() }}
          <div class="twelve wide field">
            <label>Designacao</label>
            <input type="text" name="designacao" id="designacao" value="{{$departamento->designacao}}">
          </div>
        <div class="twelve wide field">
          <label>SIGLA</label>
          <input type="text" name="sigla" id="sigla" value="{{$departamento->sigla}}">
        </div>
        <div class="twelve  wide field">
          <label>Chefe</label>
          <select class="ui search dropdown" name="chefe_id" id="chefe_id">
            @if($departamento->chefe_id != Null)
              <option value="{{$departamento->chefe_id}}">{{$departamento->chefe->primeiro_nome.' '.$departamento->chefe->ultimo_nome}}</option>
            @endif
              @foreach($docentes as $docente)
              <option value="{{$docente->id}}">{{$docente->primeiro_nome.' '.$docente->ultimo_nome}}</option>
              @endforeach

          </select>
        </div>
        <div class="twelve  wide field"style="padding-top:10px">

              <button type="submit" class="fluid ui green button">Gravar</button>

        </div>
  </form>
</div>
@endsection
