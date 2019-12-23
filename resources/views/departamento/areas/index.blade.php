<div class="ui grid">
  <div class="twelve wide column">
  </div>
  <div class="four wide column">
    <button class="ui teal button" onclick="model_areas()"><i class="plus icon"></i>Nova Area de Interesse</button>
  </div>
  <div class="horizontal divider">
  </div>
  <div class="row">
    <table class="ui selectable table">
      <thead>
        <tr>
          <th>#</th>
          <th>Área</th>
          <th class="right aligned">Acções</th>
        </tr>
      </thead>
      <tbody>
        @foreach($curso->areas as $area)
        <tr>
          <td>{{$area->id}}</td>
          <td>{{$area->designacao}}</td>
          <td class="right aligned">
            <a href="{{url('/feuem/'.$curso->departamento->sigla.'/'.$curso->id.'/area/'.$area->id)}}" class="ui green button"><i class="users icon"></i></a>
            <a class="ui positive button"><i class="pencil icon"></i></a>
            <a class="ui negative button"><i class="close icon"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@section('scripts')
<script type="text/javascript">

</script>
@stop
<div class="ui small modal" id="areas">
  <i class="close icon"></i>
  <div class="header">Registo de Área Científica</div>
  <div class="content">
    <form class="ui form" method="post" action="{{url('/feuem/'.$curso->departamento->sigla.'/'.$curso->id.'/area')}}">
      {{csrf_field()}}
       <div class="field">
         <label>Desgnação da área</label>
               <input placeholder="o tema" type="text" name="designacao">
       </div>
        <div class="field">
            <label>Descrição da actividade</label>
            <textarea name="descricao"></textarea>
        </div>
        <div class="field">
          <button type="submit" class="fluid ui green button" onsubmit="">Gravar</button>
        </div>
      </form>
    </div>
</div>
