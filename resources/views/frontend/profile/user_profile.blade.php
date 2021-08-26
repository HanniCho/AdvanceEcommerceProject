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
            <h3 class="text-center"><span class="text-danger">Hi... <strong>{{Auth::user()->name}}</strong> Update Your Profile</span></h3>
            <div class="card-body">
                <form method="POST" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label class="info-title" for="exampleInputEmail1">Name<span></span></label>
                      <input type="name" name="name" id="name" class="form-control" value="{{ $user->name}}">
                    </div>
                    <div class="form-group">
                      <label class="info-title" for="exampleInputEmail1">Email<span></span></label>
                      <input type="email" name="email" id="email" class="form-control" value="{{ $user->email}}">
                    </div>
                    <div class="form-group">
                      <label class="info-title" for="exampleInputEmail1">Phone<span></span></label>
                      <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone}}">
                    </div>
                    <div class="form-group">
                      <label class="info-title" for="exampleInputEmail1">User Profile<span></span></label>
                      <input type="file" name="profile_photo_path" id="profile_photo_path" class="form-control">
                    </div>
                    <button type="submit" class="btn-upper btn btn-danger checkout-page-button">Update</button>

                </form>
            </div>  
        </div>
      </div><!-- <end row> -->
    </div><!-- end container -->
</div><!-- end body-content -->
@endsection