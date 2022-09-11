<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\user;

use App\Models\order;

use PDF;

class AdminController extends Controller

{
        // Method to view user page
        public function index() {
            
            return view('home.userpage');
        }
    
        // __________ Method to view Catigory ____________
        public function view_category() {


            //13. Pass data to the view using compact method
            $data = Category::all();

            return view('admin.category', compact('data'));
        }


        // Method to call after adding new category
        public function add_category(Request $request) {

            $data = new category;

            $data->category_name = $request->category;

            $data->save();
            
            return redirect()->back()->with('message', 'category has been added successfuly');

        }

        //Method to delete a category.
        public function delete_category($id) {

            $data = Category::find($id);

            $data->delete();


            return redirect()->back()->with('message', 'Category Has Been Deleted Successfuly')
            ;

        }


    // Method called by a route to view add product page.
    public function view_product() {

        $category = Category::all();

        return view('admin.products', compact('category'));

    }


        // Method to call after adding new product
        public function add_product(Request $request) {

            // Create an object
            $product = new product;

            // Store data to the object attributes.
            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->discount_price = $request->discount_price;
            $product->quantity = $request->quantity;
            $product->category = $request->category;

            //18. Store the file to a veriable.
            $image = $request->image;

            //18. Create a name for the image with original client extention.
            $imageName = time().'.'.$image->getClientOriginalExtension();

            //18 Store the image in public\procuct and give name that already has been created.
            $image->move('product', $imageName);

            // Save the objcet to the database.
            $product->image = $imageName;

            $product->save();

            // Refresh and show up a success message.
            return redirect()->back()->with('message', 'Product has been added successfuly');

        }


        // method to view "show product" page.
        public function show_product() {

            $product = Product::all();

            return view('admin.show_product', compact('product'));

        }

        // Method to delete a product.
        public function delete_product($id) {

            $product = Product::find($id);    
               
            $product->delete();

            return redirect()->back()->with('message', 'Product has been deleted successfuly');
        
        }

        // Method to edit a product.
        public function update_product($id) {

            $product = Product::find($id);    

            $category = Category::all();

            return view('admin.update_product', compact('product', 'category'));
        }


        // Method for testing
        public function test() {

            return view('admin.test');
        }


        // Method to update product data.
        public function update_product_data($id, Request $request) {

            $product = Product::find($id);

            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->discount_price = $request->discount_price;
            $product->quantity = $request->quantity;
            $product->category = $request->category;


            //18. Store the file to a veriable.
            $image = $request->image;

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            //18. Create a name for the image with original client extention.
            $imageName = time().'.'.$image->getClientOriginalExtension();

            //18 Store the image in public\procuct and give name that already has been created.
            $image->move('product', $imageName);

            // Save the objcet to the database.
            $product->image = $imageName;

            $product->save();

            
            // Refresh and show up a success message.
            return redirect()->back()->with('message', 'Product has been updated successfuly');

        }


        /**
         * Create an order
         * 
         * @return void
         */
        public function order() {

            $orders = Order::all();

            //dd($orders);

            return view('admin.order', compact('orders'));
        }



        /**
         * change order statuts to delivered
         * 
         * @param integer $id
         * 
         */
        public function delivered($id) {

            $order = Order::find($id);

            $order->delivery_status ="delivered";

            $order->payment_status = "Paid";

            $order->save();

            return redirect()->back();

        }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print_pdf($id)
    {

        $order = Order::find($id);

        $pdf = PDF::loadview('admin.pdf', compact('order'));

        return $pdf->download('order_details.pdf');

    }
}


