@extends('emails.layouts.master')

@section('title')
  Defesas na FEUEM!
@stop

@section('content')

  <h3>{{$mensagem}}</h3><br>
  <br><br>
  <a style="text-decoration: none; background-color: #74cd9e;color: #fff;border-radius: 4px;display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: 400;line-height:1.42857143;text-align: center;white-space: nowrap;" target="_blank" href="http://feuem-opentima.michaque.com">Veja o calendário das defesas</a>
@stop
