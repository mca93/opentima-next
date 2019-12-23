@extends('layouts.admin')
@section('title', '|Area do Administrador')

@section('secundary_nav')
  @include('partials._admin_cadastros_nav')
@endsection
@section('content_Area')
<div class="ui grid">
  <div class="four column row">
    <div class="right floated column">
        <button class="ui green button" onclick="show_model()"><i class="plus icon"></i>Area de Interesse</button>
    </div>
  </div>
</div>
<table class="ui table">
<thead>
<tr>
  <th>Designacao</th>
  <th>Departamento</th>
  <th>Accao</th>
</tr>
</thead>
<tbody>
@foreach($cursos as $curso)
<tr>
  <td>{{$curso->designacao}}</td>
  <td>{{$curso->departamento->sigla}}</td>
  <td>
    <a href="#" class="ui positive basic button"><i class="icon write"></i></a>
    <a href="#" class="ui negative basic button"><i class="icon remove"></i></a>
  </td>
</tr>
@endforeach
</tbody>
</table>
@endsection

@section('scripts')
<script type="text/javascript">
      function show_model() {
        $('.ui.modal')
      .modal('show');
      }
</script>
@stop
<script type="text/javascript">
function validacao() {
  $('.ui.form')
    .form({
      fields: {
        designacao: {
          identifier: 'designacao',
          rules: [
            {
              type   : 'empty',
              prompt : 'Introduza a designacao do departamento'
            }
          ]
        },
      }
    })
  ;

  }

</script>
<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Registo de Area de Interesse
  </div>
  <div class="content">
    <div class="ui grid">
      <div class="four wide column">
      </div>
      <div class="eight wide column">
        <form class="ui form" action="{{route('cursos.store')}}" method="post">
        {{ csrf_field() }}

                <div class="twelve wide field">
                  <label>Designacao</label>
                  <input placeholder="Introduza a designacao do curso" type="text" name="designacao" id="designacao">
                </div>
              <div class="twelve  wide field">
                <label>Pepartamento</label>
                <select class="ui search dropdown" name="departamento_id" id="departamento_id">
                  <option value="0">Escolha o departamento onde pertence</option>
                  @foreach($departamentos as $departamento)
                  <option value="{{$departamento->id}}">{{$departamento->designacao}}</option>
                  @endforeach
                </select>
              </div>
              <div class="twelve  wide field"style="padding-top:10px">

                    <button type="submit" class="fluid ui green button" onsubmit="validacao()">Gravar</button>

              </div>
        </form>
      </div>
    </div>
  </div>
</div>
