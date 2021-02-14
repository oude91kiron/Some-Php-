@extends('layouts.app')

@section('content')

    <div>
    <h1>My Programming languages List:</h1>
    </div>
    <ul>

        @foreach($posts as $post)
        
            <!-- We route to show indivadual post using rute('route name', id) function -->
            <li style="margin:15px"><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>

        <div class="image-container">
        
            <img height="100" src="{{$post->path}}" alt="">

        </div>

        @endforeach
        <form method="GET" action="{{route('posts.create')}}">
        <input type="submit" value="create new post">    
        </form>


    </ul>

@endsection

