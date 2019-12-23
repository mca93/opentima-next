<div id="regInnkommende" class="ui stacked segment">
  <a class="ui olive ribbon label">Alocação de temas</a>

  <form class="ui form" method="post" action="#">

    <div class="two fields">
      <div class="field">
        <label>Tema</label>

        <div class="ui fluid search selection dropdown">
          <input type="hidden" name="country">
          <i class="dropdown icon"></i>
          <div class="default text">Tema</div>
          <div class="menu">
            <div class="item" data-value="af">
            </i>Reclamações</div>
            <div class="item" data-value="ax">
            </i>Integação</div>
          </div>
        </div>
      </div>
      <div class="field">

        <label>Supervisor</label>

        <div class="ui fluid search selection dropdown">
          <input type="hidden" name="country">
          <i class="dropdown icon"></i>
          <div class="default text">supervisor</div>
          <div class="menu">
            <div class="item" data-value="af">
            </i>Vali Issufo
             </div>
            <div class="item" data-value="ax">
            </i>Rúben Manhiça</div>
          </div>
        </div>
      </div>
    </div>
    <div class="field">

      <div class="ui checkbox datepicker">
        <input type="checkbox" tabindex="0" class="hidden">
        <label>Incluir co-supervisores?</label>
      </div>
    </div>
    <div class="ui secondary segment datepicker dont-show small form">
      <div class="field">
        <label>Data Início</label>

        <div class="fields">
          <div class="three wide field">
            <select class="ui fluid dropdown" name="inn_dato[dato]">
              <option value="01">1</option>
              <option value="02">2</option>
              <option value="03">3</option>
              <option value="04">4</option>
              <option value="05">5</option>
            </select>
          </div>
          <div class="six wide field">

            <select class="ui fluid search dropdown" name="inn_dato[maaned]">
              <option value="">Mes</option>
              <option value="1">Januar</option>
              <option value="2">Februar</option>
            </select>
          </div>
          <div class="four wide field">
            <div class="ui input">
              <input type="text" value="2016" placeholder="Ano">
            </div>
          </div>
        </div>
      </div>

      <div class="field">
        <label>Data Fim</label>
        <div class="fields">
          <div class="three wide field">
            <select class="ui fluid dropdown" name="inn_dato[dato]">
              <option value="01">1</option>
              <option value="02">2</option>
              <option value="03">3</option>
              <option value="04">4</option>
              <option value="05">5</option>
            </select>
          </div>
          <div class="six wide field">

            <select class="ui fluid search dropdown" name="inn_dato[maaned]">
              <option value="">Mes</option>
              <option value="1">Januar</option>
              <option value="2">Februar</option>
            </select>
          </div>
          <div class="four wide field">
            <div class="ui input">
              <input type="text" value="2016" placeholder="Ano">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="field" tabindex="0">
        <button type="submit" name="alocar" class="ui button">Alocar</button>
    </div>
  </form>

</div>
<div class="ui hidden divider"></div>
