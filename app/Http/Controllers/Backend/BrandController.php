<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function DisplayBrands()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.brand_all',compact('brands'));
    }
    public function BrandStore(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_mm'=> 'required',
            'brand_image'=> 'required|mimes:jpg.jpeg,png',
        ],[
            'brand_name_en.required' => 'Please input Brand Name in English',
            'brand_name_mm.required'=> 'Please input Brand Name in Myanmar',
        ]);

        $image = $request->file('brand_image');
        $name_gen =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_mm'=> $request->brand_name_mm,
            'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
            'brand_slug_mm'=> str_replace(' ','-',$request->brand_name_mm),
            'brand_image'=> $save_url,
            'created_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'Brand Inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function BrandEdit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.brand_edit',compact('brand'));
    }
    public function BrandUpdate(Request $request, $id)
    {
        //$brand_id = $request->id;
        $brand_id = $id;
        $old_image = $request->old_image;
        if ($request->file('brand_image')) {
            unlink($old_image);
            $image = $request->file('brand_image');
            $name_gen =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;

            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_mm'=> $request->brand_name_mm,
                'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
                'brand_slug_mm'=> str_replace(' ','-',$request->brand_name_mm),
                'brand_image'=> $save_url,
                'updated_at' => Carbon::now(),
            ]);
            //For toastr message
            $notification = array(
                'message' => 'Brand Updated Successfully!',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brand')->with($notification);
            
        } else {
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_mm'=> $request->brand_name_mm,
                'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
                'brand_slug_mm'=> str_replace(' ','-',$request->brand_name_mm),
                'updated_at' => Carbon::now(),
            ]);
            //For toastr message
            $notification = array(
                'message' => 'Brand Updated Successfully!',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brand')->with($notification);
            
        }
        

    }
    public function BrandDelete($id)
    {
        $brand = Brand::findOrFail($id);
        $old_image = $brand->brand_image;
        unlink($old_image);

        Brand::findOrFail($id)->delete();

        //For toastr message
        $notification = array(
            'message' => 'Brand Deleted Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
