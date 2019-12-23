@extends('layouts.guests.guest')
@section('title', '|Login')
@section('content')
<div class="ui middle aligned center aligned grid" style="padding-top: 0px">
  <div class="column">
    <h2 class="ui image header">
      <div class="content">
        <div class="ui larg image">
          <img src="/guest/img/logo.png" height="140" width="120" alt="Universidade Eduardo Mondlane - Faculdade de Engenharia">
      </div>
    </h2>
    <form action="{{url('/login')}}" method="POST" class="ui large form" style="padding-top: 30px">
      {{ csrf_field() }}
      <div class="ui stacked secondary  segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="E-mail address">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
          <button type="submit" class="ui fluid large teal submit button">Login</button>
      </div>

      <div class="ui error message"></div>

    </form>
    <div class="ui message">
      Forgot your password? <a href="http://s.codepen.io/voltron2112/debug/PqrEPM?">Recover here!</a>
    </div>
    <div class="ui message">
      Looking for a challenge? <a href="{{url('/feng/propostas_de_temas')}}">Find it here</a>
    </div>
    <div class="ui message">
      Published works? <a href="{{url('/feng/monografias')}}">Repository</a>
    </div>
  </div>
</div>
@stop
