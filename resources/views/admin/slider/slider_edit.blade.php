@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">Edit Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                        <form method="post" action="{{route('slider.update')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$slider->id}}"> 
                                <input type="hidden" name="old_image" value="{{$slider->slider_image}}">
                                <div class="form-group">
                                    <h5>Title <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="title" value="{{$slider->title}}" class="form-control">
                                    </div>
                                </div>  
                                
                                <div class="form-group">
                                <h5>Description <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="description" value="{{$slider->description}}" class="form-control">
                                    </div>
                                </div>                    
                        
                                <div class="form-group">
                                    <h5>Slider Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="slider_image" class="form-control">
                                        @error('slider_image')
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
@endsection
