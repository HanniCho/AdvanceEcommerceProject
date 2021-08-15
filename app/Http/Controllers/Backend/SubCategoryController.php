<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{
    public function DisplaySubCategories()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('admin.category.subcategory_all',compact('subcategories','categories'));
    }
    public function SubCategoryStore(Request $request)
    {
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_mm'=> 'required',
            'category_id'=> 'required',
        ],[
            'category_id.required' => 'Please select one category',
            'subcategory_name_en.required' => 'Please input Sub Category Name in English',
            'subcategory_name_mm.required'=> 'Please input Sub Category Name in Myanmar',
        ]);

        SubCategory::insert([
            'category_id'=> $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_mm'=> $request->subcategory_name_mm,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_mm'=> str_replace(' ','-',$request->subcategory_name_mm),            
            'created_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'Sub Category Inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function SubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.category.subcategory_edit',compact('subcategory','categories'));
    }
    public function SubCategoryUpdate(Request $request,$id)
    {
        $subcategory_id = $id;
        
        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_mm'=> $request->subcategory_name_mm,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_mm'=> str_replace(' ','-',$request->subcategory_name_mm),
            'updated_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'SubCategory Updated Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }
    public function SubCategoryDelete($id)
    {
        SubCategory::findOrFail($id)->delete();

        //For toastr message
        $notification = array(
            'message' => 'Sub Category Deleted Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    ////////////////////////Sub subcategory///////////
    public function DisplaySubSubCategories()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('admin.category.subsubcategory_all',compact('subsubcategories','categories'));
    }
    public function GetSubCategory($category_id)
    {
        $subcategory = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
     	return json_encode($subcategory);
    }
    public function GetSubSubCategory($subcategory_id){

        $subsubcategory = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcategory);
     }
    public function SubSubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id'=> 'required',
            'subcategory_id'=> 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_mm'=> 'required',
            
        ],[
            'category_id.required' => 'Please select one category',
            'subcategory_id.required' => 'Please select one sub-category',
            'subsubcategory_name_en.required' => 'Please input Sub-SubCategory Name in English',
            'subsubcategory_name_mm.required'=> 'Please input Sub-SubCategory Name in Myanmar',
        ]);

        SubSubCategory::insert([
            'category_id'=> $request->category_id,
            'subcategory_id'=> $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_mm'=> $request->subsubcategory_name_mm,
            'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_mm'=> str_replace(' ','-',$request->subsubcategory_name_mm),            
            'created_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'Sub-SubCategory Inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function SubSubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);
        return view('admin.category.subsubcategory_edit',compact('subsubcategory','categories','subcategories'));
    }
    public function SubSubCategoryUpdate(Request $request,$id)
    {
        $subsubcategory_id = $id;
        
        SubSubCategory::findOrFail($subsubcategory_id)->update([
            'category_id' => $request->category_id,
		    'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_mm,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ', '-',$request->subsubcategory_name_mm),
            'updated_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'Sub->SubCategory Updated Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }
    public function SubSubCategoryDelete($id)
    {
        SubSubCategory::findOrFail($id)->delete();

        //For toastr message
        $notification = array(
            'message' => 'Sub-SubCategory Deleted Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
