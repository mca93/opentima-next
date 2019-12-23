@extends('layouts.admin')
@section('title', '|Area do Administrador')
@section('secundary_nav')
  @include('partials._admin_cadastros_nav')
@endsection
@section('content_Area')
<div class="ui grid">
  <div class="four column row">
    <div class="right floated column">
        <button class="ui green button" onclick="show_model()"><i class="plus icon"></i>New Student</button>
    </div>
  </div>
</div>
<table class="ui table">
<thead>
<tr>
  <th>Name</th>
  <th>Cellphone number</th>
  <th>Course</th>
  <th>Actions</th>
</tr>
</thead>
<tbody>
@foreach($estudantes as $estudante)
<tr>
  <td>{{$estudante->primeiro_nome.' '.$estudante->ultimo_nome}}</td>
  <td>{{$estudante->celular}}</td>
  <td>{{$estudante->curso->designacao}}</td>
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
      primeiro_nome: {
          rules: [
            {
              type   : 'empty',
              prompt : 'Introduza o primeiro nome'
            }
          ]
        },
        ultimo_nome: {
            rules: [
              {
                type   : 'empty',
                prompt : 'Introduza o ultimo nome'
              }
            ]
          },
          email: {
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Introduza o seu e-amil'
                }
              ]
            },
            celular: {
                rules: [
                  {
                    type   : 'empty',
                    prompt : 'Introduza celular'
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
  <div class="centered header">
    Registration of a student
  </div>
  <div class="content">
    <div class="ui grid">
      <div class="four wide column">
      </div>
      <div class="eight wide column">
        <form class="ui form" action="{{route('estudantes.store')}}" method="post">
        {{ csrf_field() }}

                <div class="two fields">
                  <div class="field">
                      <label>First name</label>
                    <input placeholder="Insert your first name" type="text" name="primeiro_nome" id="primeiro_nome">
                  </div>
                  <div class="field">
                      <label>Surname</label>
                    <input placeholder="Insert your surname" type="text" name="ultimo_nome" id="ultimo_nome">
                  </div>
                </div>
                <div class="two fields">
                  <div class="field">
                    <label>E-mail</label>
                    <input placeholder="E-mail: exemplo@domain" type="email" name="email" id="email">
                  </div>
                  <div class="field">
                      <label>Cellphone number</label>
                    <input placeholder="Cellphone number." type="text" name="celular" id="celular">
                  </div>
                </div>
              <div class="sixteen  wide field">
                <label>Course</label>
                <select class="ui search dropdown" name="curso_id" id="curso_id">
                  <option value="0">Choose the course he is applying for.</option>
                  @foreach($cursos as $curso)
                  <option value="{{$curso->id}}">{{$curso->designacao}}</option>
                  @endforeach
                </select>
              </div>
              <div class="sixteen  wide field">
                <label>Subject</label>
                <select class="ui search dropdown" name="disciplina_id" id="disciplina_id">
                  <option value="0">Choose the subject</option>
                  @foreach($disciplinas as $disciplina)
                  <option value="{{$disciplina->id}}">{{$disciplina->designacao}}</option>
                  @endforeach
                </select>
              </div>
              <div class="sixteen  wide field"style="padding-top:10px">
                    <button type="submit" class="fluid ui green button" onclick="validacao()">Save</button>
              </div>
        </form>
      </div>
    </div>
  </div>
</div>
