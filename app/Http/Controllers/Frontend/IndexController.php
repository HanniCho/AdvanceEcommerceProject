<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Brand;
use App\Models\MultiImg;
use Illuminate\Support\Facades\Hash; 

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $featured = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
        $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
        $special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(3)->get();
        $special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();

        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();

        $skip_brand_6 = Brand::skip(6)->first();
        $skip_brand_product_6 = Product::where('status',1)->where('brand_id',$skip_brand_6->id)->orderBy('id','DESC')->get();

        //  return $skip_product_0->id;
        //  die();

        return view('frontend.index', compact('categories','sliders','products','featured','hot_deals',
        'special_offer','special_deals','skip_category_0','skip_product_0',
        'skip_category_1','skip_product_1','skip_brand_6','skip_brand_product_6'));
    }
    public function UserLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile',compact('user'));
    }
    public function UserProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $profile_photo = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path)); //delete previous profile photo
            
            $filename = date('YmdHi').$profile_photo->getClientOriginalName();
            $profile_photo->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        //For toastr message
        $notification = array(
            'message' => 'User Profile Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }
    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        // @php
        //     $user = DB::table('users')->where(Auth::user()->id)->first();
        // @endphp
        return view('frontend.profile.user_change_password',compact('user'));
    }
    public function UserUpdateChangedPassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {   
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }
        else {
            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function ProductDetails($id,$slug)
    {
        $product = Product::findOrFail($id);

        $color_en = $product->product_color_en;
        $product_color_en = explode(',',$color_en);
        $color_mm = $product->product_color_mm;
        $product_color_mm = explode(',',$color_mm);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',',$size_en);
        $size_mm = $product->product_size_mm;
        $product_size_mm = explode(',',$size_mm);

        $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
        $multiImgs = MultiImg::where('product_id',$id)->get();

        $category_id = $product->category_id;
        $relatedProducts = Product::where('category_id',$category_id)
                            ->where('id','!=',$id)
                            ->orderBy('id','DESC')->get();

        return view('frontend.product.product_details',compact('product','hot_deals','multiImgs',
                    'product_color_en','product_color_mm','product_size_en','product_size_mm',
                    'relatedProducts'));
    }
    public function TagWiseProduct($tag)
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();

        $products = Product::where('status',1)
                    ->where('product_tags_en',$tag)
                    ->where('product_tags_mm',$tag)        
                    ->orderBy('id','DESC')->paginate(3);

        //  return dd($products);
        //  die();
        
        return view('frontend.tag.product_tags_view',compact('products','categories'));
    }
    public function SubCategoryWiseProduct($slug, $subcategory_id)
    {        
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sub_category = SubCategory::where('id',$subcategory_id)->first();
       
        $products = Product::with('subcategory')->where('status',1)
                    ->where('subcategory_id',$subcategory_id)
                    ->orderBy('id','DESC')->paginate(3);
        return view('frontend.product.subcategory_view',compact('products','categories','sub_category'));
    }
    public function SubSubCategoryWiseProduct($slug, $subsubcategory_id)
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sub_sub_category = SubSubCategory::where('id',$subsubcategory_id)->first();

        $products = Product::where('status',1)
                    ->where('subsubcategory_id',$subsubcategory_id)
                    ->orderBy('id','DESC')->paginate(3);
        return view('frontend.product.subsubcategory_view',compact('products','categories','sub_sub_category'));
    }
    public function ProductViewAjax($id)
    {
        $product = Product::with('category','brand')->findOrFail($id);
        // with('category','brand') ==> pass with category and brand in Model

        $color = $product->product_color_en;
        $product_color = explode(',',$color);

        $size = $product->product_size_en;
        $product_size = explode(',',$size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));
    }
    public function Search(Request $request)
    {
        $item = $request->search;
        //echo "$item";
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $products = Product::where('product_name_en','LIKE',"%$item%")
                ->where('product_name_en','LIKE',"%$item%")->paginate(6);

        return view('frontend.product.product_search',compact('categories','products'));
    }
    public function ThankYou()
    {
        return view('frontend.thankyou');
    }
}
