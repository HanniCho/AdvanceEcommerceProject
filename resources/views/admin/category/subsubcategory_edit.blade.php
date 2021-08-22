@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">Edit Sub->SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{route('subsubcategory.update',$subsubcategory->id)}}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $subsubcategory->id }}">	
                                <div class="form-group">
                                    <h5>Category<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{($category->id == $subsubcategory->category_id) ? 'selected' : ''}}>{{$category->category_name_en}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Sub Category<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Sub Category</option>
                                            @foreach($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}" {{($subcategory->id == $subsubcategory->subcategory_id) ? 'selected' : ''}}>{{$subcategory->subcategory_name_en}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Sub SubCategory Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="subsubcategory_name_en" value="{{$subsubcategory->subsubcategory_name_en}}" class="form-control">
                                        @error('subsubcategory_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>  
                                
                                <div class="form-group">
                                    <h5>Sub SubCategory Name Myanmar <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="subsubcategory_name_mm" value="{{$subsubcategory->subsubcategory_name_mm}}" class="form-control">
                                        @error('subsubcategory_name_mm')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div> 
                                
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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
<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
    </script>
@endsection
