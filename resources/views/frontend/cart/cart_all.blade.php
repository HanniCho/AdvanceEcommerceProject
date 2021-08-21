@extends('frontend.main_master')
@section('main_content')
@section('title')
My Cart Page
@endsection
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class='active'>My Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
                <div class="shopping-cart">
				    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>                                    
                                        <th class="cart-description item">Image</th>
                                        <th class="cart-product-name item">Product Name</th>
                                        <th class="item">Color</th>
                                        <th class="item">Size</th>
                                        <th class="cart-qty item">Quantity</th>
                                        <th class="cart-sub-total item">Subtotal</th>
                                        <th class="cart-romove item">Remove</th>
                                    </tr>
                                </thead>
                                <tbody id="cartPage">
                                    
                                </tbody>
                            </table>
                        </div>   
                    </div><!-- shopping-cart-table      -->
                </div><!-- shopping-cart -->
            </div><!-- /.row -->
		</div><!-- /.sigin-in-->
        
        <!-- ==== ================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
        <!-- ==== ================== BRANDS CAROUSEL :END ============================================== -->
	</div>
</div>
@endsection