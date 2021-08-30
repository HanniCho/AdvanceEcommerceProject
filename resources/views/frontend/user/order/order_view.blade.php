@extends('frontend.main_master')
@section('main_content')
<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.include.user_sidebar')

            <div class="col-md-8">
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr style="background:#e2e2e2">
                            <th>Date</th>
                            <th>Invoice</th>
                            <th>Payment</th>
                            <th>Total</th>
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->order_date}}</td>
                            <td>{{$order->invoice_no}}</td>
                            <td>{{$order->payment_method}}</td>
                            <td>${{$order->amount}}</td>

                            <td>
                                @if ($order->status == "Pending")
                                <span class="badge badge-pill badge-warning" style="background: #ffc107;">{{ $order->status }} </span> 
                                @elseif ($order->status == "Payment Accepted")
                                <span class="badge badge-pill badge-primary" style="background: #007bff;">{{ $order->status }} </span> 
                                @elseif($order->status == "Process Delivery")
                                <span class="badge badge-pill badge-info" style="background: #17a2b8;">{{ $order->status }} </span> 
                                @elseif($order->status == "Delivered")
                                <span class="badge badge-pill badge-success" style="background: #28a745;">{{ $order->status }} </span> 
                                @else
                                <span class="badge badge-pill badge-danger" style="background: #dc3545;">{{ $order->status }} </span> 
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('user/order_details/'.$order->id ) }}" class="btn btn-sm btn-primary" title="Order Details"><i class="fa fa-eye"></i>View</a>
                                <a href="" class="btn btn-sm btn-danger" title="Invoice"><i class="fa fa-download" style="color: white;"></i>Invoice</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div><!-- col-md-8 -->
        
        </div><!-- <end row> -->
        
    </div><!-- end container -->
</div><!-- end body-content -->
@endsection