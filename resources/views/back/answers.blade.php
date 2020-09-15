@extends('layouts.app')

@section('content')

<div class="dashboard-container">
  
  @include('back.menu')

    <div class="information">

        <div class="information__answers">

          <h1 class="text-center">Réponses des sondés</h1>

              @forelse($surveyUsers as $surveyUser)

                <table class="table table-striped answer-table mb-3">
                  
                  @foreach ($surveyUser->answers as $answer)

                    <tbody>
                      <tr>
                        <th scope="row">{{$answer->question_id}}</th>
                        <td>{{$answer->question_id}}</td></td>
                        <td>{{$answer->response}}</td>
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
