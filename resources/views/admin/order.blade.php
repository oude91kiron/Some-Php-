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

        .title_deg {
            padding-bottom: 40px;
            text-align: center;
            font-size: 25px;
            font-wieght: bold;
        }

        .table_deg {
            border: 2px solid white;
            text-align:center;
            width:85%;
            margin: auto;
        }

        .thead {
            background-color: skyblue;
        }

        .img_size{
            
            width:125px;
            height:125px;
        }

        td {
            padding: 2px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')

        
        <div class="content-wrapper">
            <h1 class="title_deg">All Orders</h1>

            <table class="table_deg">
                <tr class="thead">
                    <th>Name</th>
                    <th>Email</th>
                    <th>address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Delevery Status</th>
                    <th>Image</th>
                    <th>Delivered</th>
                    <th>Print PDF</th>
                </tr>
                
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>

                    <td>
                        <img class="img_size" src="/product/{{$order->image}}" alt="">
                    </td>

                    <td>
                    @if($order->delivery_status =='processing')
                    
                        <a href="{{url('delivered', $order->id)}}" onclick="return confirm('Are you sure it\'s delivered!')" class="btn btn-primary">Delivered</a>
                    
                    @else
                    <p style="color:green">Delivered</p>
                    @endif
                    </td>

                    <td>
                        <a href="{{url('print_pdf', $order->id)}}" class="btn btn-secondary">Print PDF</a>

                    </td>

                </tr>
                @endforeach
            </table>
        </div>
    </div>    
        @include('admin.script')
  </body>
</html>