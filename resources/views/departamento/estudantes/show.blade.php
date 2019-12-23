@extends('layouts.departamento')
@section('side_nav')
@include('partials.departamento._verticalnav')
@stop
@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
  $('#example1').progress();
});
</script>
@stop
@section('content')
<div class="ui grid">
  <div class="four column row">
      <div class="ui breadcrumb left floated">
        <a href="{{url('/feuem/'.$estudante->curso->departamento->sigla)}}" class="section">Home</a>
        <i class="right arrow icon divider"></i>
        <a href="{{url('/feuem/'.$estudante->curso->departamento->sigla.'/'.$estudante->curso->id)}}"class="section">{{$estudante->curso->designacao}}</a>
        <i class="right arrow icon divider"></i>
        <div class="active section">{{$estudante->primeiro_nome.' '.$estudante->ultimo_nome}}</div>
      </div>
  </div>
</div>
<div class="ui main container">
  <div class="ui stackable grid">
        <div class="twelve wide column">
          <div class="ui segment">
            <div class=" {{($supervisao->progresso < 50 ) ? "ui active red progress": ""}}{{($supervisao->progresso > 50 ) ? "ui active green progress": ""}}" data-percent="{{$supervisao->progresso}}" id="example1">
               <div class="bar">{{$supervisao->progresso.'%'}}</div>
             </div><div class="progress"></div>
          </div>
        </div>
        <div class="four wide column">
          <button type="button" name="notificacao" class="ui teal large button" onclick="model()"><i class="inbox icon"></i>Notificar aqui</button>
        </div>
   </div>
   <div class="ui horizontal divider"> </div>
   <div class="ui grid">
       <div class="eight wide column">
         <div class="ui segment">
         <div class="ui header">
          <i><b>Actas Submetidas</b></i>
         </div>
         <div class="content">
                   <table class="ui selectable olive table">
                     <thead>
                       <th>Designação</th>
                       <th>O ficheiro</th>
                       <th class="positive right aligned">Estado</th>
                     </thead>
                     <tbody>
                       @foreach($supervisao->actas as $acta)
                       <tr class="{{($acta->estado == 'Valida')? "positive aligned": ""}}{{($acta->estado != 'Valida')? "negative aligned": ""}}">
                         <td><a href="#"> <i class="file icon"></i>{{$acta->id.'a'}} acta</a></td>
                         <td><a href="{{route('download', ['acta_id'=>$acta->id])}}"><i class="file icon"></i></a></td>
                         <td><i>{{$acta->estado}}</i></td>
                       </tr>
                       @endforeach
                     </tbody>
                   </table>

           </div>
         </div>
         </div>
       <div class="eight wide column">
         <div class="ui segment">
         <div class="ui header">
           Versões de trabalhos
         </div>
         <div class="content">
           <div class="content">
                     <table class="ui selectable olive table">
                       <thead>
                         <tr class="ui header">
                           <td>Designação da parte</td>
                           <td class="right aligned">Estado</td>
                         </tr>
                       </thead>

                       <tbody>
                         <tr>
                           <td><a href="#">Introdução</a></td>
                           <td class="positive right aligned"><i>Comentada</i></td>
                         </tr>
                         <tr>
                           <td><a href="#">Revisão de literatura</a></td>
                           <td class="negative right aligned"><i class="ui danger">Sem feedback</i></td>
                         </tr>
                       </tbody>
                     </table>

             </div>
           </div>
         </div>
         </div>
  </div>
</div>
@endsection
<script type="text/javascript">
$('.ui.accordion')
  .accordion()
;
function model() {
  $('.ui.small.modal')
.modal('show');
}
</script>
<div class="ui small modal" id="temas">
  <i class="close icon"></i>
  <div class="header">Registo do tema</div>
  <div class="content">
    <form class="ui form" method="post" action="{{url('/feuem/'.$departamento->sigla.'/'.$estudante->curso->id.'/estudantes/'.$estudante->id.'/notificacao_interveniente')}}">
      {{csrf_field()}}
      <input type="hidden" name="supervisao_id" value="{{$supervisao->id}}">
        <div class="field">
          <label>Notificar</label>
          <select class="ui fluid search dropdown" name="destinatario">
            <option value="0">Escolha a que notificar</option>
            <option value="estudante">Estudante: {{$supervisao->estudante->primeiro_nome.' '.$supervisao->estudante->ultimo_nome}}</option>
            <option value="supervisor">Supervisor: {{$supervisao->docente->primeiro_nome.' '.$supervisao->docente->ultimo_nome}}</option>
            <option value="-1">Ambos</option>
          </select>
        </div>
        <div class="field">
          <label>Estudante</label>
          <textarea class="ui fluid search dropdown" name="mensagem">
          </textarea>
        </div>

        <div class="field">
          <button type="submit" class="fluid ui green button" onsubmit="">Notificar</button>
        </div>
      </form>
    </div>
  </div>
