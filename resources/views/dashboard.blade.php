@extends('frontend.main_master')
@section('main_content')
<div class="body-content">
    <div class="container">
      <div class="row">
        <div class="col-md-2"><br><br>
          <img class="card-img-top" style="border-radius:50%;" src="{{(!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg')}}" alt="Profile Photo" style="width:100%;heigth=100%;"><br><br>
          <ul class="list-group list-group-flush">
            <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">@if(session()->get('language') == 'myanmar') ပင်မစာမျက်နှာ @else Home @endif</a>
            <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">@if(session()->get('language') == 'myanmar') ပရိုဖိုင် @else Profile @endif</a>
            <a href="{{route('user.change.password')}}" class="btn btn-primary btn-sm btn-block">@if(session()->get('language') == 'myanmar') စကားဝှက်ပြောင်းမည် @else Change Password @endif</a>
            <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">@if(session()->get('language') == 'myanmar') အကောင့်မှထွက်မည် @else Logout @endif</a>
          </ul>
        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-6">
          <div class="card">
            <h3 class="text-center"><span class="text-danger">Hi... <strong>{{Auth::user()->name}}</strong> Welcome to Honey Online Shop</span></h3>
          </div>
        </div>
      </div><!-- <end row> -->
    </div><!-- end container -->
</div><!-- end body-content -->
@endsection