@extends('layouts.app')

@section('content')

<div class="dashboard-container">
  
  @include('back.panel')

  <div class="information">

      <div class="information__chart">
          <div class="square"></div>
          <div class="square"></div>
          <div class="square"></div>
          <div class="square"></div>
      </div>

  </div>

</div>


@endsection


