@extends('layouts.app')

@section('content')

    <!-- Hi man how r u? -->
    <h1>Post Page. {{$id}} {{$name}} {{$email}}</h1>


@stop


@section('footer')

    <?php echo '<h1 style="color:red">My dear friends </h1>' ?>
@endsection