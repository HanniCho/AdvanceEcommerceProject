<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Carbon;
use Auth;

class WishlistController extends Controller
{
    public function AddToWishlist(Request $request,$product_id)
    {
        //dd (Auth::id());
        if (Auth::check()) {            
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(), 
                    'product_id' => $product_id, 
                    'created_at' => Carbon::now(), 
                ]);
               return response()->json(['success' => 'Product Added on Your Wishlist']);
            }else {
                return response()->json(['error' => 'This product is already on your wishlist!']);
            }
            

        }else{

            return response()->json(['error' => 'Please Login First to Your Account!']);

        }
            
    }
    public function DisplayWishlists()
    {
        $wishlists = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        return view('frontend.wishlist.wishlist_all', compact('wishlists'));

    }
    public function GetWishlistProduct()
    {
		$wishlists = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
		return response()->json($wishlists);
    }
    public function RemoveWishlistProduct($id)
    {
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Product Remove from Wishlist']);
    }
}
