@extends('layouts.app')

@section('content')

<div class="dashboard-container">
  
  @include('back.menu')

    <div class="information">

        <div class="information__answers">

          <h1 class="text-center">Réponses des sondés</h1>

              @forelse($surveyUsers as $surveyUser)

                <table class="table table-striped answer-table">

                    <tbody>
                      @foreach ($questions as $question)
                        @foreach ($surveyUser->answers as $answer)

                        @if($question->id === $answer->question_id)

                          <tr>
                            <th scope="row">{{$answer->question_id}}</th>
                            <td>{{$question->label}}</td>
                            <td>{{$answer->response}}</td>
                            @else
                          </tr> 

                        @endif

                        @endforeach
                      @endforeach
                    </tbody>

                    <hr>

                </table>

              @empty

                <p class="text-center">Il n'y a pas de réponses pour le moment.</p>

              @endforelse

              {{ $surveyUsers->links() }}
        </div>
    </div>
</div>

@endsection
