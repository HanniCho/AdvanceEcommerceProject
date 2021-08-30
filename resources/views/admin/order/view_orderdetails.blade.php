@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">            
            <div class="col-6">
                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">Shipping Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <tbody>
                                    <tr>
                                        <td> Shipping Name : </td>
                                        <td> {{ $order->name }} </td>
                                    </tr>

                                    <tr>
                                        <td> Shipping Phone : </td>
                                        <td> {{ $order->phone }} </td>
                                    </tr>

                                    <tr>
                                        <td> Shipping Email : </td>
                                        <td> {{ $order->email }} </td>
                                    </tr>
                                    <tr>
                                        <td> Division : </td>
                                        <td> {{ $order->division->division_name }} </td>
                                    </tr>

                                    <tr>
                                        <td> District : </td>
                                        <td> {{ $order->district->district_name }} </td>
                                    </tr>

                                    <tr>
                                        <td> State : </td>
                                        <td>{{ $order->state->state_name }} </td>
                                    </tr>

                                    <tr>
                                        <td> Post Code : </td>
                                        <td> {{ $order->post_code }} </td>
                                    </tr>

                                    <tr>
                                        <td> Order Date : </td>
                                        <td> {{ $order->order_date }} </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->

            <div class="col-6">
                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">Order Details</h3>
                    <h4>
                     <span class="text-primary"> Invoice No: {{ $order->invoice_no }}</span>
                    </h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <tbody>
                                    <tr>
                                        <td> Order Date : </td>
                                        <td> {{ $order->order_date }} </td>
                                    </tr>
                                    @if ($order->payment_method == "Stripe")
                                    <tr>
                                        <td> Order No. : </td>
                                        <td> {{ $order->order_number }} </td>
                                    </tr>
                                    <tr>
                                        <td> Tranx ID : </td>
                                        <td> {{ $order->transaction_id }} </td>
                                    </tr>
                                    @endif                                    
                                    <tr>
                                        <td> Payment Type : </td>
                                        <td> {{ $order->payment_method }} </td>
                                    </tr>                            

                                    <tr>
                                        <td> Order Total : </td>
                                        <td><strong class="text-primary">${{ $order->amount }}</strong> </td>
                                    </tr>

                                    <tr>
                                        <td> Order : </td>                                       
                                        <td>  
                                        @if ($order->status == "Pending")
                                        <span class="badge badge-pill badge-warning">{{ $order->status }} </span> 
                                        @elseif ($order->status == "Payment Accepted")
                                        <span class="badge badge-pill badge-primary">{{ $order->status }} </span> 
                                        @elseif($order->status == "Process Delivery")
                                        <span class="badge badge-pill badge-info">{{ $order->status }} </span> 
                                        @elseif($order->status == "Delivered")
                                        <span class="badge badge-pill badge-success">{{ $order->status }} </span> 
                                        @else
                                        <span class="badge badge-pill badge-danger">{{ $order->status }} </span> 
                                        @endif 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
            
        </div>
        <!-- /.row -->
        <div class="row">            
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">Product Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <td>Image</td>
                                        <td>Product Name</td>
                                        <td>Product Code</td>
                                        <td>Color</td>
                                        <td>Size</td>
                                        <td>Qty</td>
                                        <td>Price</td>
                                        <td>Total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orderItems as $item)
                                    <tr>
                                        <td>
                                            <label for=""><img src="{{ asset($item->product->product_thumbnail) }}" height="50px;" width="50px;"> </label>
                                        </td>
                                        <td>{{ $item->product->product_name_en }}</td>
                                        <td>{{ $item->product->product_code }}</td>
                                        <td>{{ $item->color }}</td>
                                        <td>{{ $item->size }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>${{ $item->price }}</td>
                                        <td>${{$item->qty * $item->price}}</td>
                                       
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->            
        </div>

        <div class="row">            
            <div class="col-12" >
                @if ($order->status == "Pending")
                <a href="{{route('payment.accept',$order->id)}}" class="btn btn-primary ">Payment Accept</a>
                <a href="{{route('cancel.order',$order->id)}}" class="btn btn-danger float-right">Cancel Order</a> 
                @elseif ($order->status == "Payment Accepted")
                <a href="{{route('process.delivery',$order->id)}}" class="btn btn-info ">Process Delivery</a>
                @elseif ($order->status == "Process Delivery")
                <a href="{{route('success.delivery',$order->id)}}" class="btn btn-success ">Delivery Done</a>
                @elseif ($order->status == "Cancel")
                <h3><strong class="text-danger text-center">This product was canceled.</strong></h3>
                @else
                <h3><strong class="text-success text-center">This product is successfully delivered.</strong></h3>
                @endif
                                   
            </div>
            <!-- /.col -->            
        </div>
        
    </section>
    <!-- /.content -->	  
</div>


@endsection
