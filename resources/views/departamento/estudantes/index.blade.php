@extends('layouts.departamento')
@section('side_nav')
@include('partials.departamento._verticalnav')
@stop
@section('content')
<div class="ui grid">
  <div class="four column row">
      <div class="ui breadcrumb left floated">
        <a href="{{url('/feuem/'.$departamento->sigla)}}"class="section">Home</a>
        <i class="right arrow icon divider"></i>
        <div class="active section">Estudantes</div>
      </div>
      <div class="right floated column">
        <div class="ui form right floated">
          <div class="ui icon input">
            <i class="search icon"></i><input placeholder="filtro" type="text">
          </div>
        </div>
      </div>
</div>

</div>
<table class="ui celled table">
  <thead>
    <tr><th>Nome</th>
    <th>Curso</th>
    <th>Accao</th>
  </tr></thead>
  <tbody>
    @foreach($cursos as $curso)
       @foreach($curso->estudantes as $estudante)
          <tr>
            <td>
              <div class="ui ribbon label">{{$estudante->primeiro_nome.' '.$estudante->ultimo_nome}}</div>
            </td>
            <td>{{$curso->designacao}}</td>
            <td>
              <button class="ui animated fade button" tabindex="0" onclick="model(1)">
                <div class="visible content"></i>Alocar tema</i></div>
                <div class="hidden content">
                <i class="mail outline icon"></i>
                </div>
              </button>

              <a href="{{url('/feuem/'.$curso->departamento->sigla.'/estudantes/'.$estudante->id)}}" class="ui animated fade button">
                <div class="visible content"></i>Visualizar area</i></div>
                <div class="hidden content">
                  <i class="unhide icon"></i>
                </div>
              </a>
            </td>
          </tr>
      @endforeach
    @endforeach
  </tbody>
</table>
<div class="ui right floated pagination menu">
  <a class="icon item">
    <i class="left chevron icon"></i>
  </a>
  <a class="item">1</a>
  <a class="item">2</a>
  <a class="item">3</a>
  <a class="item">4</a>
  <a class="icon item">
    <i class="right chevron icon"></i>
  </a>
</div>
@endsection
<script type="text/javascript">
  function model(id) {
    if (id == 1) {
      $('.ui.modal')
        .modal('show');
    }

  }
</script>
<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">

      Alocacao de tema ao estudante

  </div>
  <div class="content">
    <div class="ui grid">
      <div class="four wide column"></div>
       <div class="eight wide column">
         <form class="ui form" action="{{route('estudantes.store')}}" method="post">
           {{ csrf_field() }}

                <div class="field">
                  <div class="field">
                      <label>Estudadante</label>
                    <input placeholder="Introduza o primeiro nome" type="text" name="primeiro_nome" id="primeiro_nome" value="Nome do estudante da linha seleccionada">
                  </div>
                </div>
                <div class="field">
                <label>Tema</label>
                <select class="ui search dropdown" name="curso_id" id="curso_id">
                  <option value="0">Escolha o tema que pretende aloca-lo</option>
                  <option value=""></option>
                </select>
              </div>
              <div class="field">
                <label>Supervisor principal</label>
                <select class="ui search dropdown" name="curso_id" id="curso_id">
                  <option value="0">Escolha o supervisor principal</option>
                  <option value=""></option>
                </select>
              </div>
              <div class="field">
               <label>Co-supervisores</label>
               <select multiple="" class="ui dropdown">
                 <option value="">Escolha o(s) co-supervisor(es)</option>
                 <option value="AF">dr Vali Issufo</option>
                 <option value="AX">Eng. Ruben Manhica</option>
                 <option value="AL">Enga Tatiana Kovalenko</option>
               </select>
             </div>
             <div class="field"style="padding-top:10px">

                   <button type="submit" class="fluid ui green button" onsubmit="validacao()">Gravar</button>

             </div>
         </form>
       </div>
    </div>
  </div>
</div>
