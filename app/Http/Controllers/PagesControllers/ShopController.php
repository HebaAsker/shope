<?php

namespace App\Http\Controllers\PagesControllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $category=Category::all(); //to show all categories in header
        $product=Product::all();
        $popular_product=Product::where('trending','1')->take(6)->get();
        return view('pages.shop',compact('product','popular_product','category'));
    }

    public function filter(Request $request){
        // Get the search value from the request
        $filter = $request->input('filter');

        // Search in the title and body columns from the products table
        $products = Product::query()
            ->where('selling_price', 'LIKE', "%{$filter}%")
            ->get();
        return view('pages.searchResult', compact('products'));
    }

}
