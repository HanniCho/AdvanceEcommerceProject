<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Coupon;

class CartController extends Controller
{
    public function AddToCart(Request $request,$id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id, 
                'name' => $request->product_name, 
                'qty' => $request->quantity, 
                'price' => $product->selling_price, 
                'weight' => 1, 
                               
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color, 
                    'size' => $request->size, 
                ],
            ]);
            return response()->json(['success' => 'Product Added on Your Cart Successfully!']);
        } else {
            Cart::add([
                'id' => $id, 
                'name' => $request->product_name, 
                'qty' => $request->quantity, 
                'price' => $product->discount_price, 
                'weight' => 1, 
                               
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color, 
                    'size' => $request->size, 
                ],
            ]);
            return response()->json(['error' => 'Product Added on Your Cart Successfully!']);
        }
        
    }
    public function AddMiniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        
        if (Session::has('coupon')) {
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();
            $cartTotal = Cart::totalFloat() - (Cart::totalFloat() * ($coupon->coupon_discount / 100));
        } else {
            $cartTotal =Cart::total();
        }
        
        
        return response()->json([
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => ($cartTotal),
        ]);
    }
    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        if (Session::has('coupon')) {
            Session::forget('coupon');
        } 
    	return response()->json(['success' => 'Product Remove from Cart']);
    }
    public function CouponApply(Request $request)
    {
        $coupon = Coupon::where('coupon_name',$request->coupon_name)
                        ->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,

                'discount_amount' => Cart::totalFloat() * ($coupon->coupon_discount / 100),
                'total_amount' => Cart::totalFloat() - (Cart::totalFloat() * ($coupon->coupon_discount / 100)),
            ]);
            return response()->json(array(
                'success'=>'Coupon Applied Successfully!'
            ));
        }else {
            return response()->json(['error' => 'Invalid Coupon!']);
        }
    }
    public function CouponCalculation()
    {
        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],

            ));
        } else {
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }
        
    }
    public function CouponRemove()
    {
        Session::forget('coupon');
        return response()->json(['success'=>'Coupon Removed!']);
    }
}
