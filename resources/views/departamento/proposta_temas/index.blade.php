@extends('layouts.departamento')
@section('side_nav')
@include('partials.departamento._verticalnav')
@stop
@section('stylesheets')
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.css')}}">
@stop
@section('scripts')
<script type="text/javascript" src="{{asset('/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
$('#example').DataTable();
});

</script>
@stop
@section('content')
<div class="ui grid">
    <div class="four column row">
      <div class="ui breadcrumb left floated">
        <a href="{{url('/feuem/'.$departamento->sigla)}}" class="section">Home</a>
        <i class="right arrow icon divider"></i>
        <a href="{{url('/feuem/'.$departamento->sigla.'/propostas_de_temas')}}"class="active section">Propostas de temas</a>
      </div>
    </div>
<div class="twelve wide column">
  <table class="ui selectable very basic table" id="example">
     <thead>
       <th>Proposta de tema</th>
       <th>#Candidatos</th>
       <th>Docente proponente</th>
       <th class="right aligned">detalhes</th>
     </thead>
     <tbody>
       @foreach($proposta_temas as $proposta_tema)
        @if($proposta_tema->estado == 'Disponivel')
         <tr class="{{($proposta_tema->total_candidatos > 0)? "positive aligned": ""}}{{($proposta_tema->total_candidatos == 0)? "negative aligned": ""}}">
           <td>{{substr($proposta_tema->designacao,0, 15)}}{{strlen($proposta_tema->designacao)>15 ? "..." : ""}}</td>
           <td>
             <h4 class="ui image header">
               <div class="">
                  <a class="ui green circular label">{{$proposta_tema->total_candidatos}}</a><br/>
               </div>
            </h4>
          </td>
          <td>
            <a class="ui label">
              <img class="ui small circular centered image" src="{{ App\User::get_gravatar(Sentinel::getUser()->email) }}">
              {{$proposta_tema->docente_proponente->primeiro_nome.' '. $proposta_tema->docente_proponente->ultimo_nome}}
            </a>
          </td>
          <td class="right aligned">
            <a class="ui teal basic button" href="{{url('/feuem/'.$departamento->sigla.'/propostas_de_temas/'.$proposta_tema->id)}}"><i class="unhide icon"></i></a>
         </td>
       </tr>
       @endif
       @endforeach
   </tbody>
  </table>
</div>
  </div>
</div>
@endsection
<script type="text/javascript">

</script>
