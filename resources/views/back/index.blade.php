@extends('layouts.app')

@section('content')

<div class="dashboard-container">
  
  @include('back.panel')

  <div class="information">

      <div class="information__chart">

        <canvas id="canvas1"></canvas>
        <canvas id="canvas2"></canvas> 
        <canvas id="canvas3"></canvas> 
        <canvas id="canvas4"></canvas>

      </div>

  </div>

</div>

@endsection

@section('js')

  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

  <script>

    var ctx = document.querySelector('#canvas1').getContext('2d');
    var firstChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($Months); ?>,
      // labels: month,
      datasets: [
        {
          label: 'this year',
          backgroundColor: '#26B99A',
          borderWidth: 1,
          data: <?php echo json_encode($Data); ?>
        }
      ]
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

    var ctx2 = document.querySelector("#canvas2").getContext('2d');
    var secondChart = new Chart(ctx2, {
      type: 'pie',
      data: {
        labels: ["Iowa", "Iowa State"],
        datasets: [{
          backgroundColor: [
            "#CC0000",
            "#F1BE48",
          ],
          data: [2000, 9000]
        }]
      }
    });

    var ctx3 = document.querySelector("#canvas3").getContext('2d');
    var thirdChart = new Chart(ctx3, {
      type: 'pie',
      data: {
        labels: ["Iowa", "Iowa State"],
        datasets: [{
          backgroundColor: [
            "yellow",
            "black",
          ],
          data: [2000, 9000]
        }]
      }
    });

    var ctx4 = document.querySelector("#canvas4").getContext('2d');
    var fourthChart = new Chart(ctx4, {
      type: 'radar',
      data: {
        labels: ["Iowa", "Pensylvanie", "Wyoming", "Kentucky", "Californie"],
        datasets: [{
          backgroundColor: [
            "red",
            "blue",
            'green',
            'black',
            'purple'
          ],
          data: [2000, 9000, 300, 1300, 6300]
        }]
      },
    });

</script>
@endsection


