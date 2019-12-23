@extends('layouts.departamento')
@section('side_nav')
  @include('partials.admin._verticalnav')
@stop
@section('scripts')
  <script type="text/javascript">
  function progresso(id) {
    $('#example'+id).progress();
  }

  // $(document).ready(function() {
  //
  //   $('#example1').progress();
  // });
  </script>
@section('content')
<div class="ui cards">
 <div class="ui link card">
     <div class="content">
       <div class="header"><a href="#"><i class="folder icon"></i>My Mentees</a></div>
       <div class="description">
         <table class="ui small very compact unstackable selectable olive table">
           <thead>
           </thead>

           <tbody>
             <tr>
               <td><i class="users icon"></i>TL</td>
               <td class="right aligned">5</td>
             </tr>
             <tr>
               <td><i class="users icon"></i>EP</td>
               <td class="right aligned">10</td>
             </tr>
           </tbody>
         </table>

       </div>
     </div>
 </div>
 <div class="ui link card">
     <div class="content">
       <div class="header"><a href="{{url('/feng/supervisores/'.$docente->id.'/calendario')}}"><i class="database icon"></i>Plan mentorship meetings</a></div>
       <div class="description">
         <table class="ui small very compact unstackable selectable olive table">
           <thead>
           </thead>

           <tbody>

           </tbody>
         </table>
       </div>
     </div>
 </div>
 <div class="ui link card">
   <div class="content">
     <div class="header"><a href="{{url('/feng/supervisores/'.$docente->id.'/meus_temas')}}"><i class="announcement icon"></i>My themes proposals</a></div>
     <table class="ui small very compact unstackable selectable olive table">
       <thead>
         <tr>
           <th colspan="2">
             <button class="ui teal button" onclick="model()"><i class="plus icon"></i>Propose new theme</button>
           </th>
         </tr>
       </thead>
       <tbody>
       </tbody>
     </table>
   </div>
 </div>
</div>
<div style="margin-top:20px;"></div>
 <div class="ui main container">
   <table class="ui selectable single line table">
     <thead>
       <tr>
         <th>Mentee</th>
         <th>Ref. of the theme</th>
         <th>#Mentorship reports</th>
         <th>Thesis</th>
         <th>Doubts submitted</th>
         <th>Progress</th>
         <th>Next mentorship meeting</th>
         <th>Details</th>
       </tr>
     </thead>
     <tbody>
       @foreach($docente->supervisaos as $supervisao)
       <tr>
         <td>{{$supervisao->estudante->primeiro_nome.' '.$supervisao->estudante->ultimo_nome}}</td>
         <td>{{$supervisao->tema->referencia}}</td>
         <td>{{count($supervisao->actas)}}</td>
         <td>2</td>
         <td>{{count($supervisao->estudante->duvidas)}}</td>
         <td onclick="progresso({{$supervisao->id}})">
            <div class=" {{($supervisao->progresso < 50 ) ? "ui active red progress": ""}}{{($supervisao->progresso > 50 ) ? "ui active green progress": ""}}" data-percent="{{$supervisao->progresso}}" id="example{{$supervisao->id}}">
               <div class="bar">{{$supervisao->progresso.'%'}}</div>
             </div><div class="progress"></div>
         </td>
         <td>10.05.2017</td>
         <td>
           <div class="ui animated fade green button" tabindex="0">
             <div class="visible content">View</div>
             <div class="hidden content">
               <a href="{{url('/feng/supervisores/'.$docente->id.'/supervisandos/'.$supervisao->id)}}"><i class="unhide icon"></i></a>
             </div>
           </div>
         </td>
       </tr>
       @endforeach
      </tbody>
   </table>
</div>
@endsection
<script type="text/javascript">
function dimmer() {
  $('.special.cards .image').dimmer({
  on: 'hover'
  });
}
function model() {
  $('.ui.small.modal')
.modal('show');
}
</script>
<div class="ui small modal">
  <i class="close icon"></i>
  <div class="header">New theme proposal</div>
  <div class="content">
    <form class="ui form" action="#" method="post">
        {{ csrf_field() }}
      <div class="field">
        <label>Designation</label>
              <input placeholder="designacao" type="text" name="designacao">
      </div>

        <div class="field">
          <label>Scientific area of the theme</label>
          <select class="ui fluid search dropdown" name="area">
            @foreach($docente->areas as $area)
            <option value="{{$area->id}}">{{$area->designacao}}</option>
            @endforeach
          </select>
        </div>

        <div class="field">
            <label>Description</label>
            <textarea name="descricao"></textarea>
        </div>
        <div class="field">
          <button type="submit" class="fluid ui green button" onsubmit="">Save</button>
        </div>
      </div>
    </form>
</div>
