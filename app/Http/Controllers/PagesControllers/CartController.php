<?php

namespace App\Http\Controllers\PagesControllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $category=Category::paginate(20); //to show some categories in header
        $cartItems=Cart::where('user_id',Auth::id())->get(); // this line return collection
        return view('pages.cart',compact('cartItems','category'));
    }

    //we will use it for all add to cart buttons
    public function addToCart(Request $request)
    {
        $product_id=$request->input('product_id');
        $product_qty=$request->input('product_qty');
        $selling_price=$request->input('selling_price');

        //to make that the user already login
        if(Auth::check())
        {
            $product_check=Product::where('id',$product_id)->first();

            if($product_check)
            {   //chick if the product is already exist
                if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return back()->with('info', 'Product Already Added To Cart!');

                }
                else
                {
                    $cartItem=new Cart();//make object og cart model
                    $cartItem->product_id=$product_id;
                    $cartItem->user_id=Auth::id();
                    $cartItem->product_qty=$product_qty;
                    $cartItem->selling_price=$selling_price;
                    $cartItem->save();
                        //Check if the product i added to cart exist in wishlist and delete it
                        if(Wishlist::where('product_id' , $product_id)->where('user_id',Auth::id())->exists())
                        {
                            $wishlistItems=Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                            $wishlistItems->delete();
                        }
                    return redirect('/cart')->with('success','Added To Cart Successfully');
                }
            }

        }
        else
        {
            return redirect('/cart')->with('warning', 'LogIn First !');
        }
    }

    public function deleteItem(Request $request)
    {
        if(Auth::check())
        {
            $product_id=$request->input('product_id');
            if(Cart::where('product_id' , $product_id)->where('user_id',Auth::id())->exists())
            {

                $cartItem=Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return redirect('/cart')->with('success', 'Deleted From Cart Successfully !');
            }
        }
         else
        {
            return redirect('/cart')->with('warning', 'LogIn First !');
        }
    }

    public function updateQtyNum(Request $request)
    {

       if(Auth::check())
       {
        // dd($request->product_id);
        $product_id =$request->input('product_id');
        $products_qty =$request->input('product_qty');
        if(Cart::where('product_id' , $product_id)->where('user_id',Auth::id())->exists())
        {
            $cartItem = Cart::where('product_id' , $product_id)->where('user_id',Auth::id())->first();
            $cartItem->product_qty = $products_qty;
            $cartItem->update();
            return redirect('/cart')->with('success', 'Product Quantity Number Updated!');
        }
       }
    }


}
