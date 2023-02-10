<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function viewProductPage()
    {
        $product=Product::all(); //view all in the category model
        return view('dashboard.product.view_product',compact('product'));
    }

    public function chooseCategory(){
        $category=Category::all();
        return view('dashboard.product.add_products',compact('category'));
    }
    public function addProduct(Request $request) {
        $this->validate($request, [
            'category_id',
            'name' => 'required',
            'slug' => 'required',
            'small_description' => 'required',
            'description' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            'tax' => 'required',
            'qty' => 'required',
            'status' => 'required',
            'trending' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $product = new Product;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension; //the file name will be the time at which the file uploaded+ the file extension
            $file->move('assets/uploads/product',$filename);
            $product->image=$filename;
        }
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->tax = $request->tax;
        $product->qty = $request->qty;
        $product->status = $request->status==True?'1':'0';
        $product->trending = $request->trending==True?'1':'0';
        $product->save();

        return back()->with('success', 'The Product Added Successfully!');
    }

    public function UpdateProductPage($id)
    {
        $product=Product::find($id); //view all in the product model
        return view('dashboard.product.edit_product',compact('product'));
    }
    public function updateProduct(Request $request,$id) {
        $product=Product::find($id);
        if($request->hasFile('image'))
        {
            $path='assets/uploads/product/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension; //the file name will be the time at which the file uploaded+ the file extension
            $file->move('assets/uploads/product',$filename);
            $product->image=$filename;
        }
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->tax = $request->tax;
        $product->qty = $request->qty;
        $product->status = $request->status==True?'1':'0';
        $product->trending = $request->trending==True?'1':'0';
        $product->save();

        return redirect('/view_product')->with('success', 'The Product Updated Successfully!');
    }

    public function deleteProduct($id)
    {
        $product=Product::find($id);
        if($product->image)
        {
            $path='assets/uploads/product/' .$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $product->delete();
            return redirect('/view_product')->with('success','The Product Deleted Successfully!');
        }
    }




}
