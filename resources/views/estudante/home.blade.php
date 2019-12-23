@extends('layouts.departamento')
@section('side_nav')
  @include('partials.estudante._verticalnav')
@stop
@section('scripts')
  <script type="text/javascript">
  $(document).ready(function() {
    $('#example1').progress();
  });
  </script>
@stop
@section('content')
<div class="ui cards">
 <div class="ui link card">
     <div class="content">
       <div class="header"><a href="{{url('/feng/estudantes/'.$supervisao->id.'/actas')}}"><i class="folder icon"></i>Actas</a></div>
       <div class="description">
         <table class="ui small very compact unstackable selectable olive table">
           <thead>
             <tr>
               <th colspan="2">
                 Ref do tema:{{$supervisao->tema->referencia}}
               </th>
             </tr>
           </thead>

           <tbody>
             <tr>
               <td><i class="users icon"></i>Validadas</td>
               <td class="right aligned">{{$actas_validas}}</td>
             </tr>
             <tr>
               <td><i class="users icon"></i>Submetidas</td>
               <td class="right aligned">{{$total_actas}}</td>
             </tr>
           </tbody>
         </table>

       </div>
     </div>
 </div>
 <div class="ui link card">
     <div class="content">
       <div class="header"><a href="#"><i class="database icon"></i>Versões do trabalho</a></div>
       <div class="description">
         <table class="ui small very compact unstackable selectable olive table">
           <thead>
             <tr>
               <th colspan="2">
                 Ref do tema: {{$supervisao->tema->referencia}}
               </th>
             </tr>
           </thead>

           <tbody>
             <tr>
               <td>
                 @if($supervisao->progresso < 80)
                 <button class="ui teal button" onclick="model()" disabled="true"><i class="student icon"></i>Submeter relatório final</button>
                 @else
                 <button class="ui teal button" onclick="model_monografia()"><i class="student icon"></i>Submeter relatório final</button>
                 @endif
              </td>
             </tr>
             <tr>
               <td><i class="student icon"></i>Submetidas</td>
               <td class="right aligned">15</td>
             </tr>
           </tbody>
         </table>
       </div>
     </div>
 </div>
 <div class="ui link card">
   <div class="content">
     <div class="header"><a href="{{url('/feng/estudantes/'.$supervisao->id.'/duvidas')}}"><i class="announcement icon"></i>Log de duvidas</a></div>
     <table class="ui small very compact unstackable selectable olive table">
       <thead>
         <tr>
           <th colspan="2">
             Ref do tema: {{$supervisao->tema->referencia}}
           </th>
         </tr>
       </thead>
       <tbody>
         <tr>
           <td><i class="users icon"></i>Metodologias de investigacao</td>
           <td class="right aligned">
             <i class="">2</i>
           </td>
         </tr>
         <tr>
           <td><i class="users icon"></i>Revisao de literatura</td>
           <td class="right aligned"><i class="">5</i></td>
         </tr>
         <tr>
           <td><i class="users icon"></i>Outras</td>
           <td class="right aligned"><i class="">5</i></td>
         </tr>
       </tbody>
     </table>
   </div>
 </div>
