@extends('layouts.app')

@section('content')

<div class="dashboard-container">
  
  @include('back.menu')

  <div class="information">

      <div class="information__chart">
        
        @isset($answers)
          
          <canvas id="canvas1"></canvas>
          <canvas id="canvas2"></canvas> 
          <canvas id="canvas3"></canvas> 
          <canvas id="canvas4"></canvas>
        
        @else
        <p>Il n'y a pas de réponses pour le moment.</p>
        @endisset
      
      </div>

  </div>

</div>

@endsection

@isset($answers)
@section('js')

  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

  <script>

    let ctx = document.querySelector('#canvas1').getContext('2d');
    let firstChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($choice6); ?>,
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
          data: [ {{$rift}}, {{$vive}}, {{$mix}}, {{$psvr}}]
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

    let ctx2 = document.querySelector("#canvas2").getContext('2d');
    let secondChart = new Chart(ctx2, {
      type: 'pie',
      data: {
        labels: <?php echo json_encode($choice7); ?>,
        datasets: [{
          backgroundColor: [
            "blue",
            "green",
            "pink",
            "orange",
            "red",
            "lightgreen"
          ],
          data: [{{$steam}}, {{$occulus}}, {{$viveport}}, {{$play}}, {{$google}}, {{$windows}} ]
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

    let ctx3 = document.querySelector("#canvas3").getContext('2d');
    let thirdChart = new Chart(ctx3, {
      type: 'pie',
      data: {
        labels: <?php echo json_encode($choice10); ?>,
        datasets: [{
          backgroundColor: [
            "yellow",
            "red",
            "lightgreen",
            "black",
          ],
          data: [{{ $direct }}, {{ $film }}, {{ $solo }}, {{ $team }}]
        }]
      },
      options: {
        title: {
            display: true,
            fontSize: 16,
            text: 'Les pratiques sur Bigscreen'
        }
      }
    });

    let ctx4 = document.querySelector("#canvas4").getContext('2d');
    let fourthChart = new Chart(ctx4, {
      type: 'radar',
      data: {
        labels: ["Image", "Confort", "Réseau", "Graphisme", "Audio"],
        datasets: [{
              label: "Statistiques",
              backgroundColor: "rgba(179,181,198,0.2)",
              borderColor: "rgba(179,181,198,1)",
              pointBackgroundColor: "rgba(179,181,198,1)",
              pointBorderColor: "#fff",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(179,181,198,1)",
              data: [{{$ratingImage}}, {{$ratingConfort}}, {{$ratingNetwork}}, {{$ratingGraphisme}}, {{$ratingAudio}}]
        }]
      },
      options: {
        title: {
            display: true,
            fontSize: 16,
            text: 'Notes des clients'
        },
        scale: {
            min: 0,
            max: 5,
        },
      }
    });
    
</script>

@endsection
@endif

