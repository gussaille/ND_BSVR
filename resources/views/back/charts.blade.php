@extends('layouts.app')

@section('content')

<div class="dashboard-container">
  
  @include('back.menu')

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
      labels: <?php echo json_encode($Headset); ?>,
      // labels: month,
      datasets: [
        {
          label: 'this year',
          backgroundColor: [
            "lightblue",
            "yellow",
            "red",
            "orange",
          ],
          borderWidth: 1,
          data: <?php echo json_encode($Data); ?>
        }
      ]
    },
    options: {
        title: {
            display: true,
            fontSize: 16,
            text: "Les marques de casques VR les plus utilisées"
        }
      }
    });

    var ctx2 = document.querySelector("#canvas2").getContext('2d');
    var secondChart = new Chart(ctx2, {
      type: 'pie',
      data: {
        labels: ["SteamVR", "Occulus store", "Viveport", "Playstation VR", "GooglePlay", "Windows store"],
        datasets: [{
          backgroundColor: [
            "#CC0000",
            "green",
            "pink",
            "orange",
            "purple",
            "lemon"

          ],
          data: [17, 20, 38, 2, 26, 12]
        }]
      },
      options: {
        title: {
            display: true,
            fontSize: 16,
            text: "Les magasins où l'on achète du contenu VR"
        }
      }
    });

    var ctx3 = document.querySelector("#canvas3").getContext('2d');
    var thirdChart = new Chart(ctx3, {
      type: 'pie',
      data: {
        labels: ["regarder des émissions TV en direct", "regarder des films", "jouer en solo", "jouer en team"],
        datasets: [{
          backgroundColor: [
            "yellow",
            "red",
            "lightgreen",
            "black",
          ],
          data: [53, 12, 37, 2]
        }]
      },
      options: {
        title: {
            display: true,
            fontSize: 16,
            text: 'Les pratiques sur BigScreen'
        }
    }
    });

    var ctx4 = document.querySelector("#canvas4").getContext('2d');
    var fourthChart = new Chart(ctx4, {
      type: 'radar',
      data: {
        labels: ["Image", "Confort", "Réseau", "Graphisme", "Audio"],
        datasets: [{
          backgroundColor: [
            "red",
            "blue",
            'green',
            'black',
            'purple'
          ],
          data: [2, 3, 4, 5, 5]
        }]
      },
      options: {
        title: {
            display: true,
            fontSize: 16,
            text: 'Notes des clients'
        }
      }
    });

</script>
@endsection


