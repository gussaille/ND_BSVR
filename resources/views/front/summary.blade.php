
@extends('layouts.app')

@section('content')

<div class="summary-container">

    <div class='summary'>
        <div class="summary__description">
            <img src="/img/bigscreen_logo.png" alt="Logo BigScreen" class="logo">
            <p class="summary__description__text">Vous trouverez ci-dessous les réponses que vous avez apportées à notre sondage le {{date('d-m-Y à H:i:s', strtotime($surveyUser->updated_at))}} </p>
        </div>

        <div class="summary__answers">
            <table class="table table-striped answer-table m-2 mx-auto">

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
        </div>
    </div>
</div>

@endsection
