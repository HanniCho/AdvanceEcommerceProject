<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    public function TodayOrder()
    {
        //$today = date('d F Y');
        $orders = Order::where('status','Pending')
                ->where('order_date',Carbon::now()->format('d F Y'))->orderBy('id','DESC')->get();

        return view('admin.report.today_order',compact('orders'));
    }
    public function TodayDelivery()
    {
        $orders = Order::where('status','Delivered')
                ->where('delivered_date',Carbon::now()->format('d F Y'))->orderBy('id','DESC')->get();

        return view('admin.report.today_delivery',compact('orders'));
    }
    public function ThisMonth()
    {
        $orders = Order::where('order_month',Carbon::now()->format('F'))->orderBy('id','DESC')->get();

        return view('admin.report.this_month',compact('orders'));
    }
    public function SearchReport()
    {
        return view('admin.report.search_report');
    }
    public function SearchByYear(Request $request)
    {
        $orders = Order::where('status','Delivered')
                ->where('order_year',$request->order_year)->orderBy('id','DESC')->get();

        $totalamount = Order::where('status','Delivered')
                ->where('order_year',$request->order_year)->sum('amount');

        return view('admin.report.search.search_by_year',compact('orders','totalamount'));
    }
}
