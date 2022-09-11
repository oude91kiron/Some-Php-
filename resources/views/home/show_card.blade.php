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
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
    
      <style>
        .center {
            width:75%;
            text-align:center;
            padding:30px;
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
    <div class="hero_area">

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

        <?php $totalPrice = 0; ?>

        @foreach($card as $card)
        <tr>
            <td>{{$card->product_title}}</td>
            <td>{{$card->product_quantity}}</td>
            <td>{{$card->price}}</td>
            <td><img class="img_deg" src="{{url('/product', $card->image)}}" alt=""></td>
            <td>
              <a 
                href="{{url('/remove_card', $card->id)}}" 
                class="btn btn-danger"
                onclick=" return confirm('Areyou sure you wnat to delete product? ')"
              >Delete
              </a>
            </td>
        </tr>
        <div>
          <?php $totalPrice = $totalPrice + $card->price * $card->product_quantity ?>
        </div>
        @endforeach 
      </table>

      <div class="tprice">
        <h3><?php echo 'Total Price: '. $totalPrice ?></h3>
      </div>

      <div class="payment">
        <p>Complete Your Order</p>
        <a href="{{url('cash_order', $card->id)}}" class="btn btn-danger">Cash on Delivery</a>
        <a href="{{url('stripe', $totalPrice)}}" class="btn btn-danger">Pay Using Card</a>
      </div>
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