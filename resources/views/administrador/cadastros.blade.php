@extends('layouts.admin')
@section('title', '| Area do Adrministrador')
@section('secundary_nav')
  @include('partials._admin_cadastros_nav')
@endsection
@section('content_Area')
<div class="ui grid">
  <div class="four column row">
    <div class="right floated column">
        <button class="ui green button" onclick="show_model()"><i class="plus icon"></i>Novo departamento</button>
    </div>
  </div>
</div>
<table class="ui compact celled definition table">
<thead>
<tr>
  <th></th>
  <th>Designacao</th>
  <th>SIGLA</th>
  <th>Chefe</th>
  <th>Accao</th>
</tr>
</thead>
<tbody>
@foreach($departamentos as $departamento)
<tr>
  <td class="collapsing">
    <div class="ui fitted slider checkbox">
      <input type="checkbox"> <label></label>
    </div>
  </td>
  <td>{{$departamento->designacao}}</td>
  <td>{{$departamento->sigla}}</td>
  <td>{{$departamento->designacao}}</td>
  <td>

  </td>
</tr>
@endforeach
</tbody>
</table>
@endsection
