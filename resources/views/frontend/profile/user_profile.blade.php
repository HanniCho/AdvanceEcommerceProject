@extends('frontend.main_master')
@section('main_content')
<div class="body-content">
    <div class="container">
      <div class="row">
        <div class="col-md-2"><br><br>
          <img class="card-img-top" style="border-radius:50%;" src="{{(!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg')}}" alt="Profile Photo" style="width:100%;heigth=100%;"><br><br>
          <ul class="list-group list-group-flush">
            <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
            <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile</a>
            <a href="{{route('user.change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
            <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
          </ul>
        </div>
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
        </div>
      </div><!-- <end row> -->
    </div><!-- end container -->
</div><!-- end body-content -->
@endsection