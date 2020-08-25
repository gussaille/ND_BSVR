@extends('layouts.app')

@section('content')
   
    <question-survey :question='{{$questions}}'></question-survey>

@endsection
