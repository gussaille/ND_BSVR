
@extends('layouts.app')

@section('content')

<div class="summary-container">

    <div class='summary'>
        <div class="summary__description">
            <img src="/img/bigscreen_logo.png" alt="Logo BigScreen" class="logo">
            <p class="summary__description__text">Vous trouverez ci-dessous les réponses que vous avez apportées à notre sondage le {{date('d-m-Y à H:i:s', strtotime($surveyUser->updated_at))}} </p>
        </div>
        <div class="summary__answers">
            @foreach($surveyUser->answers as $answer)
                <div class="answer">
                    <p class="answer__number">
                        Question {{$answer->id}}/20
                    </p>
                    <div class="answer__user">
                        {{$answer->response}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
