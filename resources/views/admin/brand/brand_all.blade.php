@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">            
            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">Brand Lists</h3>
                    <a href="" class="btn btn-rounded btn-primary mb-5 float-right" data-toggle="modal" data-target="#addnew">Add New</a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <td>Brand English</td>
                                        <td>Brand Myanmar</td>
                                        <td>Image</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($brands as $brand)
                                    <tr>
                                        <td>{{$brand->brand_name_en}}</td>
                                        <td>{{$brand->brand_name_mm}}</td>
                                        <td>
                                            <img src="{{ asset($brand->brand_image) }}" style="height:40px; width:70px;" alt="brand image">
                                        </td>
                                        <td width="22%">
                                            <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a href="{{route('brand.delete',$brand->id)}}" id="delete" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
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
            <!-- Add Brand -->
            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">Add Brand</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{route('brand.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>Brand Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="brand_name_en" class="form-control">
                                        @error('brand_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>  
                                
                                <div class="form-group">
                                <h5>Brand Name Myanmar <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="brand_name_mm" class="form-control">
                                        @error('brand_name_mm')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>                    
                        
                                <div class="form-group">
                                    <h5>Brand Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="brand_image" class="form-control">
                                        @error('brand_image')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New Brand">
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
<div class="modal fade" id="addnew">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Add Brand</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('category.store')}}">
                @csrf
                <div class="modal-body">
                                              
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-primary">ADD</button>
                    <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection
