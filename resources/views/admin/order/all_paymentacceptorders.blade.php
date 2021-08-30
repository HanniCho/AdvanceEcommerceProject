@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">            
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">Payment Accepted Order Lists</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <td>Order Date</td>
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
                                        <td>{{$item->order_date}}</td>
                                        <td>{{$item->transaction_id}}</td>
                                        <td>{{$item->invoice_no}}</td>
                                        <td>{{$item->payment_method}}</td>
                                        <td>${{$item->amount}}</td>
                                        <td>
                                            <span class="badge badge-pill badge-primary">{{ $item->status }} </span>
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