<?php

namespace App\Http\Controllers\UserControllers;

use App\Models\Cart;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UProductController extends Controller
{
    public $productID;

    public function viewProductDetail($product_id)
    {
        $category=Category::all(); //to show all categories in header
        $product=Product::find($product_id);
        $reviews=$product->reviews()->get(); //to display some reviews
        $popular_product=Product::where('trending','1')->take(4)->get();
        return view('pages.view_product',compact('product','popular_product','reviews','category'));
    }


    public function review(Request $request)
    {
        $product_id=$request->input('product_id');
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'review' => 'required',
            'rating' => 'required',
        ]);
        $product_check=Product::where('id',$product_id)->first();

        if($product_check)
        {
            $review = new Review();

            $review->name = $request->name;
            $review->email = $request->email;
            $review->review = $request->review;
            $review->rating = $request->rating;
            $review->product_id = $request->product_id;
            $review->save();
            return back()->with('success', 'Thank you for review!');
        }

    }

}
