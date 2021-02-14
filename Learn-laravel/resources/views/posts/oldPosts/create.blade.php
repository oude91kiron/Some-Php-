@extends('layouts.app')

@section('content')

    <h1>Create Post:</h1>

    <form method=post action="/posts">

        <input type="text" name="title" placeholder="Enter title">
        <input type="text" name="content" placeholder="Enter Content">
        <input type="submit" name='submit' value="submit">
       
        <!-- To secure the form and give it a token value -->
        {{csrf_field()}}

    </form>

@endsection

@section('footer')

    <!-- create the footer her -->

@endsection
