<?php

namespace App\Http\Controllers\PagesControllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $category=Category::all(); //to show all categories in header
        $wishlistItems=Wishlist::where('user_id',Auth::id())->get();
        return view('pages.wishlist',compact('wishlistItems','category'));
    }

    public function addToWishlist(Request $request)
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
                if(Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return redirect('/wishlist')->with('info', 'Product Already Added To Wishlist!');

                }
                else
                {
                    $wishlistItem=new Wishlist();
                    $wishlistItem->product_id=$product_id;
                    $wishlistItem->user_id=Auth::id();
                    $wishlistItem->product_qty=$product_qty;
                    $wishlistItem->selling_price=$selling_price;
                    $wishlistItem->save();
                    return redirect('/wishlist')->with('success','Added To Wishlist Successfully');
                }
            }

        }
        else
        {
            return redirect('/login')->with('warning', 'LogIn First !');
        }
    }

    public function deleteItem(Request $request)
    {
        if(Auth::check())
        {
            $product_id=$request->input('product_id');
            if(wishlist::where('product_id' , $product_id)->where('user_id',Auth::id())->exists())
            {
                $wishlistItems=Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $wishlistItems->delete();
                return redirect('/wishlist')->with('success', 'Deleted From Wishlist Successfully !');
            }
        }
         else
        {
            return redirect('/login')->with('warning', 'LogIn First !');
        }
    }

    public function updateQtyNum(Request $request)
    {
       $product_id =$request->input('product_id');
       $products_qty =$request->input('product_qty');
       if(Auth::check())
       {
        if(Wishlist::where('product_id' , $product_id)->where('user_id',Auth::id())->exists())
        {
            $wishlistItem = Wishlist::where('product_id' , $product_id)->where('user_id',Auth::id())->first();
            $wishlistItem->product_qty = $products_qty;
            $wishlistItem->update();
            return redirect('/wishlist')->with('success', 'Product Quantity Number Updated!');
        }
       }
    }

}
