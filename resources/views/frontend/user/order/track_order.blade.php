@extends('frontend.main_master')
@section('main_content')
@section('title')
Tracking Order
@endsection
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class='active'>Track Your Order</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
	<div class="container">
		<div class="track-order-page">
			<div class="row">
				<div class="col-md-12">
                    <h2 class="heading-title">Track your Order</h2>
                    <form method="post" action="{{route('order.tracking')}}" class="register-form outer-top-xs" role="form">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleOrderId1">Order ID</label>
                            <input type="text" name="order_number" class="form-control unicase-form-control text-input" id="exampleOrderId1">
                            @error ('order_number')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <input type="submit" class="btn-upper btn btn-primary checkout-page-button" value="Track">
                    </form>	
                </div>			
            </div><!-- /.row -->
		</div><!-- track-order-page-->
    
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div>
</div>
@endsection