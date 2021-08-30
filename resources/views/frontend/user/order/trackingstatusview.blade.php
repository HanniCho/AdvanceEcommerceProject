@extends('frontend.main_master')
@section('main_content')
@section('title')
Tracking Status Page
@endsection
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class='active'>Tracking Result</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="box">
                    <div class="box-header with-border">
                    	<h3 class="box-title">Your Order Status</h3>                    
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
						<div class="progress">
							@if ($order->status == "Pending")
							<div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
							@elseif ($order->status == "Payment Accepted")
							<div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
							<div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
							@elseif($order->status == "Process Delivery")
							<div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
							<div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
							<div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
							@elseif($order->status == "Delivered")
							<div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
							<div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
							<div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
							<div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
							@else						
							<div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
							@endif
						</div><br>
						@if ($order->status == "Pending")
						<h5>Note: <strong class="text-warning">Your Order is Under Reivew</strong></h5>						
						@elseif ($order->status == "Payment Accepted")
						<h5>Note: <strong class="text-primary">Payment Accepted Under Process!</strong></h5>
						@elseif($order->status == "Process Delivery")
						<h5>Note: <strong class="text-info">Packing Done and Sent to Delivery!</strong></h5>
						@elseif($order->status == "Delivered")
						<h5>Note: <strong class="text-success">Your Order is Delilvered!</strong></h5>
						@else						
						<h5>Note: <strong class="text-danger">Order Canceled!</strong></h5>						
						@endif
					</div><!-- box-body -->
				</div><!-- box --> 
			</div><!-- col-md-6 -->
			<div class="col-md-6">
				<div class="box">
                    <div class="box-header with-border">
                    	<h3 class="box-title">Your Order Details</h3>                    
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
						<ul class="list-group">
							<li class="list-group-item">Invoice : {{$order->invoice_no}}</li>
							<li class="list-group-item">Shipping Name : {{$order->name}}</li>
							<li class="list-group-item">Shipping Email : {{$order->email}}</li>
							<li class="list-group-item">Shipping Phone : {{$order->phone}}</li>
							<li class="list-group-item">Order Date : {{$order->order_date}}</li>
							<li class="list-group-item">Payment Type: {{$order->payment_method}}</li>
							<li class="list-group-item">Tranx ID : {{$order->transaction_id}}</li>
							<li class="list-group-item">Order Total : ${{$order->amount}}</li>
						</ul>
					</div><!-- box-body -->
				</div><!-- box -->
			</div><!-- col-md-6 -->
			
		</div><!-- /.row -->
		
    
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div>
</div>
@endsection