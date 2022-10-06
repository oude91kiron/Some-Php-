<!--
<x-app-layout>

</x-app-layout>
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        label {
            display: inline-block;
            width: 200px;
            font-size:15px;
            font-weight:bold;
        }

    </style>
  </head>
  <body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')

        <div class="main-panel">
            <div class="content-wrapper">

            <h1 style="text-align:center; font-size:1.8em; padding-top:35px;">Send Email to {{$order->email}}</h1>


        <form action="{{url('send_user_email', $order->id)}}" method="POST" >
        @csrf

        <div style="padding-left: 35%; padding-top:35px; ">
                
                <label for="">Email Greeting</label>
                <input style="color:black" type="text" name="greeting">
            </div>

            <div style="padding-left: 35%; padding-top:35px; ">
                
                <label for="">Email First Line</label>
                <input style="color:black" type="text" name="firstline">
            </div>

            <div style="padding-left: 35%; padding-top:35px; ">
                
                <label for="">Email Body</label>
                <input style="color:black" type="text" name="body">
            </div>

            <div style="padding-left: 35%; padding-top:35px; ">
                
                <label for="">Email Button name</label>
                <input style="color:black" type="text" name="button">
            </div>

            <div style="padding-left: 35%; padding-top:35px; ">
                
                <label for="">Email URL</label>
                <input style="color:black" type="text" name="url">
            </div>

            <div style="padding-left: 35%; padding-top:35px; ">
                
                <label for="">Email last line</label>
                <input style="color:black" type="text" name="lastline">
            </div>

            <div style="padding-left: 35%; padding-top:35px; ">
                
                <input type="submit" value="Send Email" class="btn btn-primary">
            </div>

        </form>




            </div>
        </div>


        @include('admin.script')
  </body>
</html>