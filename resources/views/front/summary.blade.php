
@extends('layouts.app')

@section('content')

<div class="summary-container">

    <div class='summary'>
        <div class="summary__description">
            <img src="/img/bigscreen_logo.png" alt="Logo BigScreen" class="logo">
            <p class="summary__description__text">Vous trouverez ci-dessous les réponses que vous avez apportées à notre sondage le {{date('d/m/Y à H:i', strtotime($surveyUser->updated_at))}}. </p>
        </div>
        <div class="summary__answers">
            @foreach($questions as $question)
            @foreach($surveyUser->answers as $answer)
            
                @if($question->id === $answer->question_id)
                    <div class="answer">
                        <p class="answer__number">
                            Question {{$question->id}}/20
                        </p>
                        <p class="answer__question">
                            {{$question->label}}
                        </p>
                        <div class="answer__user">
                            <p>{{$answer->response}}</p>
                        </div>
                    </div>
                @endif

            @endforeach
            @endforeach
        </div>
    </div>
</div>

@endsection
