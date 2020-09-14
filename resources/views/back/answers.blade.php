@extends('layouts.app')

@section('content')

<div class="dashboard-container">
  
  @include('back.menu')

    <div class="information">

        <div class="information__answers">

          <h1 class="text-center">Réponses des sondés</h1>

            {{-- Rajouter loop = Tableau pour chaque questionnaire d'utilisateur -> foreach --}}

              @forelse($surveyUsers as $surveyUser)

                <table class="table table-striped answer-table mb-3">

                  @foreach ($questions as $question)

                    <tbody>
                      <tr>
                        <th scope="row">{{$question->id}}</th>
                        <td>{{$question->label}}</td></td>
                        <td>Réponse</td>
                      </tr>
                    </tbody>

                    @endforeach
                </table>

              @empty

                <p class="text-center">Il n'y pas de réponses pour le moment.</p>

              @endforelse

      </div>
    </div>
</div>

@endsection
