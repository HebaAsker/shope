<?php

namespace App\Http\Controllers\PagesControllers;

use App\Models\Cart;
use App\Models\Orders;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $category=Category::all(); //to show all categories in header
        return view('pages.checkout',compact('category'));
    }

    public function placeOrder()
    {
        return view('pages.thankyou');
    }

    public function place_order(Request $request)
    {
       $order = new Orders();
       $order->user_id=Auth::id();
       $order->first_name=$request->input('first_name');
       $order->last_name=$request->input('last_name');
       $order->email=$request->input('email');
       $order->phone_number=$request->input('phone_number');
       $order->address=$request->input('address');
       $order->country=$request->input('country');
       $order->ZIP=$request->input('ZIP');
       $order->city=$request->input('city');
       $order->pay_method=$request->input('pay_method');
       $order->total_price=$request->input('payment_id');
       $order->save();
    }
}
