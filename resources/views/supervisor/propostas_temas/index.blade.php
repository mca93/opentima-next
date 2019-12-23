@extends('layouts.departamento')
@section('side_nav')
  @include('partials.admin._verticalnav')
@stop
@section('content')
<div style="margin-top:20px;"></div>
 <div class="ui grid">
   <div class="four column row">
       <div class="ui breadcrumb left floated">
         <a href="{{url('/feng/supervisores/'.$docente->id)}}" class="section">Home</a>
         <i class="right arrow icon divider"></i>
         <div class="active section">My themes proposals</div>
       </div>
   </div>
   <div class="four column row">
     <div class="right floated column">
       <button class="ui teal button" onclick="model()"><i class="plus icon"></i>New Theme proposal</button>
     </div>
    </div>
</div>
<div style="margin-top:20px;"></div>
<div class="ui main content">

   <table class="ui selectable single line table">
     <thead>
       <tr>
         <th>Theme</th>
         <th>Candidates</th>
         <th>Details</th>
       </tr>
     </thead>
     <tbody>
       @foreach($docente->proposta_temas as $proposta_tema)
       <tr>
         <td>{{$proposta_tema->designacao}}</td>
         <td>{{$proposta_tema->total_candidatos}}</td>
         <td>
           <div class="ui animated fade green button" tabindex="0">
             <div class="visible content">View</div>
             <div class="hidden content">
               <a href="#"><i class="unhide icon"></i></a>
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
  <div class="header">New Theme Proposal</div>
  <div class="content">
    <form class="ui form" action="{{url('/feng/supervisores/'.$docente->id.'/meus_temas/create')}}" method="post">
        {{ csrf_field() }}
      <div class="field">
        <label>Designation</label>
              <input placeholder="designacao" type="text" name="designacao"></input>
      </div>

        <div class="field">
          <label>Scientif area of the theme</label>
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
