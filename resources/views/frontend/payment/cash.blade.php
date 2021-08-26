@extends('frontend.main_master')
@section('main_content')
@section('title')
Cash On Delivery Page
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>
                <li>Checkout</li>
                <li>Payment</li>
                <li class='active'>Cash On Delivery</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">

                <div class="col-md-6">                    
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Checkout Product Lists</h4>
                                </div>
                                <div class="row">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        <li>
                                            @if(Session::has('coupon'))
                                                <strong>SubTotal: </strong> ${{ $cartTotal }} <hr>
                                                <strong>Coupon Name : </strong> {{ session()->get('coupon')['coupon_name'] }}
                                                ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                                <hr>
                                                <strong>Coupon Discount : </strong> ${{ session()->get('coupon')['discount_amount'] }} 
                                                <hr>
                                                <strong>Grand Total : </strong> ${{ session()->get('coupon')['total_amount'] }} 
                                                <hr>
                                            @else
                                                <strong>SubTotal: </strong> ${{ $cartTotal }} <hr>
                                                <strong>Grand Total : </strong> ${{ $cartTotal }}</span> <hr>
                                            @endif 
                                        </li>
                                    </ul>		
                                </div>
                            </div>
                        </div>
                    </div>  <!-- checkout-progress-sidebar -->

                                       		
                </div> <!-- col-md-6 -->

                <div class="col-md-6">
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                </div>
                                <form action="{{route('cash.order')}}" method="post" id="payment-form">
                                 @csrf
                                    <div class="form-row">
                                        <img src="{{asset('frontend\assets\images\payments\cash.png')}}" alt="">
                                        <label for="card-element">
                                            <input type="hidden" name="name" value="{{$data['shipping_name']}}">
                                            <input type="hidden" name="email" value="{{$data['shipping_email']}}">
                                            <input type="hidden" name="phone" value="{{$data['shipping_phone']}}">
                                            <input type="hidden" name="post_code" value="{{$data['post_code']}}">
                                            <input type="hidden" name="division_id" value="{{$data['division_id']}}">
                                            <input type="hidden" name="district_id" value="{{$data['district_id']}}">
                                            <input type="hidden" name="state_id" value="{{$data['state_id']}}">
                                            <input type="hidden" name="notes" value="{{$data['notes']}}">
                                        </label>
                                        
                                       
                                    </div>
                                    <br>
                                    <button class="btn btn-primary">Complete Payment</button>
                                </form>
                            </div>
                        </div>
                    </div><!-- checkout-progress-sidebar -->	
                </div> <!-- col-md-6 -->

            </div><!-- /.row -->
        </div><!-- /.checkout-box -->

        <!-- ==== ================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
        <!-- ==== ================== BRANDS CAROUSEL :END ============================================== -->
    </div>
</div>

@endsection