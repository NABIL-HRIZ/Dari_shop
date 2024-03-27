<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\Product;
use App\Models\Order;
use Alert;
use PDF;
use Notification;
use App\Notifications\Dari_Shop_Notification;
class AdminController extends Controller
{
    public function add_category(){

        $categories=categories::orderBy('created_at','desc')->get();

        return view('admin.add_category',compact('categories'));
    }

    public function upload_category(Request $request){

        $categoryName=new categories;
        $categoryName->category_name=$request->category_name;

        $categoryName->save();

        Alert::success('congras','Category Successfuly Added');
        
        return redirect()->back();
    }

    public function delete_category($id){
        $data=categories::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function add_product(){
        $categories=categories::orderBy('created_at','desc')->get();        
        return view('admin.add_product',compact('categories'));
    }

    public function upload_product(Request $request){
        $products=new Product;

        if($request->hasfile('image')){
            $image=$request->file('image');
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $image->move('ProductImage',$imagename);

            $products->image=$imagename;
        }

            $products->title=$request->title;
            $products->description=$request->description;
            $products->quantity=$request->quantity;
            $products->price=$request->price;
            $products->discount_price=$request->discount_price;
            $products->category=$request->category;

            $products->save();
            Alert::success('Congras','Product Added');
            return redirect()->back();

        
    }

    public function all_products(){
        $products=Product::orderBy('created_at','desc')->get();
        return view('admin.all_products',compact('products'));
    }

    public function delete_product($id){
        $data=Product::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function update_product($id){
        $categories=categories::orderBy('created_at','desc')->get();        
        $data=Product::find($id);
        return view('admin.update_product',compact('data','categories'));
    }

    public function upload_update_product(Request $request , $id){

        $data=Product::find($id);

        if($request->hasfile('image')){
            $image=$request->file('image');
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $image->move('ProductImage',$imagename);

            $data->image=$imagename;
        }

            $data->title=$request->title;
            $data->description=$request->description;
            $data->quantity=$request->quantity;
            $data->price=$request->price;
            $data->discount_price=$request->discount_price;
            $data->category=$request->category;

            $data->save();
            Alert::success('Congras','Product Update Successfuly');
            return redirect()->back();

    }

    public function show_orders(){
        $orders=Order::all();
        return view('admin.show_orders',compact('orders'));
    }

    public function delivery($id){
        $data=Order::find($id);
        $data->delivery_status="Delivered";
        $data->payment_status='paid';
        $data->save();
        return redirect()->back();
    }

    public function delete_order($id){
        $data=Order::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function print_order($id){
        $data=Order::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('data'));
        return $pdf->download('order_details.pdf');
    }

    public function send_email($id){
        $data=Order::find($id);
        return view('admin.send_email',compact('data'));
    }

    public function send_user_email(Request $request,$id){
        $data=Order::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'first_line'=>$request->first_line,
            'body'=>$request->body,
            'email_btn'=>$request->email_btn,
            'email_url'=>$request->email_url,
            'last_line'=>$request->last_line,

        ];
        Notification::send($data,new Dari_Shop_Notification($details));

        Alert::success('','Email Successfuly Sended !');
        return redirect()->back();
    }

    public function search_order(Request $request){

        $search=$request->search_input;
        $orders=Order::where('customer_name','LIKE',"%$search%")->get();
        $orders=Order::where('product_title','LIKE',"%$search%")->get();


        return view('admin.show_orders',compact('orders'));
    }
}
