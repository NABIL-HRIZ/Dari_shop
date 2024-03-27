<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function redirect(){   

        $products=Product::where('category','table')->get();

        $bedRoom=Product::where('category','bed')->get();

        $popular_product=Product::where('category','popular_product')->get();


        $userId=Auth::id();




        $total_product=Product::all()->count();

        $total_order=Order::all()->count();

        $total_user=User::all()->count();

        $order=Order::all();
        $total_revenue=0;

        $orders_delivered=Order::where('delivery_status','delivered')->count();

        $orders_processing=Order::where('delivery_status','In Progress')->count();


        foreach($order as $order){
            $total_revenue=$total_revenue + $order->product_price;
        }


        
        if(Auth::id()){
            if(Auth::user()->user_type=='0'){
                return view('user.home',compact('products','bedRoom','popular_product'));
            }
            else{
                return view('admin.home',compact('total_product','total_order','total_user','total_revenue','orders_delivered','orders_processing'));
            }
        }
        else {
            return redirect()->back();
        }


    }

    public function index(){
        $products=Product::where('category','table')->get();
     

        $bedRoom=Product::where('category','bed')->get();

        $popular_product=Product::where('category','popular_product')->get();


        if(Auth::id()){
            return view('user.home',compact('products','bedRoom','popular_product'));
        }
        else {
            return view('user.home',compact('products','bedRoom','popular_product'));
        }
    }

    public function show_details($id){
        $product=Product::find($id);
        return view('user.show_details',compact('product'));
    }

    public function show_cart(){
        if(Auth::id()){
            $id=Auth::user()->id;
            $carts=Cart::where('user_id','=',$id)->get();
            return view('user.show_cart',compact('carts'));
        }
        else {
            return redirect('login');
        }
    }

    public function add_cart(Request $request , $id){

        if(Auth::id()){
             
            $user=Auth::user();
            $product=Product::find($id);

            $cart=new Cart;

            $cart->customer_name=$user->name;
            $cart->customer_phone=$user->phone;
            $cart->customer_email=$user->email;
            $cart->customer_address=$user->address;

            $cart->product_title=$product->title;
            $cart->product_quantity=$request->quantity;
            $cart->product_price=$product->price;
            $cart->product_image=$product->image;


            $cart->product_id=$product->id;
            $cart->user_id=$user->id;


            $cart->save();

            return redirect()->back()->with('success','Success Add');

        }
        else {
            return redirect('/login');
        }
    }

    public function remove_product($id){
        $data=Cart::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function cash_order(){
        $user=Auth::user();
        $userId=$user->id;
        $data=Cart::where('user_id','=',$userId)->get();

        foreach($data as $data){
            $order=new Order;

            $order->customer_name=$data->customer_name;
            $order->customer_phone=$data->customer_phone;
            $order->customer_email=$data->customer_email;
            $order->customer_address=$data->customer_address;
            $order->user_id=$data->user_id;

            $order->product_title=$data->product_title;
            $order->product_quantity=$data->product_quantity;
            $order->product_price=$data->product_price;
            $order->product_image=$data->product_image;
            $order->product_id=$data->product_id;

            $order->payment_status="Cash On Delivery";
            $order->delivery_status="In Progress";

            $order->save();

            $order_selected=$data->id;
            $cart_for_delete=Cart::find($order_selected);
            $cart_for_delete->delete();

            return redirect()->back()->with('success','We have received your order','will contact you soon !!');



        }
    }

    public function stripe($totalPrice){
        return view('user.stripe',compact('totalPrice'));
    }

    public function stripePost(Request $request,$totalPrice) // dont forget to add \Stripe\Stripe kanat bla \ 
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        \Stripe\Charge::create ([
                "amount" => $totalPrice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks For Payment." 
        ]);

        $user=Auth::user();
        $userId=$user->id;
        $data=Cart::where('user_id','=',$userId)->get();

        foreach($data as $data){
            $order=new Order;

            $order->customer_name=$data->customer_name;
            $order->customer_phone=$data->customer_phone;
            $order->customer_email=$data->customer_email;
            $order->customer_address=$data->customer_address;
            $order->user_id=$data->user_id;

            $order->product_title=$data->product_title;
            $order->product_quantity=$data->product_quantity;
            $order->product_price=$data->product_price;
            $order->product_image=$data->product_image;
            $order->product_id=$data->product_id;

            $order->payment_status="Paid";
            $order->delivery_status="In Progress";

            $order->save();

            $order_selected=$data->id;
            $cart_for_delete=Cart::find($order_selected);
            $cart_for_delete->delete();




        }


      
        Session::flash('success', 'Payment successful!'); // add use Illuminate\Support\Facades\Session;
              
        return back();
    }

    public function show_order(){
        
        if(Auth::id()){
            $userId=Auth::id();
            $orders=Order::orderBy('created_at','desc')->where('user_id',$userId)->get();
            return view('user.show_order',compact('orders'));

        }
        else {
            return redirect('login');
        }

       
    }

    public function cancel_order($id){
        $data=Order::find($id);
        $data->delivery_status="You Canceled This Order";


        $data->save();

        return redirect()->back();
    }
}
