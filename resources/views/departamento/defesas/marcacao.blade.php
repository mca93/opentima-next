<div id="regUtgaende" class="ui stacked segment">
  <a class="ui ribbon orange label">Marcação de defesa</a>
  <form class="ui form" method="post" action="{{url('/feuem/'.$departamento->sigla.'/marcacao_de_defesa')}}">
    {{ csrf_field() }}
    <div class="two fields">
      <div class="field">
        <label>Ref. do tema</label>
        <div class="ui right labeled input">
          <div class="ui fluid search selection dropdown">
            <input type="hidden" name="supervisao_id">
            <i class="dropdown icon"></i>
            <div class="default text">escolha a referencia</div>
            <div class="menu">
              @foreach($monografias as $monografia)
                  <div class="item" data-value="{{$monografia->supervisao->id}}">
                  <i>{{$monografia->supervisao->tema->referencia}}</i>
                </div>
              @endforeach
          </div>
        </div>
      </div>
    </div>
      <div class="field">

        <label>Oponente</label>

        <div class="ui fluid search selection dropdown">
          <input type="hidden" name="oponente_id">
          <i class="dropdown icon"></i>
          <div class="default text">indicar oponente</div>
          <div class="menu">
            @foreach($departamento->docentes as $docente)
              <div class="item" data-value="{{$docente->id}}">
              {{$docente->primeiro_nome.' '.$docente->ultimo_nome}}
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <div class="field">

      <div class="ui checkbox">
        <input type="checkbox" tabindex="0" class="hidden" checked>
        <label>Notificar intervenientes</label>
      </div>
    </div>
    <div class="ui secondary segment datepicker dont-show small form">
      <div class="field">
        <div class="fields">
          <div class="eight wide field">
            <label for="dia">Dia</label>
            <input type="text" class="ui fluid" name="dia" placeholder="Ex: 27"></input>
          </div>
          <div class="eight wide field">
            <label for="dia">Mês</label>
            <input type="text" class="ui fluid" name="mes" placeholder="Ex: 07"></input>
          </div>
        </div>
      </div>
      <div class="field">
        <div class="fields">
          <div class="eight wide field">
            <label for="dia">Hora</label>
            <input type="text" class="ui fluid" name="horas" placeholder="Ex: 10"></input>
          </div>
          <div class="eight wide field">
            <label for="dia">Minutos</label>
            <input type="text" class="ui fluid" name="minutos" placeholder="Ex: 30"></input>
          </div>
        </div>
      </div>
    </div>
    <div class="eight wide column">
      <button type="submit" class="ui button " tabindex="0">Marcar</div>
    </div>
  </form>
</div>
