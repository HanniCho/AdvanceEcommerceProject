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

class StripeController extends Controller
{
    public function StripeOrder(Request $request)
    {
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = Cart::total();
        }

        // Set your secret key. 
        \Stripe\Stripe::setApiKey('sk_test_51JRUSHH7nUi22bWLKsqQxYRzBg3OPQWa1XlE7nACElVMrCo0PPMgnEebBTy0kbc49YOjguPpWEkGJTc4Dam3p7mF00bSa5PvZU');

        // Token is created using Checkout or Elements!// Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total_amount * 100,
            'currency' => 'usd',
            'description' => 'Honey Online Shop',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
        // dd($charge);

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
            'payment_type' =>'Stripe',
            'payment_method' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,
            'invoice_no' => 'INV'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending...',
            'created_at' => Carbon::now(),

        ]);

        //For Sending Email
        $invoice = Order::findOrFail($order_id);
        $data = [
            'name' => $invoice->name,
            'email' => $invoice->email,
            'invoice_no' => $invoice->invoice_no,
            'amount' => $invoice->amount,

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
        return redirect()->to('/')->with($notification);
    }
}
