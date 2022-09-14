<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
    .div_center {
          text-align: center;
          padding-top: 30px;
        }

    .font-size {
        font-size: 40px;
    }

    .input_color {
            color: black;    
            padding-bottom: 20px;
        }
        
    label {
            display: inline-block;
            width: 200px;

        }

    .div_desgin {
        padding-bottom: 15px;
    }



    input {
        display: inline-block;
        width: 250px;
        color: white;
    }

    .cat-desgin {

        width: 250px;
        text-align: center;
        border: 3px solid blue;
    }

    </style>
  
  </head>
  <body>
    <div class="container-scroller">
      <!-- sidebar -->
        @include('admin.sidebar')
      <!-- header -->
        @include('admin.header')
    
    <!-- body -->
    <div class="main-panel">
        <div class="contant-wrapper">

        
        @if(session()->has('message'))

        <div class="alert alert-success">

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        {{session()->get('message')}}
        </div>

        @endif

            <div class="div_center">
                <h2 class="font-size">Add products</h2>

                <!--enctype allow to submite a file.-->
                <form action="{{url('/update_product_data', $product->id)}}" method="post" enctype="multipart/form-data">
                    
                @csrf
                    <div class="div_desgin">
                        <label>Product title:</label>
                        <input type="text" name="title" class="input_color"  value="{{$product->title}}" required="">
                    </div>
                    
                    <div class="div_desgin">
                        <label>Product description:</label>
                        <input type="text" name="description" class="input_color" required="" value="{{$product->description}}">
                    </div>
                    
                    <div class="div_desgin">
                        <label>Product price:</label>
                        <input type="number" name="price" class="input_color" required="" value="{{$product->price}}">
                    </div>

                    <div class="div_desgin">
                        <label>Product discount:</label>
                        <input type="number" name="discount_price" class="input_color" value="{{$product->discount_price}}">
                    </div>
                    
                    <div class="div_desgin">
                        <label>Product quantity:</label>
                        <input type="number" name="quantity" class="input_color" min="0" value="{{$product->quantity}}">
                    </div>
                    
                    <div class="div_desgin">
                        <label>Product category:</label>
                        <select required=""  name="category" class="input_color cat-desgin">
                        
                        @foreach($category as $category)
                            <option value="{{$category->category_name}}" selected="">{{$category->category_name}}</option>    
                        @endforeach
                        </select>
                    </div>
                    

                    <div class="div_desgin">
                        <label>Current Product Image:</label>
                        <img src="{{url('product/', $product->image)}}" alt="" style="margin:auto" width="100" hiegh="100">
                    </div>

                    <div class="div_desgin">
                        <label>Product Image:</label>
                        <input 
                            type="file" 
                            name="image" 
                            id="productImg"
                            value="{{$product->image}}">

                        </div>
                    
                    <div class="div_desgin">
                        <input type="submit" value="Update Product" class="btn btn-primary">
                    </div>
                 
                </form>
            </div>
        </div>
    </div>
        <!-- script -->
        @include('admin.script')
  </body>
</html>