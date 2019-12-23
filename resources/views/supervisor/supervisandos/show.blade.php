@extends('layouts.departamento')
@section('side_nav')
  @include('partials.admin._verticalnav')
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
$(document).ready(function() {
  $('#example1').progress();
});
$(document).ready(function() {
  $('#example2').progress();
});
$(document).ready(function() {
  $('#example3').progress();
});
function model() {
  $('.ui.mini.modal')
.modal('show');
}
function parecer_monografia(monografia) {
  document.getElementById("monografia_id").value=monografia.id;
  $('.ui.large.modal')
  .modal('show');
}
function validacao(acta) {
  //document.getElementById("proposta_do_tema").innerHTML=tema.designacao;
  //document.getElementById("descricao").innerHTML=tema.descricao;
   document.getElementById("acta_id").value=acta.id;
  $('.ui.small.modal')
.modal('show');
}
</script>
@stop
@section('content')
 <div class="ui main container">
   <div class="ui grid">
     <div class="ten wide column">
       <div class="eight wide column">
         <div class="ui breadcrumb left floated">
           <a href="{{url('/feng/supervisores/'.$docente->id)}}" class="section">Home</a>
           <i class="right arrow icon divider"></i>
           <a href="#"class="active section">{{$supervisao->estudante->primeiro_nome.' '.$supervisao->estudante->ultimo_nome}}</a>
         </div>
       </div>
     </div>
     <div class="six wide column">
       <div class="ui warning message">
         <div class="header">
            Next mentorship date!
           </div>
         <p>12-05-2019</p>
       </div>
     </div>
     <div class="fourteen wide column">
       <div class="ui top attached tabular menu" onclick="tab()">
         <a class="item active" data-tab="first">Mentorship resumes</a>
         <a class="item" data-tab="second">Doubts</a>
         <a class="item" data-tab="third">Thesis versions</a>
       </div>
       <div class="ui bottom attached tab active segment" data-tab="first">
         <div class="eigth wide column">
           <div class="ui segment">
             <div class=" {{($supervisao->progresso < 50 ) ? "ui active red progress": ""}}{{($supervisao->progresso > 50 ) ? "ui active green progress": ""}}" data-percent="{{$supervisao->progresso}}" id="example1">
               <div class="bar">{{$supervisao->progresso.'%'}}</div>
               <div class="label">Progress</div>
             </div><div class="progress"></div>
           </div>
         </div>
         <h4 class="ui horizontal divider header">
          <i class="tag icon"></i>
        </h4>
         <table class="ui selectable olive table">
           <thead>
           </thead>
            <th>Designation</th>
            <th>Activities</th>
            <th>Mentorship date</th>
            <th>Status</th>
            <th>Actions</th>
           <tbody>
             @foreach($supervisao->actas as $acta)
             <tr class="{{($acta->estado == 'Valida')? "positive aligned": ""}}{{($acta->estado != 'Valida')? "negative aligned": ""}}">
               <td><a href="#"> <i class="file icon"></i>{{$acta->id.'a'}} resume</a></td>
               <td>
                 @foreach($acta->actividades as $actividade)
                 <i class="Rocket icon"></i>{{$actividade->designacao}}<br/>
                 @endforeach
               </td>
               <td>{{$acta->encontro->data}}</td>
               <td>{{$acta->estado}}</td>
               <td >
                 @if($acta->estado == 'Valida')

                   <button class="ui teal basic button" disabled="true"><i class="check icon"></i></button>

                 @else

                   <button class="ui teal basic button" onclick="validacao({{$acta}})"><i class="check icon"></i></button>

                 @endif
                 <a class="ui positive basic button" href="{{route('download', ['id'=>$acta->id])}}"><i class="download icon"></i></a>


               </td>
             </tr>
             @endforeach
           </tbody>
         </table>
       </div>
       <div class="ui bottom attached tab segment" data-tab="second">
         <div class="eigth wide column">
           <div class="ui segment">
             <div class=" {{($supervisao->progresso < 50 ) ? "ui active red progress": ""}}{{($supervisao->progresso > 50 ) ? "ui active green progress": ""}}" data-percent="{{$supervisao->progresso}}" id="example2">
               <div class="bar">{{$supervisao->progresso.'%'}}</div>
               <div class="label">Progress</div>
             </div><div class="progress"></div>
           </div>
         </div>
         <h4 class="ui horizontal divider header">
          <i class="tag icon"></i>
        </h4>
         <table class="ui selectable very basic table" id="example">
            <thead>
              <th>Doubts details</th>
              <th>Doubt</th>
              <th class="right aligned">Description</th>
            </thead>
            <tbody>
              @foreach($supervisao->estudante->duvidas as $duvida)
                <tr>
                  <td>
                    <h4 class="ui image header">
                      <div class="">
                         <a class="ui green circular label">{{count($duvida->respostas)}} Responses</a><br/>
                         <a class="ui pointing teal basic label">22 Views</a>
                      </div>
                   </h4>
                 </td>
                 <td>
                   <div class="content">
                     {{$duvida->designacao}}
                     <div class="sub header">
                       @foreach($duvida->categorias as $categoria)
                       <a class="ui teal label">{{$categoria->designacao}}</a>
                       @endforeach
                     </div>
                   </div>
                 </td>
                 <td class="right aligned">
                   <a class="ui teal basic button" href="{{url('/feng/estudantes/'.$supervisao->id.'/duvidas/'.$duvida->id)}}"><i class="unhide icon"></i></a><br/>
                   <a class="ui label">
                     <img class="ui small circular centered image" src="{{ App\User::get_gravatar(Sentinel::getUser()->email) }}">
                     {{$duvida->estudante->primeiro_nome}}<br/>
                     <div class="detail">Posted on:<br/> {{$duvida->created_at}}</div>
                   </a>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
       </div>
       <div class="ui bottom attached tab segment" data-tab="third">
         <div class="eigth wide column">
           <div class="ui segment">
             <div class=" {{($supervisao->progresso < 50 ) ? "ui active red progress": ""}}{{($supervisao->progresso > 50 ) ? "ui active green progress": ""}}" data-percent="{{$supervisao->progresso}}" id="example3">
               <div class="bar">{{$supervisao->progresso.'%'}}</div>
               <div class="label">Progress</div>
             </div><div class="progress"></div>
           </div>
         </div>
         <table class="ui selectable very basic table">
                <thead>
                  <th>Student</th>
                  <th>Theme Ref</th>
                  <th>Status</th>

                  <th class="right aligned">Actions</th>
                </thead>
                <tbody>
                  @foreach($monografias as $monografia)
                    <tr class="{{($monografia->estado != 'Pendente')? "positive aligned": ""}}{{($monografia->estado == 'Pendente')? "negative aligned": ""}}">
                      <td>
                        <h4 class="ui image header">
                          <img src="/images/avatar2/small/lena.png" class="ui mini rounded image">
                          <div class="content">
                            {{$monografia->supervisao->estudante->primeiro_nome.' '.$monografia->supervisao->estudante->ultimo_nome}}<br/>
                          </div>
                        </div>
                       </h4>
                     </td>
                     <td>{{$monografia->supervisao->tema->referencia}}</td>
                     <td>{{$monografia->estado}}</td>
                    <td class="right aligned">
                      @if($monografia->estado !='Pendente')
                      <button class="ui teal basic button" onclick="parecer_monografia()" disabled="true"><i class="check icon"></i></button>
                      @else
                      <button class="ui teal basic button" onclick="parecer_monografia({{$monografia}})"><i class="check icon"></i></button>
                      @endif
                     <a class="ui teal basic button" href="{{url('/baixar_monografia/'.$monografia->id)}}"><i class="download icon"></i></a>

                    </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
       </div>
     </div>
     <div class="two wide column">
       <button class="ui teal button" onclick="model()"><i class="inbox icon"></i>Send an SMS</button>
     </div>
   </div>
