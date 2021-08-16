<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImg;
use Illuminate\Support\Carbon;
use Image;

class ProductController extends Controller
{
    public function AddProduct()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.product_add',compact('categories','brands'));
    }
    public function ProductStore(Request $request)
    {
        $image = $request->file('product_thumbnail');
        $name_gen =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_mm' => $request->product_name_mm,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_slug_mm' => str_replace(' ','-',$request->product_name_mm), 
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_mm' => $request->product_tags_mm,
            'product_size_en' => $request->product_size_en,
            'product_size_mm' => $request->product_size_mm,
            'product_color_en' => $request->product_color_en,
            'product_color_mm' => $request->product_color_mm,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_mm' => $request->short_descp_mm,
            'long_descp_en' => $request-> long_descp_en,            
            'long_descp_mm' => $request->long_descp_mm,
            'product_thumbnail' =>$save_url,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        //////////////////Multiple Image Upload//////////////
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name =hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'.$make_name;
            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }       
        
        //////////////////End Multiple Image Upload//////////////
        //For toastr message
        $notification = array(
            'message' => 'Product Inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.product')->with($notification);
    }
    public function ManageProduct()
    {
        $products = Product::latest()->get();
        return view('admin.product.product_all',compact('products'));
    }
    public function ProductEdit($id)
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $product = Product::findOrFail($id);
        $multiImgs = MultiImg::where('product_id',$id)->get();

        return view('admin.product.product_edit',compact('product','brands','categories','subcategories','subsubcategories','multiImgs'));

    }
    public function ProductUpdate(Request $request)
    {
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_mm' => $request->product_name_mm,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_slug_mm' => str_replace(' ','-',$request->product_name_mm), 
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_mm' => $request->product_tags_mm,
            'product_size_en' => $request->product_size_en,
            'product_size_mm' => $request->product_size_mm,
            'product_color_en' => $request->product_color_en,
            'product_color_mm' => $request->product_color_mm,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_mm' => $request->short_descp_mm,
            'long_descp_en' => $request-> long_descp_en,            
            'long_descp_mm' => $request->long_descp_mm,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'Product Updated without Image Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('manage.product')->with($notification);
    }
    public function MultiImageUpdate(Request $request)
    {
        $imgs = $request->multi_img;
        foreach ($imgs as $id => $img) {
            $old_image = MultiImg::findOrFail($id);
            unlink($old_image->photo_name);

            $make_name =hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'.$make_name;

            MultiImg::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
        }
        //For toastr message
        $notification = array(
            'message' => 'Product Image Updated Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function ThumbnailImageUpdate(Request $request)
    {       
        $product_id = $request->id;
 	    $old_image = $request->old_image;
        unlink($old_image);

        $image = $request->file('product_thumbnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('upload/products/thumbnail/'.$name_gen);
    	$save_url = 'upload/products/thumbnail/'.$name_gen;

        Product::findOrFail($product_id)->update([
    		'product_thumbnail' => $save_url,
    		'updated_at' => Carbon::now(),

    	]);
        //For toastr message
        $notification = array(
            'message' => 'Product Thumbnail Image Updated Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function MultiImageDelete($id)
    {
        $old_image = MultiImg::findOrFail($id);
        unlink($old_image->photo_name);
        MultiImg::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Image Deleted Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update([
            'status' => 0,
        ]);
        $notification = array(
			'message' => 'Product Inactive',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }
    public function ProductActive($id)
    {
        Product::findOrFail($id)->update([
            'status' => 1,
        ]);
        $notification = array(
			'message' => 'Product Inactive',
			'alert-type' => 'success'
		);
        return redirect()->back()->with($notification);
    }
    
    public function ProductDelete($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $multiImgs = MultiImg::where('product_id',$id)->get();
        foreach ($multiImgs as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }       

        //For toastr message
        $notification = array(
            'message' => 'Product Deleted Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
