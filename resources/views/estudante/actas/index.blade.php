@extends('layouts.departamento')
@section('side_nav')
@include('partials.estudante._verticalnav')
@stop
@section('content')
 <div class="ui main container">
   <div class="ui stackable grid">
     <div class="eight wide column">
       <div class="ui breadcrumb left floated">
         <a href="{{url('/feng/estudantes/'.$supervisao->id)}}" class="section">Home</a>
         <i class="right arrow icon divider"></i>
         <a href="#"class="active section">Actas</a>
       </div>
     </div>
     <div class="four wide column">
       <button class="ui teal button" onclick="model()"><i class="plus icon"></i>Nova Acta</button>
     </div>
     <div class="twelve wide column">
       <table class="ui olive table">
        <thead>
            <tr>
              <th>Ordem</th>
              <th>estado</th>
              <th class="right aligned">Acções</th>
            </tr>
        </thead>
        <tbody>
          @foreach($supervisao->actas as $acta)
            <tr>
              <td>{{$acta->id.'.ª Acta'}}</td>
              <td>{{$acta->estado}}</td>
              <td class="right aligned">
                <a class="ui positive button"><i class="pencil icon"></i></a>
                <a class="ui positive button" href="{{route('download', ['id'=>$acta->id])}}"><i class="download icon"></i></a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
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
</script>
<div class="ui small modal">
  <i class="close icon"></i>
  <div class="header">Nova Acta</div>
  <div class="content">
    <form class="ui form" action="{{url('/feng/estudantes/'.$supervisao->id.'/actas/novaActa')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="field">
          <label>Data do encontro</label>
          <select class="ui fluid search dropdown" name="encontro">
            @foreach($supervisao->encontros as $encontro)
              <option value="{{$encontro->id}}">{{$encontro->data}}</option>
            @endforeach()
          </select>
        </div>
        <div class="field">
            <label>Actividades Inclusas</label>
            <select multiple="" class="ui dropdown" name="actividades[]">
              @foreach($supervisao->actividades as $actividade)
              @if($actividade->estado =='Terminado')
              <option value="{{$actividade->id}}">{{$actividade->designacao}}</option>
              @endif
              @endforeach
            </select>
        </div>
        <div class="field">
              <label for="file" class="ui icon button">
                  <i class="Upload icon"></i>
                  Anexar o ficheiro da acta em pdf</label>
              <input type="file" id="file" style="display:none" name="file">
        </div>
        <div class="field">
          <button type="submit" class="fluid ui green button" onsubmit="">Gravar</button>
        </div>
    </form>
  </div>
</div>
