@extends('frontend.main_master')
@section('main_content')

<div class="body-content">
    <div class="container">
      <div class="row">
        @include('frontend.include.user_sidebar')
        <div class="col-md-2">
        </div>

        <div class="col-md-6">
          <div class="card">
            <h3 class="text-center"><span class="text-danger"><strong>Change Password</strong></span></h3>
            <div class="card-body">
                <form method="POST" action="{{route('update.change.password')}}">
                    @csrf
                    <div class="form-group">
                      <label class="info-title" for="exampleInputEmail1">Current Password<span>*</span></label>
                      <input type="password" id="current_password" name="oldpassword" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label class="info-title" for="exampleInputEmail1">New Password<span>*</span></label>
                      <input type="password" id="password" name="password" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label class="info-title" for="exampleInputEmail1">Confirm Password<span>*</span></label>
                      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="">
                    </div>
                    
                    <button type="submit" class="btn-upper btn btn-danger checkout-page-button">Update</button>

                </form>
            </div>  
        </div>
      </div><!-- <end row> -->
    </div><!-- end container -->
</div><!-- end body-content -->
@endsection