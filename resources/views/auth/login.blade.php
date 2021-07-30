@extends('frontend.main_master')
@section('main_content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class="active">Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div>
<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
				<div class="col-md-6 col-sm-6 sign-in">
					<h4 class="">Sign in</h4>
					<p class="">Hello, Welcome to your account.</p>
					<div class="social-sign-in outer-top-xs">
						<a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
						<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
					</div>
					<form method="POST" action="{{ isset($guard) ? url($guard.'/login') :  route('login') }}">
						@csrf
						<div class="form-group">
							<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
							<input type="email" name="email" id="email" class="form-control unicase-form-control text-input" >
						</div>
						<div class="form-group">
							<label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
							<input type="password" name="password" id="password" class="form-control unicase-form-control text-input" >
						</div>
						<div class="radio outer-xs">
							<label>
								<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
							</label>
							<a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
						</div>
						<div class="form-group">
								<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register')}}">
									{{ __('Create an account?') }}
								</a>
						</div>
						<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
					</form>					
				</div>
				<!-- Sign-in -->
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