@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
	<section class="content">
        <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Site Setting </h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			    <div class="row">
				    <div class="col">
                        <form method="POST" action="{{route('site.setting.update')}}" enctype="multipart/form-data"> 
                        @csrf    
                            <input type="hidden" name="id" value="{{$setting->id}}">
                            <input type="hidden" name="old_image" value="{{$setting->site_logo}}">
                            <div class="row">
                                <div class="col-12">	
                                    <div class="row"> <!-- start 1st row  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Site Logo<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="site_logo" onChange="mainThumbUrl(this)" class="form-control">
                                                    @error('site_logo')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <img id="mainThumb" src="" alt="" style="width:400px; height:200px;" >
                                            </div>
                                        </div> <!-- end col md 4 --> 
                                    </div> <!-- end 1st row  -->                                   
                                                                    
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-12">	
                                    <div class="row"> <!-- start 1st row  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Site Name <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="site_name" value="{{$setting->site_name}}" class="form-control"> 
                                                </div>
                                                @error('site_name') 
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> <!-- end col md 4 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Email <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" value="{{$setting->email}}" class="form-control"> 
                                                </div>
                                                @error('email') 
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> <!-- end col md 4 --> 
                                    </div> <!-- end 1st row  -->                                   
                                                                    
                                </div>
                            </div>                            
                            <div class="row">                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Mobile <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text" name="mobile" value="{{$setting->mobile}}" class="form-control"> 
                                        </div>
                                        @error('mobile') 
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                        <h5>Phone <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text" name="phone" value="{{$setting->phone}}" class="form-control"> 
                                        </div>
                                        @error('phone') 
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Facebook <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text" name="facebook" value="{{$setting->facebook}}" class="form-control"> 
                                        </div>
                                        @error('facebook') 
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                        <h5>YouTube <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text" name="youtube" value="{{$setting->youtube}}" class="form-control"> 
                                        </div>
                                        @error('youtube') 
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>LinkedIn <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text" name="linkedin" value="{{$setting->linkedin}}" class="form-control"> 
                                        </div>
                                        @error('linkedin') 
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                        <h5>Twitter <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text" name="twitter" value="{{$setting->twitter}}" class="form-control"> 
                                        </div>
                                        @error('twitter') 
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Instagram <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text" name="instagram" value="{{$setting->instagram}}" class="form-control"> 
                                        </div>
                                        @error('instagram') 
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <hr>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Setting">
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
@endsection 