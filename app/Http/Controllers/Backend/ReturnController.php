<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Carbon;

class ReturnController extends Controller
{
    public function DisplayReturnRequest()
    {
        $orders = Order::where('is_return_order',1)->orderBy('id','DESC')->get();
        return view('admin.order.return.all_returnrequests',compact('orders'));
    }
    public function ApproveReutrn($order_id)
    {
        Order::where('id',$order_id)->update([
            'is_return_order' => 2,
            'status' => 'Returned',
            'return_date' => Carbon::now()->format('d F Y'),
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Return Approved!',
            'alert-type' => 'success'
        );
        return redirect()->route('success.returnrequest')->with($notification);
    }
    public function SuccessReturnRequest()
    {
        $orders = Order::where('is_return_order',2)->orderBy('id','DESC')->get();
        return view('admin.order.return.success_returnrequests',compact('orders'));
    }
}
