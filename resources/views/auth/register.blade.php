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
				<div class="col-md-3 col-sm-3 create-new-account">
				</div>
				<div class="col-md-6 col-sm-6 create-new-account">
					<h4 class="checkout-subtitle">Create a new account</h4>
					<p class="text title-tag-line"></p>
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
								<a class="pull-right underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
									{{ __('Already registered?') }}
								</a>
						</div>
						<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Register</button>
					</form>
					
					
				</div>	
				<div class="col-md-3 col-sm-3 create-new-account">
				</div>
				<!-- create a new account -->
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		@include('frontend.body.brands')
		<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
	</div>
</div>
@endsection