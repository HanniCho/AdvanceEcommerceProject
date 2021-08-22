<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function ManageCoupon()
    {
        $coupons = Coupon::orderBy('id','DESC')->get();
        return view('admin.coupon.coupon_all',compact('coupons'));
    }
    public function CouponStore(Request $request)
    {
        $request->validate([
            'coupon_name'=> 'required',
            'coupon_discount'=> 'required',
            'coupon_validity'=> 'required',
        ],[
            'coupon_name.required'=> 'Please input Coupon Name',
            'coupon_discount.required'=> 'Please input Coupon Discount',
            'coupon_validity.required'=> 'Please input Coupon Validity',
        ]);

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount'=> $request->coupon_discount,
            'coupon_validity'=> $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'Coupon Inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function CouponEdit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.coupon_edit',compact('coupon'));
    }
    public function CouponUpdate(Request $request)
    {
        $coupon_id = $request->id;
        
        Coupon::findOrFail($coupon_id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount'=> $request->coupon_discount,
            'coupon_validity'=> $request->coupon_validity,
            'updated_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'Coupon Updated Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('manage.coupon')->with($notification);            
       
    }
    public function CouponDelete($id)
    {
        Coupon::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Coupon Deleted Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
