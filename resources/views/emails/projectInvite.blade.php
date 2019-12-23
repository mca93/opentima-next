@extends('emails.layouts.master')

@section('title')
    A referência do tema: {{ $project_name }}.
    Supervisor alocado  : {{ $project_url }}
@stop

@section('content')
  Caro estudante, desejamos-lhe boas vindas ao Sistema de Gestão de TCC!</br>

  <h3>Dados de acesso:</h3>
    senha : Seu primeiro nome
    <br><br>
    <a style="text-decoration: none; background-color: #74cd9e;color: #fff;border-radius: 4px;display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: 400;line-height:1.42857143;text-align: center;white-space: nowrap;" target="_blank" href="http://feuem-opentima.michaque.com">Faca login</a>
@stop
