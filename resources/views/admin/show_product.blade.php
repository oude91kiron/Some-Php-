<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40 px;
        }

        .h2_font {

        font-size: 3em;
        padding-bottom: 3em;
        }
    
        .input_color {
            color: black;    
        }

        .center {
          margin: auto;
          width: 80%;
          text-align: center;
          margin-top: 50px;
          border: 3px solid white;
        }

        .table_th {

            color: gold;
            font-size: 1.5em;
        }

        .img-size {
            width: 100px;
            height: 100px;
        }
    
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="contant-wrapper">

            @if(session()->has('message'))

              <div class="alert alert-success">
                
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
              {{session()->get('message')}}
              </div>

            @endif

                <table class = "center">
                  <tr class="table_th">
                    <td>Product name</td>
                    <td>Descriptipn</td>
                    <td>Price</td>
                    <td>Discount</td>
                    <td>Quntity</td>
                    <td>Category</td>
                    <td>Image</td>
                  </tr>

                  @foreach($product as $product)
                  <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discount_price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->category}}</td>
                    <td>
                        <img src="/product/{{$product->image}}" class="img-size" alt="">
                    </td>
                    <td>
                      <a type="buttom" class="btn btn-danger" href="{{url('delete_product', $product->id)}}">Delete</a>
                    </td>

                    <td>
                      <a type="buttom" class="btn btn-secondary" href="{{url('update_product', $product->id)}}">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                </table>
            </div>
        </div>
   

        <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>