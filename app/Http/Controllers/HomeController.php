<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Card;
use App\Models\Order;
use Session;
use Stripe;

class HomeController extends Controller
{
    /**
     * View admin panel or user home page.
     * 
     * @return views\home\userpage|views\admin\home
     */
    public function redirect() {

        $userType = Auth::user()->userType;

        if ($userType == 1) {

            return view('admin.home');
        } else {
            $product=Product::paginate(10);

            return view('home.userpage', compact('product'));
        }
    }

    /**
     * Method to view the home page.
     * 
     * @return views\home\userpage
     */
     public function index() {

        $product=Product::paginate(10);

        return view('home.userpage', compact('product'));
    }
    /**
     * Method to view single page for a product.
     */
    public function product_ditail ($id) {

        $product = Product::find($id);

        return view('home.product_ditail', compact('product'));
    }

    /**
     * Method to add a product to the card.
     * 
     * @param Request @request
     * @param integer $id
     * @return void
     */
    public function add_card(Request $request, $id) {

        if(Auth::id()) {

            $user = Auth::user();

            $product =Product::find($id);
            
            $card = new Card;
            
            $card->name = $user->name;
            $card->email = $user->email;
            $card->phone = $user->phone;
            $card->address = $user->address;
            $card->user_id = $user->id;        
            $card->product_title = $product->title;

            // Get the discount price if exist.
            if($product->discount_price!=null){

                $card->price = $product->discount_price * $request->quantity;
            }
            else{
                $card->price = $product->price * $request->quantity;
            }

            $card->image = $product->image;
            $card->product_id = $product->id;

            // Came from the request form.
            $card->product_quantity = $request->quantity;

            $card->save();

            return redirect()->back(); 

        }
        else {
            
            return redirect('login');
        }
    }

    /**
     * Method to show product in card page.
     */
    public function show_card() {


        // If user loged in.
        if(Auth::id()){

        // get user id.
        $id = Auth::user()->id;
        
        // Get card object for the user that loged in.
        $card = card::where('user_id', '=', $id)->get();
        
        
        if($card->isNotEmpty()) {

        // send object data to view using compact helper method.
        return view('home.show_card', compact('card'));
                
        }
        else {
            return view('home.emptycart');
        }
        }
        else{

            return redirect('login');
        }
    }

    /**
     * Method to remove product from the cart 
     */
    public function remove_card($id) {

        $card = card::find($id);

        $card->delete();

        return redirect()->back();

    }

    /**
     * Add data to the Order object
     * and delete it from card object
     * 
     * @param integer $id
     * @return void
     */
    public function cash_order($id) {

        $userId = Auth::user()->id;

        $card_data = card::where('user_id', '=', $userId)->get();
        
        foreach($card_data as $data) {

            // debugging
            // dd($card_data);

            $order = new Order();

            // Data from user model.
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            // Data from Product modle.
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->product_quantity;
            $order->image = $data->image;
            $order->product_id = $data->id;

            // Order proberties.
            $order-> payment_status = 'cash on delivery';
            $order-> delivery_status = 'processing';


             $order->save();


            // Loop and delete every product in the card table.
            $card_id = $data->id;

            $card = card::find($card_id);
 
             $card->delete(); 

        }

    return redirect('/')->back()->with('message', 'Thanks, we recived your order.');

    }
 
    /**
     * 
     * @param integer $totalprice
     * @return \Illuminate\Http\Response 
     */
    public function stripe($totalprice) {

        return view('home.stripe', compact('totalprice'));
    }

    /**
     * payment success response method.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        /**
         * Read Stripe docs for more.
         */
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for Payment." 
        ]);
      

        
        $userId = Auth::user()->id;

        $card_data = card::where('user_id', '=', $userId)->get();
        
        foreach($card_data as $data) {

            // debugging
            // dd($card_data);

            $order = new Order();

            // Data from user model.
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            // Data from Product modle.
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->product_quantity;
            $order->image = $data->image;
            $order->product_id = $data->id;

            // Order proberties.
            $order-> payment_status = 'paid';
            $order-> delivery_status = 'processing';


             $order->save();


            // Loop and delete every product in the card table.
            $card_id = $data->id;

            $card = card::find($card_id);
 
             $card->delete(); 

        }



        Session::flash('success', 'Payment successful!');
              
        return back();
    }

}
