@extends('layouts.layout')
@section('title', '|Página principal')
@section('content')

@endsection
@section('left_sidebar')
<div class="jumbotron">
  <div class="panel panel-default" style="width: inherit; height: inherit;">
    <div align="center" class="panel-heading">Sistema de Gestao dos Trabalhos do final do curso</div>
    <div align="center" class="panel-body"><a><img src="{{asset("/pic/chapeu.jpg")}} "    style="height: 100px;width: 100px;"><p>Consulte a progressao do seu estudante</p></a></div>
    <div align="center" class="panel-body"><a><img src="{{asset("/pic/professor.jpg")}} " style="height: 100px;width: 100px;"><p>Faca Gestao do seus Docentes</p></a></div>
    <div align="center" class="panel-body"><a><img src="{{asset("/pic/icon.png")}} "      style="height: 100px;width: 100px;"><p>Visualizar trabalhos realizados pelos estudantes</p></a></div>
  </div>
</div>
@endsection
@section('right_sidebar')
<div class="jumbotron">
  <div class="panel panel-default" style="width: inherit; height: inherit;">
    <div class="panel-heading">Trabalhos defendidos pelos estudantes</div>
    <div class="panel-body"><a href="#">Sistemas de gestao do horario da Faculdade</a></div>
    <div class="panel-body"><a href="#">Sistemas de gestao dos trabalhos de Licenciatura</a></div>
    <div class="panel-body"><a href="#">Sistemas de gestao...</a></div>
    <div class="panel-body"><a href="#">Sistemas de gestao ...</a></div>
    <div class="panel-body"><a href="#">Ver mais...</a></div>
  </div>
</div>
@endsection
