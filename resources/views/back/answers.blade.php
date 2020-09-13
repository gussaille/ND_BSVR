@extends('layouts.app')

@section('content')

<div class="dashboard-container">
  
  @include('back.menu')

    <div class="information">

        <div class="information__answers">

          <h1 class="text-center">Réponses des sondés</h1>


            {{-- Rajouter loop = Tableau pour chaque questionnaire d'utilisateur -> foreach --}}


            {{-- @foreach($surveyUser as $answer) --}}

              <table class="table table-striped answer-table">
                @foreach ($questions as $question)

                  <tbody>
                    <tr>
                      <th scope="row">{{ $question->id }}</th>
                      <td>{{ $question->label }}</td>
                      <td> Réponse </td>
                    </tr>
                  </tbody>

                  @endforeach
              </table>

            {{-- @endforeach --}}

      </div>
    </div>
</div>

@endsection
