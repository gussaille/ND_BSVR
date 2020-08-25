@extends('layouts.app')

@section('content')
   
    <survey></survey>

@endsection

@section('js')

    @if(isset($questions))
        <script>
            const questions = JSON.parse('<?php echo addslashes(json_encode($questions)) ?>');
        </script>
    @endif
    
    <script src="{{ asset('js/app.js') }}" defer></script>

@endsection

