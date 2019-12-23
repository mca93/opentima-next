@extends('layouts.departamento')
@section('side_nav')
@include('partials.departamento._verticalnav')
@stop
@section('stylesheets')
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.css')}}">
@stop
@section('scripts')
<script type="text/javascript" src="{{asset('/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
$('#example').DataTable();
});
function model(proposta_tema, candidato) {
  document.getElementById("proposta_tema_id").value=proposta_tema.id;
  document.getElementById("candidato_tema_id").value=candidato.id;

  $('.ui.mini.modal')
.modal('show');
}
</script>
@stop
@section('content')
<div class="ui grid">
    <div class="four column row">
      <div class="ui breadcrumb left floated">
        <a href="{{url('/feuem/'.$departamento->sigla)}}" class="section">Home</a>
        <i class="right arrow icon divider"></i>
        <a href="{{url('/feuem/'.$departamento->sigla.'/propostas_de_temas')}}"class="section">Propostas de temas</a>
        <i class="right arrow icon divider"></i>
        <a href="{{url('/feuem/'.$departamento->sigla.'/propostas_de_temas')}}"class="active section">{{$proposta_tema->designacao}}</a>
      </div>
    </div>
<div class="twelve wide column">
  <table class="ui selectable very basic table" id="example">
     <thead>
       <th>Candidatos</th>
       <th>Anexo 5</th>
       <th class="right aligned">detalhes</th>
     </thead>
     <tbody>
       @foreach($candidatos as $candidato)
         <tr>
           <td>{{$candidato->cod_estudante}}</td>
           <td>
             <h4 class="ui image header">
               <div class="">
                  <a class="ui basic label"><i class="file icon"></i>baixar anexo 5</a><br/>
               </div>
            </h4>
          </td>
          </td>
          <td class="right aligned">
            <a class="ui teal basic button" href="{{url('/feuem/'.$departamento->sigla.'/propostas_de_temas/'.$proposta_tema->id.'/validacao/'.$candidato->id)}}"><i class="check icon"></i>Validar</a>
         </td>
       </tr>
       @endforeach
   </tbody>
  </table>
</div>
  </div>
</div>
@endsection

<div class="ui mini modal">
  <i class="close icon"></i>
  <div class="header">Aprovar a candidatura</div>
  <div class="content">
    <form class="ui form" action="{{url('/feuem/'.$departamento.'/propostas_de_temas/validacao')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="proposta_tema_id" id="proposta_tema_id" >
        <input type="hidden" name="candidato_tema_id" id="candidato_tema_id" >

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
