@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">            
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">Import / Export</h3>
                    <a href="" class="btn btn-rounded btn-primary mb-5 float-right">Export</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <td>Name </td>
                                        <td>Card Number</td>
                                        <td>Exp Month</td>
                                        <td>Exp Year</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{$transaction->name_on_card}}</td>
                                        <td>{{$transaction->card_no}}</td>
                                        <td>{{$transaction->exp_month}}</td>
                                        <td>{{$transaction->exp_year}}</td>

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
            <div class="col-4">

                <div class="box">
                    <!-- <div class="box-header with-border">
                    </div> -->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{route('importexcel')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>Import Excel<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file"  name="import_file" class="form-control">
                                        @error('import_file')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div> 
                                
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Import">
                                </div>
                            </form>
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
