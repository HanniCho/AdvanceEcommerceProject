<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Category;

class CategoryController extends Controller
{
    public function DisplayCategories()
    {
        $categories = Category::latest()->get();
        return view('admin.category.category_all',compact('categories'));
    }
    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required|unique:categories|max:255',
            'category_name_mm'=> 'required|unique:categories',
            'category_icon'=> 'required',
        ],[
            'category_name_en.required' => 'Please input Category Name in English',
            'category_name_mm.required'=> 'Please input Category Name in Myanmar',
            'category_icon.required'=> 'Please input Category Icon',
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_mm'=> $request->category_name_mm,
            'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_slug_mm'=> str_replace(' ','-',$request->category_name_mm),
            'category_icon'=> $request->category_icon,
            'created_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'Category Inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.category_edit',compact('category'));
    }
    public function CategoryUpdate(Request $request,$id)
    {
        $category_id = $id;
        
        Category::findOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_mm'=> $request->category_name_mm,
            'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_slug_mm'=> str_replace(' ','-',$request->category_name_mm),
            'category_icon'=> $request->category_icon,
            'updated_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'Category Updated Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('all.category')->with($notification);
    }
    public function CategoryDelete($id)
    {
        Category::findOrFail($id)->delete();

        //For toastr message
        $notification = array(
            'message' => 'Category Deleted Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
