@extends('layouts.app')

@section('content')

<div class="dashboard-container">
  
  @include('back.menu')

  <div class="information information--survey">

    <h1>Questionnaire</h1>

    @if($questions)
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Enoncé</th>
            <th scope="col">Type</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($questions as $question)
          <tr>
            <th scope="row">{{$question->id}}</th>
            <td>{{$question->label}}</td>
            <td>{{$question->type}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  
  </div>

</div>

@endsection
