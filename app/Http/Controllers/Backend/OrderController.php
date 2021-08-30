<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth:admin');
    }
    public function DisplayPendingOrder()
    {
        $orders = Order::where('status','Pending')->orderBy('id','DESC')->get();
        // dd($orders);
        return view('admin.order.all_pendingorders',compact('orders'));
    }
    public function DisplayPaymentedOrder()
    {
        $orders = Order::where('status','Payment Accepted')->orderBy('id','DESC')->get();
        return view('admin.order.all_paymentacceptorders',compact('orders'));
    }
    public function DisplayCancelOrder()
    {
        $orders = Order::where('status','Cancel')->orderBy('id','DESC')->get();
        return view('admin.order.all_cancelorders',compact('orders'));
    }
    public function DisplayProcessDeliveryOrder()
    {
        $orders = Order::where('status','Process Delivery')->orderBy('id','DESC')->get();
        return view('admin.order.all_processdeliveryorders',compact('orders'));
    }
    public function DisplayDeliverySuccessOrder()
    {
        $orders = Order::where('status','Delivered')->orderBy('id','DESC')->get();
        return view('admin.order.all_deliveredorders',compact('orders'));
    }
    public function OrderDetails($order_id)
    {
        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderItems = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('admin.order.view_orderdetails',compact('order','orderItems'));
    }
    public function PaymentAccept($order_id)
    {
        Order::where('id',$order_id)->update([
            'status' => 'Payment Accepted',
            'confirmed_date' => Carbon::now()->format('d F Y'),
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Payment Accept Done!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.paymentedorder')->with($notification);
    }
    public function CancelOrder($order_id)
    {
        Order::where('id',$order_id)->update([
            'status' => 'Cancel',
            'cancel_date' => Carbon::now()->format('d F Y'),
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Payment Canceled!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.cancelorder')->with($notification);
    }
    public function DeliveryProcess($order_id)
    {
        Order::where('id',$order_id)->update([
            'status' => 'Process Delivery',
            'processing_date' => Carbon::now()->format('d F Y'),
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Sent to Delivery!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.process.delivery')->with($notification);
    }
    public function DeliverySuccess($order_id)
    {
        Order::where('id',$order_id)->update([
            'status' => 'Delivered',
            'delivered_date' => Carbon::now()->format('d F Y'),
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Delivery Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.success.delivery')->with($notification);
    }
    
}
