@extends('admin.admin_master')
@section('admin')
<div class="container-full">
	<section class="content">
        <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Update Admin </h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			    <div class="row">
				    <div class="col">
                        <form method="POST" action="{{route('admin.update')}}"> 
                        @csrf    
                            <input type="hidden" name="id" value="{{$admin->id}}">
                            <div class="row">
                                <div class="col-12">	
                                    <div class="row"> <!-- start 1st row  -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" value="{{$admin->name}}" class="form-control"> 
                                                </div>
                                                @error('name') 
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Email <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" value="{{$admin->email}}" class="form-control"> 
                                                </div>
                                                @error('email') 
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Phone <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="phone" value="{{$admin->phone}}" class="form-control"> 
                                                </div>
                                                @error('phone') 
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                    </div> <!-- end 1st row  -->                                   
                                                                    
                                </div>
                            </div>
                            <hr>
                            <div class="row">                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_1" name="allow_brand" value="1" {{$admin->allow_brand ==1 ? 'checked':''}}>
                                                <label for="checkbox_1">Brand</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_2" name="allow_category" value="1" {{$admin->allow_category ==1 ? 'checked':''}}>
                                                <label for="checkbox_2">Category</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_3" name="allow_product" value="1" {{$admin->allow_product ==1 ? 'checked':''}}>
                                                <label for="checkbox_3">Product</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                                <label for="checkbox_4">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                                <label for="checkbox_5">Special Deals</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Admin">
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
</div>

@endsection 