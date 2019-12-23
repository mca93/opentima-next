@extends('layouts.departamento')
@section('side_nav')
  @include('partials.admin._verticalnav')
@stop
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('/css/calendar.min.css')}}">
    <link rel='stylesheet' href="{{asset('/css/fullcalendar.min.css')}}" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI-Calendar/76959c6f7d33a527b49be76789e984a0a407350b/dist/calendar.min.css" rel="stylesheet" type="text/css" />
@stop
@section('scripts')
    <script  src="{{asset('/js/calendar.min.js')}}"></script>
    <!-- <script src='lib/jquery.min.js'></script>
    <script src='lib/moment.min.js'></script> -->
    <script src="{{asset('/js/moment.min.js')}}"></script>
    <script src="{{asset('/js/fullcalendar.min.js')}}"></script>


      <script type="text/javascript">
      $(document).ready(function() {
      //  $('#example1').calendar();
      });

      $(document).ready(function() {

    // page is now ready, initialize the calendar...
    var e = JSON.parse('{!!$eventos!!}');
    $('#calendar').fullCalendar({
  			header: {
  				left: 'prev,next today',
  				center: 'title',
  				right: 'month,agendaWeek,agendaDay'
  			},
  			defaultDate: '2017-02-01',
  			defaultView: 'basicWeek',
  			editable: true,
  			events:e
  		});


      });
      </script>
@stop
@section('content')
  <div class="ui grid">
    <div class="twelve wide column"></div>
    <div class="four wide column">
      <button class="ui teal button" onclick="model()"><i class="plus icon"></i>Schedule a mentorship meetings</button>
    </div>
  </div>
  <div style="margin-top:20px;" id="calendar"></div>

@endsection
<script type="text/javascript">
function dimmer() {
  $('.special.cards .image').dimmer({
  on: 'hover'
  });
}
function model() {
  $('.ui.small.modal')
.modal('show');
}
</script>

<div class="ui small modal">
  <i class="close icon"></i>
  <div class="header">Setup of mentorship meetings</div>
  <div class="content">
    <form class="ui form" action="{{url('/feng/supervisores/'.$supervisor->id.'/calendario/create')}}" method="post">
        {{ csrf_field() }}
      <div class="field">
        <label>Student</label>
        <select class="ui fluid search dropdown" name="supervisao_id">
          @foreach($supervisor->supervisaos as $supervisao)
          <option value="{{$supervisao->id}}">{{$supervisao->estudante->primeiro_nome.' '.$supervisao->estudante->ultimo_nome}}</option>
          @endforeach
        </select>
      </div>
      <div class="three fields">
        <div class="field">
          <label>Day</label>
          <div class="ui calendar" id="example1">
            <div class="ui input left icon">
              <i class="calendar icon"></i>
              <input type="text" placeholder="Exemplo:  24" name="dia_do_encontro">
            </div>
            </div>
        </div>
        <div class="field">
          <label>Month</label>
          <div class="ui calendar" id="example3">
            <div class="ui input left icon">
              <i class="calendar icon"></i>
                <input placeholder="Exemplo: 05" type="text" name="mes_do_encotro">
            </div>
          </div>

        </div>
        <div class="field">
          <label>Year</label>
          <div class="ui calendar" id="example3">
            <div class="ui input left icon">
              <i class="calendar icon"></i>
                <input placeholder="Exemplo: 2019" type="text" name="ano_do_encotro">
            </div>
          </div>
        </div>
      </div>
      <div class="inline fields">
        <label>Frequency</label>
        <div class="field">
          <div class="ui radio checkbox">
            <input name="frequencia" checked="checked" type="radio" value="7">
            <label>Weekly</label>
          </div>
        </div>
        <div class="field">
          <div class="ui radio checkbox">
            <input name="frequencia" type="radio" value="14">
            <label>Bi-weekly</label>
          </div>
        </div>
      </div>
        <div class="field">
          <button type="submit" class="fluid ui green button" onsubmit="">Save</button>
        </div>
      </div>
    </form>
</div>
