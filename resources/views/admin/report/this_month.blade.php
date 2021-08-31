@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">            
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">This Month Report</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <td>This Month</td>
                                        <td>Transaction ID</td>
                                        <td>Invoice</td>
                                        <td>Payment Method</td>
                                        <td>Invoice Amount</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $item)
                                    <tr>
                                        <td>{{$item->order_month}}, {{$item->order_year}}</td>
                                        <td>{{$item->transaction_id}}</td>
                                        <td>{{$item->invoice_no}}</td>
                                        <td>{{$item->payment_method}}</td>
                                        <td>${{$item->amount}}</td>
                                        <td>
                                        @if ($item->status == "Pending")
                                        <span class="badge badge-pill badge-warning">{{ $item->status }} </span> 
                                        @elseif ($item->status == "Payment Accepted")
                                        <span class="badge badge-pill badge-primary">{{ $item->status }} </span> 
                                        @elseif($item->status == "Process Delivery")
                                        <span class="badge badge-pill badge-info">{{ $item->status }} </span> 
                                        @elseif($item->status == "Delivered")
                                        <span class="badge badge-pill badge-success">{{ $item->status }} </span> 
                                        @else
                                        <span class="badge badge-pill badge-danger">{{ $item->status }} </span> 
                                        @endif
                                        </td>
                                        <td>
                                            <a href="{{route('view.orderdetails',$item->id)}}" class="btn btn-info" title="View Details"><i class="fa fa-eye"></i></a>
                                        </td>
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
        <!-- /.row -->
    </section>
    <!-- /.content -->	  
</div>

@endsection