<?php

namespace App\Http\Controllers\PagesControllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $product=Product::paginate(20);
        $category=Category::paginate(20);
        $latest_product=Product::where('trending','1')->take(15)->get();
        return view('pages.home',compact('product','category','latest_product'));
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the products table
        $products = Product::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('slug', 'LIKE', "%{$search}%")
            ->get();
        return view('pages.searchResult', compact('products'));
    }

    public function viewCategory()
    {
        $category=Category::paginate(20);
        return view('layouts.header',compact('category'));
    }
}
