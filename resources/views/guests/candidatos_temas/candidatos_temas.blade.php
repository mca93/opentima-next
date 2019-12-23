@extends('layouts.guests.candidatos')
@section('stylesheets')
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.css')}}">
@stop
@section('scripts')
<script type="text/javascript" src="{{asset('/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
$('#example').DataTable();
} );
</script>
@stop
@section('title', '|Login')
@section('content')
<div class="ui middle aligned center aligned grid" style="padding-top: 10px">
  <div class="two wide column">
  </div>
  <div class="twelve wide column">
    <h2 class="ui image header">
        <div class="content">
          <div class="ui larg image">
            <img src="/guest/img/logo.png" height="140" width="120" alt="Universidade Eduardo Mondlane - Faculdade de Engenharia"/>
          </div>
        </div>
      </h2>
  </div>
  <div class="two wide column">
  </div>
  <div class="twelve wide column">
    <div class="ui horizontal divider">#</div>
  </div>
  <div class="twelve wide column">
      @include('partials._messages')
  </div>
  <div class="twelve wide column">
      <table class="ui selectable very basic table" id="example">
         <thead>
           <th>Theme Details</th>
           <th class="right aligned">Candidates</th>
         </thead>
         <tbody>
           @foreach($propostas_de_temas as $tema)
             <tr onClick="model({{$tema}})">
               <td>
                 <h4 class="ui image header">
                   <img src="/images/avatar2/small/lena.png" class="ui mini rounded image">
                   <div class="content">
                     {{$tema->designacao}}
                     <div class="sub header">{{$tema->docente_proponente->primeiro_nome.' '.$tema->docente_proponente->ultimo_nome}}
                   </div>
                 </div>
                </h4>
              </td>
             <td class="right aligned">
               {{$tema->total_candidatos}}
             </td>
           </tr>
          @endforeach
       </tbody>
     </table>
</div>
<div class="four wide column">
  <div class="ui raised red segment" id="descricao">
    <p><b>Click on the theme of your interest to apply for it.</b></p>
  </div>
</div>
</div>
<div style="margin-top:20px;" id='calendar'></div>
@stop
<script type="text/javascript">
function model(tema) {
   document.getElementById("proposta_do_tema").innerHTML=tema.designacao;
   //document.getElementById("descricao").innerHTML=tema.descricao;
    document.getElementById("tema_id").value=tema.id;
  $('.ui.small.modal')
.modal('show');

}
</script>

<div class="ui small modal">
  <i class="close icon"></i>
  <div class="header" id="proposta_do_tema"></div>
  <div class="content">
    <form class="ui form" action="{{url('/feng/propostas_de_temas/candidatar-se')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="tema_id" id="tema_id" >
        <div class="field">
          <label>Work Id:</label>
            <div class="ui input left icon">
              <i class="student icon"></i>
              <input type="text" placeholder="Exemplo: 233246" name="cod_estudante">
            </div>
        </div>
        <div class="field">
          <label>Specify the problem you willing to solve:</label>
            <div class="ui input left icon">
              <i class="cloud icon"></i>
              <input type="text" placeholder="Maximum of 120 characters" name="problema">
            </div>
        </div>
      <div class="field">
        <label>Describe the problem:</label>
        <textarea class="ui fluid search dropdown" name="descricao_do_problema" placeholder="Make a short description of the problem you willing to solve.">
        </textarea>
      </div>
      <div class="field">
            <label for="file" class="ui icon button">
                <i class="Upload icon"></i>
                Upload a file(pdf only)</label>
            <input type="file" id="file" style="display:none" name="file">
      </div>
        <div class="field">
          <button type="submit" class="fluid ui green button" onsubmit="">Save</button>
        </div>
      </div>
    </form>
</div>
