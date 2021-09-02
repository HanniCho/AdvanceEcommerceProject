@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">            
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">Return Order Requests</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <td>Delivered Date</td>
                                        <td>Transaction ID</td>
                                        <td>Invoice</td>
                                        <td>Payment Method</td>
                                        <td>Invoice Amount</td>
                                        <td>Return Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $item)
                                    <tr>
                                        <td>{{$item->delivered_date}}</td>
                                        <td>{{$item->transaction_id}}</td>
                                        <td>{{$item->invoice_no}}</td>
                                        <td>{{$item->payment_method}}</td>
                                        <td>${{$item->amount}}</td>
                                        <td>
                                            @if ($item->is_return_order == 1)
                                            <span class="badge badge-pill badge-warning" style="background: #ffc107;">Pending </span> 
                                            @elseif($item->is_return_order == 2)
                                            <span class="badge badge-pill badge-success" style="background: #28a745;">Returned </span> 
                                            @endif                                        
                                        </td>
                                        <td>
                                            <a href="{{route('approve.return',$item->id)}}" class="btn btn-primary" title="Approve Return">Approve</a>
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