</div>
 <div class="ui main container">
   <div class="ui stackable grid">
         <div class="eight wide column">
           <div class="ui segment">
             <div class=" {{($supervisao->progresso < 50 ) ? "ui active red progress": ""}}{{($supervisao->progresso > 50 ) ? "ui active green progress": ""}}" data-percent="{{$supervisao->progresso}}" id="example1">
               <div class="bar">{{$supervisao->progresso.'%'}}</div>
               <div class="label">Progresso do trabalho</div>
             </div><div class="progress"></div>
           </div>
         </div>
         <div class="eight wide column">
           <div class="ui warning message">
             <div class="header">
                Data prevista para o proximo encontro!
               </div>
             <p>12-05-2017</p>
           </div>
         </div>
     <div class="twelve wide column">
       <div class="ui top attached tabular menu" onclick="tab()">
         <a class="item active" data-tab="first">Actividades em progresso</a>
         <a class="item" data-tab="second">Actividades por iniciar</a>
         <a class="item" data-tab="third">Actividades terminadas</a>
       </div>

       <div class="ui bottom attached tab active segment" data-tab="first">
         <table class="ui small very compact unstackable selectable olive table">
          <thead>

          </thead>
           <tbody>
             @foreach($supervisao->actividades as $actividade)
             @if($actividade->estado=='Progresso')
              <tr>
                <td>
                  <a class="ui green tag label">{{$actividade->designacao}}</a>
                </td>
                <td class="right aligned">
                     <div class="ui dropdown item">
                       <i class="ellipsis vertical icon"></i>
                       <div class="menu">
                         <a class="item" href="{{url('/feng/estudantes/actividades/'.$actividade->id.'/Iniciado')}}">Interroper</a>
                         <a class="item" href="{{url('/feng/estudantes/actividades/'.$actividade->id.'/Terminado')}}">Terminar</a>
                       </div>
                   </div>
                </td>
              </tr>
              @endif
              @endforeach
           </tbody>
         </table>
       </div>
       <div class="ui bottom attached tab segment" data-tab="second">
         <table class="ui small very compact unstackable selectable olive table">
          <thead>

          </thead>
           <tbody>
            @foreach($supervisao->actividades as $actividade)
            @if($actividade->estado=='Iniciado')
             <tr>
               <td>
                 <a class="ui red tag label">{{$actividade->designacao}}</a>
               </td>
               <td class="right aligned">
                    <div class="ui dropdown item">
                      <i class="ellipsis vertical icon"></i>
                      <div class="menu">
                        <a class="item" href="{{url('/feng/estudantes/actividades/'.$actividade->id.'/Progresso')}}">Em progresso</a>
                        <a class="item" href="{{url('/feng/estudantes/actividades/'.$actividade->id.'/Terminado')}}">Terminar</a>
                      </div>
                  </div>
               </td>
             </tr>
             @endif
             @endforeach
           </tbody>
         </table>
       </div>
       <div class="ui bottom attached tab segment" data-tab="third">
         <table class="ui small very compact unstackable selectable olive table">
          <thead>

          </thead>
           <tbody>
             @foreach($supervisao->actividades as $actividade)
             @if($actividade->estado=='Terminado')
              <tr>
                <td>
                  <a class="ui yellow tag label">{{$actividade->designacao}}</a>
                </td>
                <td class="right aligned">
                     <div class="ui dropdown item">
                       <i class="ellipsis vertical icon"></i>
                       <div class="menu">
                         <a class="item" href="{{url('/feng/estudantes/actividades/'.$actividade->id.'/Iniciado')}}">Desfazer</a>
                         <a class="item" href="{{url('/feng/estudantes/actividades/'.$actividade->id.'/Progresso')}}">Retomar</a>
                       </div>
                   </div>
                </td>
              </tr>
              @endif
              @endforeach
           </tbody>
         </table>
       </div>
     </div>
     <div class="four wide column">
       <button class="ui teal button" onclick="model()"><i class="plus icon"></i>Nova Actividade</button>
     </div>
   </div>
</div>
@endsection
<script type="text/javascript">
function dimmer() {
  $('.special.cards .image').dimmer({
  on: 'hover'
  });
}
function tab() {
  $('.tabular.menu .item')
  .tab();
}
function model() {
  $('.ui.small.modal')
.modal('show');
}

function model_monografia() {
  $('.ui.basic.modal')
.modal('show');
}
</script>
<div class="ui small modal">
  <i class="close icon"></i>
  <div class="header">Nova Actividade</div>
  <div class="content">
    <form class="ui form" action="{{url('/feng/estudantes/'.$supervisao->id.'/actividades/create')}}" method="post">
        {{ csrf_field() }}
      <div class="field">
        <label>Desgnação</label>
              <input placeholder="designacao" type="text" name="designacao">
      </div>
      <div class="three wide fields">
        <div class="field">
          <label>Peso(%)</label>
          <select class="ui fluid search dropdown" name="peso">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="25">25</option>
            <option value="3">30</option>
          </select>
        </div>
        <div class="field">
          <label>Estado</label>
          <select class="ui fluid search dropdown" name="estado">
            <option value="Progresso">Em progresso</option>
            <option value="Iniciado">Por começar</option>
          </select>
        </div>
        <div class="field">
          <label>Prioridade</label>
          <select class="ui fluid search dropdown" name="prioridade">
            <option value="Normal">Normal</option>
            <option value="Media">Média</option>
            <option value="Alta">Alta</option>
          </select>
        </div>
      </div>
      <div class="field">
        <div class="field">
            <label>Descrição da actividade</label>
            <textarea name="descricao"></textarea>
        </div>
        <div class="field">
          <button type="submit" class="fluid ui green button" onsubmit="">Gravar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="ui basic modal">
  <i class="close icon"></i>
  <div class="header">Sumbeter o relatório final do seu trabalho</div>
  <div class="content">
    <form class="ui form" action="{{url('/feng/estudantes/'.$supervisao->id.'/monografia')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="field">
              <label for="file" class="ui icon button">
                  <i class="Upload icon"></i>
                  Anexar o ficheiro da acta em pdf</label>
              <input type="file" id="file" style="display:none" name="file">
        </div>
        <div class="field">
          <button type="submit" class="fluid ui green button" onsubmit="">Gravar</button>
        </div>
      </div>
    </form>
  </div>
</div>
