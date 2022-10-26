<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{url('home/images/favicon.png')}}" type="">
      <title>Palmera - Fashion </title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
    
      <style>
        .center {
            width:75%;
            text-align:center;
            padding:50px 25px;
            margin: auto;

        }

        table, th, td {
            border: 1px solid grey;  
        }

        .th_deg {
            font-size: 20px;
            padding: 5px;
            background: skyblue;
        }

        .img_deg { 
          width:75px; 
          hieght:75px;
        }

        .tprice {
          font-size: 25px;
          font-weight: bold;
          margin-top: 25px;
          padding: 40px;
        }

        .payment{
          padding:5px;
        }

        p {
          font-size: 25px;
          font-weight: bold;
          margin-top: 25px;
          padding: 4px;
        }
      </style>
   
    </head>
   <body>

         <!-- header section strats -->
        @include('home.header')
    <div class="center">
    
    <table class="center">
        <tr>
            <th class="th_deg">Product Title</th>
            <th class="th_deg">Product Quantity</th>
            <th class="th_deg">Price</th>
            <th class="th_deg">Image</th>
            <th class="th_deg">Action</th>
        </tr>

        @foreach($items as $item)
         
        <tr>
            <td>{{$item->product_title}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->price}}</td>
            <td>
                <img hieght="100px" width="150px" src="product/{{$item->image}}" alt="">
            </td>
            <td>
              <a 
                href="{{url('delete_item', $item->id)}}" 
                class="btn btn-danger"
                onclick=" return confirm('Are you sure you wnat to delete product? ')"
              >Delete
              </a>
            </td>
        </tr>
        @endforeach
      </table>
    </div>

      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>