<!-- without using any package -->


@extends('layouts.app')

@section('content')

    <h1>Edite Your Post:</h1>

    <form method=post action="/posts/{{$post->id}}">

        
        <!-- To secure the form and give it a token value -->
        {{csrf_field()}}

        <!-- cuz Lara understand PUT|PATCH as a name of the method for posts.update -->
        <input type="hidden" name="_method" value="PUT">

        <input type="text" name="title" placeholder="Enter title" value="{{$post->title}}">
        <input type="text" name="content" placeholder="Enter Content" value="{{$post->content}}">
        <input type="submit" name='submit' value="Update">
    
    </form>


    <form method="post" action="/posts/{{$post->id}}">
    <!-- cuz Lara understand DELETE as a name of the method for posts.delete -->
    <input type="hidden" name="_method" value="DELETE">
    
    <input style="margin-top:15px" type="submit" value="DELETE">
    {{csrf_field()}}

    </form>
@endsection

@section('footer')

    <div style="padding:100"></div>
    <!-- create the footer her -->

@endsection
