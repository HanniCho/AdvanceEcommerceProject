@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">            
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">Admin Lists</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Phone</td>  
                                        <td>Access</td>                                      
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($admins as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>
                                            @if($item->allow_brand == 1)
                                            <span class="badge btn-primary">Brand</span>
                                            @endif 

                                            @if($item->allow_category == 1)
                                            <span class="badge btn-warning">Category</span>
                                            @endif
                                            
                                            @if($item->allow_product == 1)
                                            <span class="badge btn-danger">Product</span>
                                            @endif

                                        </td>
                                        
                                        <td width="15%">
                                            <a href="{{route('admin.edit',$item->id)}}" class="btn btn-info " title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a href="{{route('admin.delete',$item->id)}}" id="delete" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
                                            
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
