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
				<div class="col-md-3 col-sm-3 sign-in">
				</div>	
				<div class="col-md-6 col-sm-6 sign-in">
					<h4 class="">Sign in</h4>
					<p class=""></p>
					
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
					
					<div class="social-sign-in outer-top-xs">						
						<a href="{{ url('auth/google') }}"class="google-sign-in"><i class="fa fa-google"></i> Sign In with Google</a>
						<a href="{{ url('auth/facebook') }}" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
					</div>
					<div class="social-sign-in outer-top-xs">						
						<a href="{{ url('auth/github') }}" class="github-sign-in"><i class="fa fa-github"></i> Sign In with GitHub</a>
						<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 sign-in">
				</div>				
				<!-- Sign-in -->
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		@include('frontend.body.brands')
		<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
	</div>
</div>
@endsection