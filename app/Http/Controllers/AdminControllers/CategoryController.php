<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function CategoryPage()
    {
        $category=Category::all(); //view all in the category model
        return view('dashboard.category.view_category',compact('category'));
    }

    public function AddCategoryPage()
    {
        return view('dashboard.category.add_category');
    }

    public function addCategory(Request $request) {


        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'status' => 'required',
            'popular' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

            $category = new Category;

            if($request->hasFile('image')){
                $file=$request->file('image');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension; //the file name will be the time at which the file uploaded+ the file extension
                $file->move('assets/uploads/category',$filename);
                $category->image=$filename;
            }
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->description = $request->description;
            $category->status = $request->status==True?'1':'0';
            $category->popular = $request->popular==True?'1':'0';
            $category->save();



        return redirect('/view_category')->with('success', 'The Category Added Successfully!');

    }

    public function updateCategoryPage($id)
    {
        $category=Category::find($id);
        return view('dashboard.category.edit_category',compact('category'));
    }

    public function updateCategory(Request $request, $id) {
        $category=Category::find($id);
        if($request->hasFile('image'))
        {
            $path='assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension; //the file name will be the time at which the file uploaded+ the file extension
            $file->move('assets/uploads/category',$filename);
            $category->image=$filename;
        }
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->description = $request->description;
            $category->status = $request->status==True?'1':'0';
            $category->popular = $request->popular==True?'1':'0';
            $category->update();

        return redirect('/view_category')->with('success', 'The Category Updated Successfully!');

    }

    public function deleteCategory($id)
    {
        $category=Category::find($id);
        if($category->image)
        {
            $path='assets/uploads/category/' .$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $category->delete();
            return redirect('/view_category')->with('success','The Category Deleted Successfully!');
        }
    }
}