</div>
@endsection
<script type="text/javascript">
function tab(){
  $('.tabular.menu .item')
    .tab();
}
</script>
<div class="ui mini modal">
  <i class="close icon"></i>
  <div class="header">Send an SMS to the Mentor</div>
  <div class="content">
    <form class="ui form" action="#" method="post">
        {{ csrf_field() }}
      <div class="field">
        <label>Message</label>
              <textarea placeholder="Escreva aqui a sua mensagem" type="text" name="mensagem"></textarea>
      </div>
        <div class="field">
          <button type="submit" class="fluid ui green button" onsubmit="">Send</button>
        </div>
    </form>
  </div>
</div>

<div class="ui small modal">
  <i class="close icon"></i>
  <div class="header">Validate a mentorship resume</div>
  <div class="content">
    <form class="ui form" action="{{url('/feng/supervisores/'.$docente->id.'/supervisandos/'.$supervisao->id.'/actas/validacao')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="acta_id" id="acta_id" >
        <div class="inline fields">
          <label for="">Validation of a mentorship resume</label>
          <div class="field">
            <div class="ui radio checkbox">
              <input name="estado" checked="checked" type="radio" value="Valida">
              <label>Valid (Contains the contant that the mentor recognises)</label>
            </div>
          </div>
          <div class="field">
            <div class="ui radio checkbox">
              <input name="estado" type="radio" value="Invalida">
              <label>Invalid</label>
            </div>
          </div>
        </div>
        <div class="field">
          <button type="submit" class="fluid ui green button" onsubmit="">Send</button>
        </div>
    </form>
  </div>
</div>
<div class="ui large modal">
  <i class="close icon"></i>
  <div class="header">Validate Thesis</div>
  <div class="content">
    <form class="ui form" action="{{url('/feng/supervisores/'.$docente->id.'/supervisandos/'.$supervisao->id.'/monografias/validacao')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="monografia_id" id="monografia_id">
        <div class="inline fields">
          <label for="">Validation of the thesis</label>
          <div class="field">
            <div class="ui radio checkbox">
              <input name="estado" checked="checked" type="radio" value="Valida">
              <label>Valid (Aquela que o supervisor reconhece como de mérito)</label>
            </div>
          </div>
          <div class="field">
            <div class="ui radio checkbox">
              <input name="estado" type="radio" value="Invalida">
              <label>Invalid</label>
            </div>
          </div>
        </div>
        <div class="field">
              <label for="file" class="ui icon button">
                  <i class="Upload icon"></i>
                  Attach your opnion in PDF</label>
              <input type="file" id="file" style="display:none" name="file">
        </div>
        <div class="field">
          <button type="submit" class="fluid ui green button" onsubmit="">Send</button>
        </div>
    </form>
  </div>
</div>
