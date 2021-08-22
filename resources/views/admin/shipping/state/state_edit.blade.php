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
                    <h3 class="box-title">Add State</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{route('state.update')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$state->id}}">
                                <div class="form-group">
                                    <h5>Division Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="division_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Division</option>
                                            @foreach($divisions as $division)
                                            <option value="{{$division->id}}" {{($division->id == $state->division_id) ? 'selected':''}}>{{$division->division_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('division_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>District Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="district_id" class="form-control">
                                            <option value="" selected="" disabled="">Select District</option>
                                            @foreach($districts as $district)
                                            <option value="{{$district->id}}" {{($district->id == $state->district_id) ? 'selected':''}}>{{$district->district_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('district_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>State Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="state_name" value="{{$state->state_name}}" class="form-control">
                                        @error('state_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div> 
                                
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update State">
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
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{  url('/shipping/district/ajax') }}/" + division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="district_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
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
