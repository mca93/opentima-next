@extends('layouts.departamento')
@section('side_nav')
@include('partials.estudante._verticalnav')
@stop
@section('content')
 <div class="ui main container">
   <div class="ui stackable grid">
         <div class="eight wide column">
           <div class="ui segment">
             <div class="ui active progress">
               <div class="bar">
                 <div class="progress">5%</div>
               </div>
               <div class="label">Progresso do trabalho</div>
             </div>
           </div>
         </div>
         <div class="four wide column"></div>
         <div class="four wide column">
           <button type="button" name="notificacao"><i class="inbox icon"></i>Notificar aqui</button>
         </div>
    </div>
     <div class="twelve wide column">
         <div class="ui grid">
           <div class="four wide column">
             <div class="ui vertical fluid tabular menu">
               <a class="item">
                 Actas
               </a>
               <a class="item">
                 Versões de trabalho
               </a>
               <a class="item active">
                 Dúvidas
               </a>
             </div>
           </div>
           <div class="twelve wide stretched column">
             <div class="ui segment">
               This is an stretched grid column. This segment will always match the tab height
             </div>
           </div>
         </div>
     </div>
</div>
@endsection
<script type="text/javascript">
function tab() {
  $('.tabular.menu .item')
  .tab();
}
</script>
