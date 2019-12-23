@extends('layouts.departamento')
@section('side_nav')
@include('partials.departamento._verticalnav')
@stop
@section('scripts')
  <script type="text/javascript" src="{{asset('/js/Chart.js')}}"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    var ctx = document.getElementById("myChart").getContext('2d');
      var quantidadeDeDuvidas = JSON.parse('{!!$quantidadeDeDuvidas!!}');
      var designacoes = JSON.parse('{!!$designacoes!!}');

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: designacoes,
            datasets: [{
                label: 'Total de dúvidas',
                data: quantidadeDeDuvidas,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

  });
  </script>
@stop
@section('content')

<canvas id="myChart" width="400" height="400"></canvas>

@endsection
