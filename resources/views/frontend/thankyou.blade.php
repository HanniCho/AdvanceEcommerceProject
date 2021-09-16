@extends('frontend.main_master')
@section('main_content')
@section('title')
Thank You
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>                
                <li class='active'>Thank You</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
                
				<div class="col-md-12 my-wishlist text-center">
                    <div class="table-responsive">
                        <h2 class="unicase-checkout-title">Thank you for Your Order!</h2>
                        <span>A confirmation email was sent.</span><br><br><br>
                        <a href="{{url('/')}}" class="btn btn-primary checkout-page-button">Continue Shopping</a>
                    </div>            
                </div>	
               
            </div><!-- /.row -->
		</div><!-- /.sigin-in-->
        
        <!-- ==== ================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
        <!-- ==== ================== BRANDS CAROUSEL :END ============================================== -->
	</div>
</div>

@endsection