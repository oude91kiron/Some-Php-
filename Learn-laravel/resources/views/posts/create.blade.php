<!-- Using "laravelcollective/html":"^5.2.0" package  -->

@extends('layouts.app')

@section('content')

    <h1>Create Post:</h1>

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li style="color:red">{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    

{!! Form::open(['method'=>'POST','action'=>'PostsController@store','files'=>'true']) !!}
   
   <div class="form-group">
      {!! Form::label('title', 'Title:') !!}
      {!! Form::text('title', null, ['class'=>'form-control']) !!}
      {!! Form::label('content', 'Content:') !!}
      {!! Form::text('content', null, ['class'=>'form-control']) !!}
   </div>
   <br>
   <div class="form-group">
      {!! Form::file('file', ['class'=>'form-control']) !!}
    </div>
    <br>
   <div class="form-group">
      {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
   </div>
{!! Form::close() !!}


@endsection

@section('footer')

    <!-- create the footer her -->

@endsection

