@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
	<section class="content">
        <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Product </h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			    <div class="row">
				    <div class="col">
                        <form method="POST" action="{{route('product.update')}}"> 
                        @csrf    
                        <input type="hidden" name="id" value="{{$product->id}}"> 
                        <div class="row">
                                <div class="col-12">	
                                    <div class="row"> <!-- start 1st row  -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Brand <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="brand_id" class="form-control"  >
                                                        <option value="" selected="" disabled="">Select Brand</option>
                                                        @foreach($brands as $brand)
                                                            <option value="{{ $brand->id }}" {{($brand->id == $product->brand_id) ? 'selected':''}}>{{ $brand->brand_name_en }}</option>	
                                                        @endforeach
                                                    </select>
                                                    @error('brand_id') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror                                            
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                                    </div> <!-- end 1st row  -->

                                    <div class="row"> <!-- start 2nd row  -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Category<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control"  >
                                                        <option value="" selected="" disabled="">Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" {{($category->id == $product->category_id) ? 'selected':''}}>{{ $category->category_name_en }}</option>	
                                                        @endforeach
                                                    </select>
                                                    @error('category_id') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror 
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>SubCategory <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subcategory_id" class="form-control"  >
                                                        <option value="" selected="" disabled="">Select SubCategory</option>
                                                        @foreach($subcategories as $subcategory)
                                                            <option value="{{ $subcategory->id }}" {{($subcategory->id == $product->subcategory_id) ? 'selected':''}}>{{ $subcategory->subcategory_name_en }}</option>	
                                                        @endforeach
                                                    </select>
                                                    @error('subcategory_id') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror 
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>SubSubCategory <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subsubcategory_id" class="form-control"  >
                                                        <option value="" selected="" disabled="">Select SubSubCategory</option>
                                                        @foreach($subsubcategories as $subsubcategory)
                                                            <option value="{{ $subsubcategory->id }}" {{($subsubcategory->id == $product->subsubcategory_id) ? 'selected':''}}>{{ $subsubcategory->subsubcategory_name_en }}</option>	
                                                        @endforeach
                                                    </select>
                                                    @error('subsubcategory_id') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror 
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                                    </div> <!-- end 2nd row  -->
                                    <div class="row"> <!-- start 3rd row  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Name English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_en" value="{{$product->product_name_en}}" class="form-control"> 
                                                </div>
                                                @error('product_name_en') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Name Myanmar <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_mm" value="{{$product->product_name_mm}}" class="form-control"> 
                                                </div>
                                                @error('product_name_mm') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                    </div> <!-- end 3rd row  -->
                                    <div class="row"> <!-- start 4th row  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Code <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_code" value="{{$product->product_code}}" class="form-control"> 
                                                </div>
                                                @error('product_code') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Quantity <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_qty" value="{{$product->product_qty}}" class="form-control"> 
                                                </div>
                                                @error('product_qty') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                    </div> <!-- end 4th row  -->
                                    <div class="row"> <!-- start 5th row  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Tags English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_tags_en" value="{{$product->product_tags_en}}" data-role="tagsinput" class="form-control"> 
                                                </div>
                                                @error('product_tags_en') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Tags Myanmar <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_tags_mm" value="{{$product->product_tags_mm}}" data-role="tagsinput" class="form-control"> 
                                                </div>
                                                @error('product_tags_mm') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                    </div> <!-- end 5th row  -->
                                    <div class="row"> <!-- start 6th row  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Size English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_size_en" value="{{$product->product_size_en}}" data-role="tagsinput" class="form-control"> 
                                                </div>
                                                @error('product_size_en') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Size Myanmar <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_size_mm" value="{{$product->product_size_mm}}" data-role="tagsinput" class="form-control"> 
                                                </div>
                                                @error('product_size_mm') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                    </div> <!-- end 6th row  -->
                                    <div class="row"> <!-- start 7th row  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Color English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_color_en" value="{{$product->product_color_en}}"  class="form-control"> 
                                                </div>
                                                @error('product_color_en') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Color Myanmar <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_color_mm" value="{{$product->product_color_mm}}" class="form-control"> 
                                                </div>
                                                @error('product_color_mm') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                    </div> <!-- end 7th row  -->
                                    <div class="row"> <!-- start 8th row  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Selling Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="selling_price" value="{{$product->selling_price}}" class="form-control"> 
                                                </div>
                                                @error('selling_price') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Discount Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="discount_price" value="{{$product->discount_price}}" class="form-control"> 
                                                </div>
                                                @error('discount_price') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                    </div> <!-- end 8th row  -->
                                    <div class="row"> <!-- start 9th row  -->
                                        <div class="col-md-6">
                                            
                                        </div> <!-- end col md 6 -->
                                        <div class="col-md-6">
                                            
                                        </div> <!-- end col md 4 -->
                                    </div> <!-- end 9th row  -->
                                    <div class="row"> <!-- start 10th row  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Short Description English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_descp_en" id="textarea" class="form-control" placeholder="Textarea">
                                                    {{$product->short_descp_en}}
                                                    </textarea>
                                                </div>
                                                @error('short_descp_mm') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Short Description Myanmar <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_descp_mm" id="textarea" class="form-control" placeholder="Textare">
                                                    {{$product->short_descp_mm}}
                                                    </textarea>
                                                </div>
                                                @error('short_descp_mm') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                    </div> <!-- end 10th row  -->
                                    <div class="row"> <!-- start 10th row  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Long Description English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                     <textarea id="editor1" name="long_descp_en" rows="10" cols="80">
                                                     {!!$product->long_descp_en!!}
                                                    </textarea>                                         
                                                </div>
                                                @error('long_descp_en') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Long Description Myanmar <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor2" name="long_descp_mm" rows="10" cols="80">
                                                        {!!$product->long_descp_mm!!}
                                                    </textarea>
                                                </div>
                                                @error('long_descp_mm') 
                                                    <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                    </div> <!-- end 10th row  -->                                 
                                </div>
                            </div>
                            <hr>
                            <div class="row">                                
                                <div class="col-md-6">
                                    <div class="form-group"><div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{$product->hot_deals ==1 ? 'checked':''}}>
                                                <label for="checkbox_2">Hot Deals</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_3" name="featured" value="1" {{$product->featured ==1 ? 'checked':''}}>
                                                <label for="checkbox_3">Featured</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{$product->special_offer ==1 ? 'checked':''}}>
                                                <label for="checkbox_4">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{$product->special_deals ==1 ? 'checked':''}}>
                                                <label for="checkbox_5">Special Deals</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
                            </div>
                        </form>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
			</div>
			<!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
	<!-- /.content -->

    <!--Thumbnail image  update area -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Thumbnail Image <strong>Update</strong></h4>
                    </div>
                    <div class="box-body">
                        <form method="POST" action="{{route('product.update.thumbnail')}}" enctype="multipart/form-data"> 
                            @csrf 
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="old_image" value="{{$product->product_thumbnail}}">
                            <div class="row row-sm">                               
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset($product->product_thumbnail) }}"  class="card-img-top" style="height: 130px; width: 280px;">
                                        <div class="card-body">
                                            <p class="card-text"> 
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                    <input type="file" name="product_thumbnail" onChange="mainThumbUrl(this)" class="form-control" > 
                                                    <img src="" id="mainThumb">
                                                </div> 
                                            </p>
                                        </div>
                                    </div> 		
                                </div><!--  end col md 3		 -->
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Thumbnail">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--MUlti image  update area -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                    </div>

                    <div class="box-body">
                        <form method="POST" action="{{route('product.update.image')}}" enctype="multipart/form-data"> 
                            @csrf 
                            <div class="row row-sm">
                                @foreach($multiImgs as $img)
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 130px; width: 280px;">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="{{ route('product.multiimg.delete',$img->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
                                            </h5>
                                            <p class="card-text"> 
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                    <input class="form-control" type="file" name="multi_img[{{$img->id}}]">
                                                </div> 
                                            </p>
                                        </div>
                                    </div> 		
                                </div><!--  end col md 3		 -->	
                                @endforeach
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                        $('select[name="subsubcategory_id"]').html('');
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
    <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/" + subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
    </script>
    <script type="text/javascript">
        function mainThumbUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#mainThumb').attr('src',e.target.result).width(80).height(80);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <!-- For Multi Image -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data
                    
                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                                            .height(80); //create image element 
                                $('#preview_img').append(img); //append image to output element
                            };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });
                    
                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endsection 