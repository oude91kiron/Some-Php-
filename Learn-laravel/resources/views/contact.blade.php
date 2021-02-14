@extends('layouts.app')

@section('content')

    <h1>Contact Page...</h1>

    @if (count($people))

        <lu>
        @foreach ($people as $person) 
            
            <li>{{$person}}</li>

        @endforeach
        </lu>
    @endif

@stop


@section('footer')


<!--<script>alert('Hello dear how can I help you!')</script>-->

@endsection 