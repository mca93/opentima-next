@extends('layouts.departamento')
@section('side_nav')
  @include('partials.departamento._verticalnav')
@stop
@section('content')
<div class="ui cards">
  @foreach($departamento->cursos as $curso)
 <div class="ui link card">
     <div class="content">
       <div class="header"><a href="{{url('/feuem/'.$departamento->sigla.'/'.$curso->id)}}"><i class="book icon"></i>{{$curso->designacao}}</a></div>
       <div class="description">
         <table class="ui small very compact unstackable selectable olive table">
           <thead>
             <tr>
               <th colspan="2">
                 Ano 2017
               </th>
             </tr>
           </thead>

           <tbody>
             <tr>
               <td><i class="users icon"></i>TL</td>
               <td class="right aligned">5 estudantes</td>
             </tr>
             <tr>
               <td><i class="users icon"></i>EP</td>
               <td class="right aligned">15 estudantes</td>
             </tr>
             <tr>
                 <td><i class="file icon"></i>Actas</td>
                 <td class="right aligned">5</td>
             </tr>
           </tbody>
         </table>

       </div>
     </div>
 </div>
 @endforeach
 <div class="ui link card">
     <div class="content">
       <div class="header"><a href="#"><i class="database icon"></i>Trabalhos concluidos</a></div>
       <div class="description">
         <table class="ui small very compact unstackable selectable olive table">
           <thead>
             <tr>
               <th colspan="2">
                 Ano 2017
               </th>
             </tr>
           </thead>

           <tbody>
             <tr>
               <td><i class="student icon"></i>Electronica</td>
               <td class="right aligned">5</td>
             </tr>
             <tr>
               <td><i class="student icon"></i>Informática</td>
               <td class="right aligned">15</td>
             </tr>
             <tr>
                 <td><i class="student icon"></i>Eléctrica</td>
                 <td class="right aligned">5</td>
             </tr>
           </tbody>
         </table>
       </div>
     </div>
 </div>
 <div class="ui link card">
   <div class="content">
     <div class="header"><a href="#"><i class="announcement icon"></i>Marcacao de defesas</a></div>
     <table class="ui small very compact unstackable selectable olive table">
       <thead>
         <tr>
           <th colspan="2">
             Culminacao 1 Semestre 2017
           </th>
         </tr>
       </thead>

       <tbody>
         <tr>
           <td><i class="users icon"></i>TL</td>
           <td class="right aligned">
             <i class="Arrow Right icon"></i>
           </td>
         </tr>
         <tr>
           <td><i class="users icon"></i>EP</td>
           <td class="right aligned"><i class="Arrow Right icon"></i></td>
         </tr>
       </tbody>
     </table>
   </div>
 </div>
 <div class="ui link card">
   <div class="content">
     <div class="header"><a href="#"><i class="database icon"></i>Repositório de monografias</a></div>
     <div class="description">
       <table class="ui small very compact unstackable selectable olive table">
         <thead>
           <tr>
             <th colspan="2">
               Monografias publicadas em 2017
             </th>
           </tr>
         </thead>

         <tbody>
           <tr>
             <td><i class="student icon"></i>Electronica</td>
             <td class="right aligned">5</td>
           </tr>
           <tr>
             <td><i class="student icon"></i>Informática</td>
             <td class="right aligned">15</td>
           </tr>
           <tr>
               <td><i class="student icon"></i>Eléctrica</td>
               <td class="right aligned">5</td>
           </tr>
         </tbody>
       </table>
     </div>
   </div>
 </div>
</div>

 <div class="ui main container">
   <!--<h1 class="ui header">Hjem</h1>-->
   <div class="ui stackable grid">
     <div class="seven wide column">
       @include('departamento.temas.alocacao_supervisor')
     </div>
     <div class="one wide column">
     </div>
     <div class="seven wide column">
      @include('departamento.defesas.marcacao')
     </div>
   </div>
 </div>
@endsection
<script type="text/javascript">
function dimmer() {
  $('.special.cards .image').dimmer({
  on: 'hover'
  });
}
</script>
