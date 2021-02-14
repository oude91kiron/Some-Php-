<!-- Using "laravelcollective/html":"^5.2.0" package  -->

@extends('layouts.app')

@section('content')

    <h1>Edite Your Post:</h1>

    <!-- 19/126 : model take ($objectToEdit, [method=>PATCH, action=>[controller@Method,Object->id]])  
                    note open doesn't work for update use model incted-->
    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostsController@update', $post->id]])!!}

        {!! Form::label('title', 'Title:')!!}
        {!! Form::text('title', null, ['class'=>'form-control'])!!}

        {!! Form::label('content', 'Content:')!!}
        {!! Form::text('content', null, ['class'=>'form-control'])!!}

        {!! Form::submit('Update Post', ['class'=>"btn btn-info"])!!}
    
    {!! Form::close()!!}


    <!-- ['class'=>"btn btn-dang"] this is for bootstrap -->
    {!! Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $post->id]])!!}

        <br>{!! Form::submit('Delete Post', ['class'=>"btn btn-dang"])!!}
    
    {!! Form::close()!!}

@endsection