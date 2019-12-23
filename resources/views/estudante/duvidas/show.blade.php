@extends('layouts.departamento')
@section('side_nav')
@include('partials.estudante._verticalnav')
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
function tab(){
  $('.secondary.menu .item')
    .tab();
}

function model() {
  $('.ui.modal')
.modal('show');
}
</script>
@stop
@section('content')
 <div class="ui main container">
   <div class="ui stackable grid">
     <div class="eight wide column">
       <div class="ui breadcrumb left floated">
         <a href="{{url('/feng/estudantes/'.$supervisao->id)}}" class="section">Home</a>
         <i class="right arrow icon divider"></i>
         <a href="#"class="active section">Dúvidas</a>
       </div>
     </div>
     <div class="twelve wide column">
       <div class="content">
          <a class="item"><h2>{{$duvida->designacao}}</h2></a>
         <div class="sub header">
           <a class="ui teal label"><i class="unhide icon">22</i><i class="Info Circle icon">{{count($duvida->respostas)}} respostas</i></a>
         </div>
       </div>
      </div>
      <div class="four wide column">
        <button class="ui teal button" onclick="model()"><i class="plus icon"></i>Resposta</button>
      </div>
        <div class="twelve wide column">
          <table class="ui selectable very basic table" id="example">
             <thead>
               <th>Info. da resp.</th>
               <th>Resposta</th>
               <th class="right aligned">detalhes</th>
             </thead>
             <tbody>
               @foreach($duvida->respostas as $resposta)
                 <tr>
                   <td>
                       <div class="content">
                          <i class="Caret up icon"></i><br/>
                          <i class="ui green basic label">1</i><br/>
                          <i class="Caret Down icon"></i>

                       </div>
                    </td>
                     <td>
                       <div class="content">
                          {{$resposta->resposta}}
                          <div class="sub header">
                            <a class="ui teal label"><i class="unhide icon">22</i><i class="Thumbs Up icon">2</i></a>
                          </div>
                        </div>
                      </td>
                  <td class="right aligned">
                    <a class="ui basic image label">
                      <img src="/images/avatar/small/veronika.jpg">
                      {{$resposta->usuario->first_name}}
                      <div class="detail">respondeu em:<br/> {{$resposta->created_at}}</div>
                    </a>
                 </td>
               </tr>
               @endforeach
             <tbody>
          </table>
          </div>
   </div>
</div>
@endsection
<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">Esclarecendo uma Dúvida</div>
  <div class="content">
    <form class="ui form" action="{{url('/feng/estudantes/'.$supervisao->id.'/duvidas/'.$duvida->id.'/resposta')}}" method="post">
        {{ csrf_field() }}
          <input type="hidden" name="duvida_id" id="duvida_id" >
        <div class="field">
            <label>Resposta da dúvida</label>
            <textarea multiple="" class="ui dropdown" name="resposta"></textarea>
        </div>
        <div class="field">
              <label for="file" class="ui icon button">
                  <i class="Upload icon"></i>
                  Anexar um ficheiro ilustrativo(OPCIONAL)</label>
              <input type="file" id="file" style="display:none" name="file">
        </div>
        <div class="field">
          <button type="submit" class="fluid ui green button" onsubmit="">Gravar</button>
        </div>
    </form>
  </div>
</div>
