<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function PayPalOrder(Request $request)
    {
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = Cart::totalFloat();
        }
        //$data = json_decode($request->getContent(), true);

        // $this->paypalClient->setApiCredentials(config('paypal'));
        // $token = $this->paypalClient->getAccessToken();
        // $this->paypalClient->setAccessToken($token);
        // $charge = $this->paypalClient->createOrder([
        //     'amount' => $total_amount * 100,
        //     'currency' => 'USD',
        //     'description' => 'Honey Online Shop',
        //     'source' => $token,
        //     'metadata' => ['order_id' => uniqid()],
        // ]);
        
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,
            'payment_type' =>'PayPal',
            'payment_method' => 'PayPal',
            'transaction_id' =>$request->transaction_id,
            'currency' => $request->currency,
            'amount' => $total_amount,
            'order_number' => $request->order_number,
            'invoice_no' => 'INV'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now(),

        ]);

        //For Sending Email
        $invoice = Order::findOrFail($order_id);
        $data = [
            'name' => $invoice->name,
            'email' => $invoice->email,
            'invoice_no' => $invoice->invoice_no,
            'amount' => $invoice->amount,
            'payment_method' => 'PayPal',
        ];
        Mail::to($request->email)->send(new OrderMail($data));
        //End Sending Email

        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,

            ]);
        }

        if (Session::has('coupon')) {
            Session::forget('coupon');            
        }
        Cart::destroy();

        $notification = array(
            'message' => 'Your Order Place Successfully!',
            'alert-type' => 'success'
        );
        //return redirect()->to('/')->with($notification);
        return response()->json(['success' => 'Your Order Place Successfully!']);

    }
}
