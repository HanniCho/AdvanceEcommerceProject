@extends('frontend.main_master')
@section('main_content')
@section('title')
Paypal Payment Page
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>
                <li>Checkout</li>
                <li>Payment</li>
                <li class='active'>PayPal</li>
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
                                    <h4 class="unicase-checkout-title">Payment Method</h4>
                                </div>
                                <form action="" method="post" id="payment-form">
                                 @csrf
                                    <div class="form-row">
                                        <label for="card-element">
                                            <input type="hidden" name="name" id="name" value="{{$data['shipping_name']}}">
                                            <input type="hidden" name="email" id="email" value="{{$data['shipping_email']}}">
                                            <input type="hidden" name="phone" id="phone" value="{{$data['shipping_phone']}}">
                                            <input type="hidden" name="post_code" id="post_code" value="{{$data['post_code']}}">
                                            <input type="hidden" name="division_id" id="division_id"  value="{{$data['division_id']}}">
                                            <input type="hidden" name="district_id" id="district_id" value="{{$data['district_id']}}">
                                            <input type="hidden" name="state_id" id="state_id" value="{{$data['state_id']}}">
                                            <input type="hidden" name="notes" id="notes" value="{{$data['notes']}}">
                                        </label>
                                        
                                        <div id="paypal-button-container"></div>

                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                    </div>
                                    <br>
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
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<script src="https://www.paypal.com/sdk/js?client-id=AUzzLcrj1vBPe0ARj0KK1ERYnVx5fHBxjq1CD-t7CNPXr6ML6gr8Ddf1mvceSSfn9tMtJLuhxETV-Qbz"></script>
<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '{{ $cartTotal }}'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        //alert('Transaction completed by ' + details.payer.name.given_name);
        //console.log('Capture result', details, JSON.stringify(details, null, 2));
        var order_number = details.id;
        var transaction_id = details.purchase_units[0]['payments'].captures[0]['id'];
        var currency = details.purchase_units[0]['amount'].currency_code;     

        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var post_code = $('#post_code').val();
        var division_id = $('#division_id').val(); 
        var district_id = $('#district_id').val(); 
        var state_id = $('#state_id').val();   
        var notes = $('#notes').val();
        
        $.ajax({
            url: "/user/payment/paypal/order/",
            type:"POST",
            dataType:"json",
            data: {
                name:name,
                email:email,
                phone:phone,
                post_code:post_code,
                division_id:division_id,
                district_id:district_id,
                state_id:state_id,
                notes:notes,

                order_number:order_number,
                transaction_id:transaction_id,
                currency:currency
            },
            success:function (data) {
                window.location.href = '{{url('/thankyou')}}';
              const Toast = Swal.mixin({
                              toast: true,
                              position: 'top-end',                              
                              showConfirmButton: false,
                              timer: 3000,
                            });
              if ($.isEmptyObject(data.error)) {
                Toast.fire({
                  type:'success',
                  icon: 'success',
                  title:data.success,
                });
              } else {
                Toast.fire({
                  type:'error',
                  icon: 'error',
                  title:data.error,
                });
              }
              //End sweet alert
            },
        });
          
      });
    }
  }).render('#paypal-button-container');
</script>
@endsection