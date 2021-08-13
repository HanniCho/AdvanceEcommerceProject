@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">            
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">SubCategory Lists</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <td>Category</td>
                                        <td>SubCategory English</td>
                                        <td>SubCategory Myanmar</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subcategories as $subcategory)
                                    <tr>
                                        <td>{{$subcategory['category']['category_name_en']}}</td>
                                        <td>{{$subcategory->subcategory_name_en}}</td>
                                        <td>{{$subcategory->subcategory_name_mm}}</td>
                                        
                                        <td width="22%">
                                            <a href="{{route('subcategory.edit',$subcategory->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a href="{{route('subcategory.delete',$subcategory->id)}}" id="delete" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
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
                    <h3 class="box-title">Add SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{route('subcategory.store')}}">
                                @csrf
                                <div class="form-group">
                                    <h5>Category<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name_en}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Sub Category Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="subcategory_name_en" class="form-control">
                                        @error('subcategory_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>  
                                
                                <div class="form-group">
                                    <h5>Sub Category Name Myanmar <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="subcategory_name_mm" class="form-control">
                                        @error('subcategory_name_mm')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div> 
                                
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New Sub Category">
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
