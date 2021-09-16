<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;

class CheckoutController extends Controller
{
    public function GetDistrict($division_id)
    {
        $districts = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($districts);
    }
    public function GetState($district_id)
    {
        $states = ShipState::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
        return json_encode($states);
    }
    public function CheckoutStore(Request $request)
    {
        // dd($request->all());
        $data = array();
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['notes'] = $request->notes;

        if (Session::has('coupon')) {
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();
            $cartTotal = Cart::totalFloat() - (Cart::totalFloat() * ($coupon->coupon_discount / 100));
        } else {
            $cartTotal =Cart::total();
        }

        if ($request->payment_method == "stripe") {
           return view('frontend.payment.stripe',compact('data','cartTotal'));
        }
        elseif($request->payment_method == "card"){
            return "card";
        }
        elseif($request->payment_method == "paypal"){
            return view('frontend.payment.paypal',compact('data','cartTotal'));
        }
        else {
            return view('frontend.payment.cash',compact('data','cartTotal'));
        }
        

    }
}
