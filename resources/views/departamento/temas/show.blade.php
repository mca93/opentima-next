@extends('layouts.departamento')
@section('side_nav')
@include('partials.departamento._verticalnav')
@stop
@section('content')
<div class="ui grid">
    <div class="four column row">
      <div class="ui breadcrumb left floated">
        <a href="{{url('/feuem/'.$tema->area->curso->departamento->sigla)}}" class="section">Home</a>
        <i class="right arrow icon divider"></i>
        <a href="{{url('/feuem/'.$tema->area->curso->departamento->sigla.'/'.$tema->area->curso->id)}}"class="section">{{$tema->area->curso->designacao}}</a>
        <i class="right arrow icon divider"></i>
        <a href="{{url('/feuem/'.$tema->area->curso->departamento->sigla.'/'.$tema->area->curso->id)}}"class="active section">Tema</a>
      </div>
    </div>
    <div class="four column row"></div>
    <div class="twelve wide column">
      <div id="regInnkommende" class="ui stacked segment">
        <a class="ui olive ribbon label">Alocação de temas</a>

        <form class="ui form" method="post" action="{{url('/feuem/'.$tema->area->curso->departamento->sigla.'/'.$tema->area->curso->id.'/temas/'.$tema->id)}}">
          {{csrf_field()}}
          <div class="two fields">
            <div class="field">
              <label>Tema</label>
              <input type="text" name="tema_id" value="{{$tema->designacao}}" disabled>
            </div>
            <div class="field">
              <label>Supervisor</label>
                <select class="ui fluid search selection dropdown" name="docente_id">
                  @foreach($tema->area->docentes as $docente)
                  <option value="{{$docente->id}}">{{$docente->primeiro_nome.' '.$docente->ultimo_nome}}</option>
                  @endforeach
              </select>
            </div>
          </div>
          <div class="field">
            <div class="ui checkbox datepicker">
              <input type="checkbox" tabindex="0" class="hidden">
              <label>Incluir co-supervisores?</label>
            </div>
          </div>
          <div class="ui secondary segment datepicker dont-show small form">
            <div class="field">
              <label>Data Início</label>

              <div class="fields">
                <div class="three wide field">
                  <select class="ui fluid dropdown" name="dia_inicio">
                    @for($i=01; $i<=31; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                </div>
                <div class="six wide field">

                  <select class="ui fluid search dropdown" name="mes_inicio">
                    <option value="">Mes</option>
                    <option value="1">Janeiro</option>
                    <option value="2">Fevereiro</option>
                    <option value="2">Março</option>
                    <option value="1">Julho</option>
                    <option value="2">Agosto</option>
                    <option value="2">Setembro</option>
                  </select>
                </div>
                <div class="four wide field">
                  <div class="ui input">
                    <input type="text" value="2017" name="ano_inicio" disabled>
                  </div>
                </div>
              </div>
            </div>

            <div class="field">
              <label>Data Fim</label>
              <div class="fields">
                <div class="three wide field">
                  <select class="ui fluid dropdown" name="dia_limite">
                    <option value="01">1</option>
                    <option value="02">2</option>
                    <option value="03">3</option>
                    <option value="04">4</option>
                    <option value="05">5</option>
                  </select>
                </div>
                <div class="six wide field">

                  <select class="ui fluid search dropdown" name="mes_limite">
                    <option value="">Mes</option>
                    <option value="1">Junho</option>
                    <option value="2">Julho</option>
                    <option value="2">Novembro</option>
                    <option value="2">Dezembro</option>
                  </select>
                </div>
                <div class="four wide field">
                  <div class="ui input">
                    <input type="text" value="2017" name="ano_limite" disabled>2017
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="field" tabindex="0">
              <button type="submit" name="alocar" class="ui button">Alocar</button>
          </div>
        </form>

      </div>
    </div>

</div>

@endsection
