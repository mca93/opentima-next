<div class="ui fixed  menu">
  <div class="ui container">
    <a href="#" class="header item">
      <i class="bar chart icon"></i>
         Dashoard
    </a>
    <a href="#" class="active item">Home</a>
    <div class="ui simple dropdown item">
      Courses <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href="#">Informática</a>
        <a class="item" href="#">Eléctrica</a>
        <a class="item" href="#">Electrónica</a>
        <div class="divider"></div>
      </div>
    </div>

    <div class="ui simple dropdown item">
      Temas<i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href="#">Trabalho de Licenciatura</a>
        <div class="divider"></div>
        <a class="item" href="#">Estágio Profissional</a>
      </div>
    </div>

    <div class="right menu">
        <div class="item">
          <div class="ui icon input">
            <input placeholder="Search..." type="text">
            <i class="search icon"></i>
          </div>
        </div>
        <div class="item">
          <i class="mail outline icon"></i>
        </div>
        <div class="item">
          <i class="user icon"></i>
          <div class="text">
            {{Sentinel::getUser()->first_name." ".Sentinel::getUser()->last_name}}
          </div>
          <div class="ui dropdown">
          <i class="dropdown icon"></i>
            <div class="menu">
                  <div class="item"><i class="unhide icon"></i>My Profile</div>
                <div class="item" hidden="true"><i class="mail outline icon"></i>Notifications</div>
                <div class="item">
                      <i class="sign out icon"></i>
                      <a href="{{url('/logout')}}">Log out</a>
                </div>
              </div>
          </div>
          </div>
          <div class="item">
            <i class="configure icon"></i>
          </div>
    </div>

  </div>

</div>
