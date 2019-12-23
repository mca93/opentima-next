<div class="ui green segment grid">
  <div class=" eight wide column">
    <div class="ui form">
      <div class="fields">
        <div class="field">
          <select class="ui search dropdown">
            <option value="0">Ano</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
          </select>
        </div>
        <div class="field">
          <select class="ui search dropdown">
            <option value="0">Semestre</option>
            <option value="1">Primeiro</option>
            <option value="2">Segundo</option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="four wide column">
  </div>
  <div class="four wide column">
    <button class="ui teal button" onclick="model_temas()"><i class="plus icon"></i>Novo tema</button>
  </div>
</div>
<div class="row">
  <table class="ui selectable table">
    <thead>
      <tr>
        <th>Tema</th>
        <th>Referencia</th>
        <th>Estudante</th>
        <th>Estado</th>
        <th class="right aligned">Acção</th>
      </tr>
    </thead>
    <tbody>
      @foreach($temas as $tema)
      <tr>
        <td>{{$tema->designacao}}</td>
        <td>{{$tema->referencia}}</td>
        <td>{{$tema->estudante->primeiro_nome.' '.$tema->estudante->ultimo_nome}}</td>
        @if($tema->status!=='Não alocado')
          <td class="positive"><i class="icon checkmark"></i>Alocado</td>
          <td class="right aligned">
            <button class="ui green button" disabled="true"><i class="users icon"></i></button>
            <button class="ui basic button"><i class="pencil icon"></i></button>
          </td>
        @else
        <td class="negative"><i class="icon close"></i>Não alocado</td>
        <td class="right aligned">
          <a class="ui green button" href="{{url('/feuem/'.$curso->departamento->sigla.'/'.$curso->id.'/temas/'.$tema->id)}}"><i class="users icon"></i></a>
          <button class="ui basic button"><i class="pencil icon"></i></button>
        </td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


<script type="text/javascript">

</script>

<div class="ui small modal" id="temas">
  <i class="close icon"></i>
  <div class="header">Registo do tema</div>
  <div class="content">
    <form class="ui form" method="post" action="{{url('/feuem/'.$curso->departamento->sigla.'/'.$curso->id.'/temas')}}">
      {{csrf_field()}}
      <div class="two wide fields">
       <div class="field">
         <label>Desgnação do tema</label>
               <input placeholder="o tema" type="text" name="designacao">
       </div>
       <div class="field">
         <label>Referência do tema</label>
               <input placeholder="a referência do tema" type="text" name="referencia">
       </div>
      </div>
      <div class="two wide fields">
        <div class="field">
          <label>Area Científica do tema</label>
          <select class="ui fluid search dropdown" name="area_id">
            <option value="0">Escolha a area que o tema se enquadra</option>
            @foreach($curso->areas as $area)
            <option value="{{$area->id}}">{{$area->designacao}}</option>
            @endforeach()
          </select>
        </div>
        <div class="field">
          <label>Estudante</label>
          <select class="ui fluid search dropdown" name="estudante_id">
            <option value="0">Escolha o estudante</option>
            @foreach($curso->estudantes as $estudante)
              <option value="{{$estudante->id}}">{{$estudante->primeiro_nome.' '.$estudante->ultimo_nome}}</option>
            @endforeach()
          </select>
        </div>
      </div>
        <div class="field">
            <label>Descrição do tema</label>
            <textarea name="descricao"></textarea>
        </div>
        <div class="field">
          <button type="submit" class="fluid ui green button" onsubmit="">Gravar</button>
        </div>
      </form>
