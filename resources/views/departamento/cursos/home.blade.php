@extends('layouts.departamento')
@section('side_nav')
@include('partials.departamento._verticalnav')
@stop
@section('scripts')
<script type="text/javascript">
function progresso(id) {
  $('#example'+id).progress();
}
</script>
@stop
@section('content')
<div class="ui grid">
    <div class="four column row">
      <div class="ui breadcrumb left floated">
        <a href="{{url('/feuem/'.$curso->departamento->sigla)}}" class="section">Home</a>
        <i class="right arrow icon divider"></i>
        <a href="{{url('/feuem/'.$curso->departamento->sigla.'/'.$curso->id)}}"class="active section">{{$curso->designacao}}</a>
      </div>
    </div>
    <div class="six column row">
      <div class="ui top attached tabular menu" onclick="tab()">
        <a class="item active" data-tab="tl">Visão global</a>
        <a class="item" data-tab="areas">Áreas de Interesse</a>
        <a class="item" data-tab="temas">Temas</a>
      </div>
      <div class="ui bottom attached tab segment active" data-tab="tl">
      @include('departamento.cursos.index')
      </div>
      <div class="ui bottom attached tab segment" data-tab="areas">
        @include('departamento.areas.index')
      </div>
      <div class="ui bottom attached tab segment" data-tab="temas">
        @include('departamento.temas.index')
      </div>

  </div>
</div>
@endsection
<script type="text/javascript">
function tab() {
  $('.tabular.menu .item')
  .tab();
}
function model_areas() {
  $('.ui.small').modal({
    allowMultiple: false,
  });
$('#areas').modal('show');
}
function model_temas() {
  $('.ui.small.modal')
$('#temas').modal('show');
}
</script>
