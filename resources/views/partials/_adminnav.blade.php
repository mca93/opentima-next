
<div class="ui secondary pointing menu" style="padding-top:30px;">
<div class="item">
  <a href="/administracao" class="{{Request::is('administracao') ? "active item": ""}}">
    Home
  </a>
</div>
<div class="item">
  <a href="/departamentos" class="{{Request::is('departamentos') ? "active item": ""}}">
    Registrations
  </a>
</div>
  <a class="item">
    Colleagues
  </a>
  <div class="right menu">
    <div class="item">
      <div class="ui icon input">
        <input placeholder="Search..." type="text">
        <i class="search icon"></i>
      </div>
    </div>
    <div class="item">
      <i class="user icon"></i>
    </div>
    <div class="item">
      <div class="text">
        {{Sentinel::getUser()->last_name}}
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
    </div>
</div>
