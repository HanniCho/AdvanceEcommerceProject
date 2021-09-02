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
                            <th>Order Date</th>
                            <th>Return Status</th>
                            <th>Invoice</th>
                            <th>Payment</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->order_date}}</td>
                            <td>
                                @if ($order->is_return_order == 0)
                                <span class="badge badge-pill badge-primary" style="background: #007bff;">No Request </span> 
                                @elseif ($order->is_return_order == 1)
                                <span class="badge badge-pill badge-warning" style="background: #ffc107;">Pending </span> 
                                @elseif($order->is_return_order == 2)
                                <span class="badge badge-pill badge-success" style="background: #28a745;">Returned </span> 
                                @endif
                            </td>
                            <td>{{$order->invoice_no}}</td>
                            <td>{{$order->payment_method}}</td>
                            <td>${{$order->amount}}</td>

                            
                            <td>
                                @if ($order->is_return_order == 0)
                                <a href="{{ route('request.return',$order->id ) }}" id="return" class="btn btn-sm btn-danger" title="Return Order"><i class=""></i>Return</a>
                                @elseif ($order->is_return_order == 1)
                                <span class="badge badge-pill badge-warning" style="background: #ffc107;">Pending </span> 
                                @elseif($order->is_return_order == 2)
                                <span class="badge badge-pill badge-success" style="background: #28a745;">Returned </span> 
                                @endif
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