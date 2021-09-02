<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Carbon;
use Auth;

class AllUserController extends Controller
{
    public function MyOrders()
    {
        $user = User::find(Auth::user()->id);
        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_view',compact('orders','user'));
    }
    public function OrderDetails($order_id)
    {
        $user = User::find(Auth::user()->id);
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItems = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_details',compact('order','orderItems','user'));

    }
    public function TrackOrderView()
    {
        return view('frontend.user.order.track_order');
    }
    public function OrderTracking(Request $request)
    {
        $request->validate([
            'order_number' => 'required',
        ],[
            'order_number.required' => 'Please input your order ID!',
        ]);

        $order = Order::where('order_number',$request->order_number)->first();
        
        if ($order) {            
        //    dd($trackorder);
            return view('frontend.user.order.trackingstatusview', compact('order'));
        } else {
           
            $notification = array(
                'message' => 'Invalid Order ID!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        
    }
    public function DeliveredOrderList()
    {
        $user = User::find(Auth::user()->id);

        $orders = Order::where('user_id',Auth::id())->where('status','Delivered')
                        ->orderBy('id','DESC')->limit(5)->get();
        return view('frontend.user.returnorder.return_order',compact('orders','user'));
    }
    public function RequestReturn($order_id)
    {
        Order::where('id',$order_id)->update([
            'is_return_order' => 1,            
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Return Order Requested!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
