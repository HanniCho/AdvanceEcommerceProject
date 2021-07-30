@extends('frontend.main_master')
@section('main_content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class="active">Register</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div>
<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- create a new account -->
				<div class="col-md-6 col-sm-6 create-new-account">
					<h4 class="checkout-subtitle">Create a new account</h4>
					<p class="text title-tag-line">Create your new account.</p>
					<form method="POST" action="{{ route('register') }}">
						@csrf
						<div class="form-group">
							<label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
							<input type="text" id="name" name="name" class="form-control unicase-form-control text-input" >
							@error('name')
							<span class="invalid-feedback" role="alert"> 
								<strong>{{$message}}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
							<input type="email" name="email"  name="email" class="form-control unicase-form-control text-input" >
							@error('email')
							<span class="invalid-feedback" role="alert"> 
								<strong>{{$message}}</strong>
							</span>
							@enderror
						</div>        
						<div class="form-group">
							<label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
							<input type="text" id="phone" name="phone" class="form-control unicase-form-control text-input">
							@error('phone')
							<span class="invalid-feedback" role="alert"> 
								<strong>{{$message}}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
							<input type="password" id="password" name="password" class="form-control unicase-form-control text-input">
							@error('password')
							<span class="invalid-feedback" role="alert"> 
								<strong>{{$message}}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
							<input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input">
							@error('password_confirmation')
							<span class="invalid-feedback" role="alert"> 
								<strong>{{$message}}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
								<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
									{{ __('Already registered?') }}
								</a>
						</div>
						<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Register</button>
					</form>
					
					
				</div>	
				<!-- create a new account -->
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		<div id="brands-carousel" class="logo-slider wow fadeInUp">

				<div class="logo-slider-inner">	
					<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
						<div class="item m-t-15">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
							</a>	
						</div><!--/.item-->

						<div class="item m-t-10">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
							</a>	
						</div><!--/.item-->

						<div class="item">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
							</a>	
						</div><!--/.item-->

						<div class="item">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
							</a>	
						</div><!--/.item-->

						<div class="item">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
							</a>	
						</div><!--/.item-->

						<div class="item">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
							</a>	
						</div><!--/.item-->

						<div class="item">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
							</a>	
						</div><!--/.item-->

						<div class="item">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
							</a>	
						</div><!--/.item-->

						<div class="item">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
							</a>	
						</div><!--/.item-->

						<div class="item">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
							</a>	
						</div><!--/.item-->
					</div><!-- /.owl-carousel #logo-slider -->
				</div><!-- /.logo-slider-inner -->
				@include('frontend.body.brands');
		</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
	</div>
</div>
@endsection