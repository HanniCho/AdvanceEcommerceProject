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
            <h3 class="text-center"><span class="text-danger">Hi... <strong>{{Auth::user()->name}}</strong> Welcome to Honey Online Shop</span></h3>
          </div>
        </div>
      </div><!-- <end row> -->
    </div><!-- end container -->
</div><!-- end body-content -->
@endsection