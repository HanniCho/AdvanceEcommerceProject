@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">            
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">Category Lists</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <td>Category Icon</td>
                                        <td>Category English</td>
                                        <td>Category Myanmar</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td><span><i class="{{$category->category_icon}}"></i></span> </td>
                                        <td>{{$category->category_name_en}}</td>
                                        <td>{{$category->category_name_mm}}</td>
                                        
                                        <td width="22%">
                                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a href="{{route('category.delete',$category->id)}}" id="delete" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
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
                    <h3 class="box-title">Add Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{route('category.store')}}">
                                @csrf
                                <div class="form-group">
                                    <h5>Category Icon <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="category_icon" class="form-control">
                                        @error('category_icon')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <h5>Category Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="category_name_en" class="form-control">
                                        @error('category_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>  
                                
                                <div class="form-group">
                                    <h5>Category Name Myanmar <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="category_name_mm" class="form-control">
                                        @error('category_name_mm')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div> 
                                
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New Category">
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
