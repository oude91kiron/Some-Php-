@extends('layouts.app')

@section('content')

    <div><h1>Previous Posts</h1></div>
    <ul>

        @foreach($posts as $post)
            <!-- We route to show indivadual post using rute('route name', id) function -->
            <li style="margin:15px"><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
        
        @endforeach


    </ul>

@endsection

