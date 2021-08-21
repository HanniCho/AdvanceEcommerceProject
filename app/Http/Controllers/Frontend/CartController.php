<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function AddToCart(Request $request,$id)
    {
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
        $cartTotal =Cart::total();
        return response()->json([
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => ($cartTotal),
        ]);
    }
    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
    	return response()->json(['success' => 'Product Remove from Cart']);
    }
}
