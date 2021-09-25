@extends('frontend.main_master')
@section('main_content')
@section('title')
Buy {{$product->product_name_en}} 
@endsection
<!-- ===== ======== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>
				<li><a href="#">Clothing</a></li>
				<li class='active'>@if(session()->get('language') == 'myanmar') {{$product->product_name_mm}} @else {{$product->product_name_en}} @endif</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
					<div class="home-banner outer-top-n">
						<img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image">
					</div>				
					<!-- ============================================== HOT DEALS ============================================== -->
					@include('frontend.include.hot_deals')
					<!-- ============================================== HOT DEALS: END ============================================== -->					

					<!-- ============================================== NEWSLETTER ============================================== -->
					@include('frontend.include.newsletter')
					<!-- ============================================== NEWSLETTER: END ============================================== -->

					<!-- ============================================== Testimonials============================================== -->
					@include('frontend.include.testimonials')
					<!-- ============================================== Testimonials: END ============================================== -->
				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
            	<div class="detail-block">
					<div class="row  wow fadeInUp">
                		<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    						<div class="product-item-holder size-big single-product-gallery small-gallery">
							<!-- Main thumbnail	 -->
								<div id="owl-single-product">      
									@foreach($multiImgs as $img)      
										<div class="single-product-gallery-item" id="slide{{$img->id}}">
											<a data-lightbox="image-1" data-title="Gallery" href="{{asset($img->photo_name)}}">
												<img class="img-responsive" alt="" src="{{asset($img->photo_name)}}" data-echo="{{asset($img->photo_name)}}" />
											</a>
										</div><!-- /.single-product-gallery-item -->
									@endforeach	
								</div><!-- /.single-product-slider -->

								<!-- Product MultiImage -->
								<div class="single-product-gallery-thumbs gallery-thumbs">
									<div id="owl-single-product-thumbnails">										
										@foreach($multiImgs as $img)
											<div class="item">
												<a class="horizontal-thumb active" href="#slide{{$img->id}}" data-target="#owl-single-product" data-slide="1" >
													<img class="img-responsive" width="85" alt="" src="{{asset($img->photo_name)}}" data-echo="{{asset($img->photo_name)}}" />
												</a>
											</div>
										@endforeach			
									</div><!-- /#owl-single-product-thumbnails --> 
								</div><!-- /.gallery-thumbs -->
    						</div><!-- /.single-product-gallery -->
						</div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 id="pname" class="name">@if(session()->get('language') == 'myanmar') {{$product->product_name_mm}} @else {{$product->product_name_en}} @endif</h1>
							
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-4">
										<div class="rating rateit-small"></div>
									</div>
									<div class="col-sm-4">
										<div class="reviews">
											<a href="#" class="lnk">(13 Reviews)</a>
										</div>										
									</div>
									<div class="col-sm-4 float-right">
										<!-- Go to www.addthis.com/dashboard to customize your tools -->
										<div class="addthis_inline_share_toolbox_fcj1"></div>
									</div>
									
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											@if($product->product_qty > 0)
												<span class=" value badge badge-pill badge-success" style="background:green; color:white;">In Stock</span>
											@else
												<span class="value badge badge-pill badge-danger" style="background:red; color:white;">Out of Stock</span>
											@endif
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
								@if(session()->get('language') == 'myanmar') {{$product->short_descp_mm}} @else {{$product->short_descp_en}} @endif							
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">	
									<div class="col-sm-6">
										<div class="price-box">
											@if($product->discount_price == NULL)
											<span class="price">${{$product->selling_price}}</span>
											@else
											<span class="price">${{$product->discount_price}}</span>
											<span class="price-strike">${{$product->selling_price}}</span>
											@endif
											
										</div>
									</div>
									<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<button type="button" class="btn btn-primary icon" title="Wishlist" 
											id="{{$product->id}}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
											
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
											   <i class="fa fa-signal"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
											    <i class="fa fa-envelope"></i>
											</a>
										</div>
									</div>
								</div><!-- /.row -->
								<!-- Product Color and Size -->
								<div class="row">	
									<div class="col-sm-6">
										<div class="form-group">
											@if ($product->product_color_en == NULL)
											@else
												<label class="info-title control-label">@if(session()->get('language') == 'myanmar') အရောင် @else Color @endif <span></span></label>
												@if(session()->get('language') == 'myanmar') 
												<select id="color" class="form-control unicase-form-control selectpicker" style="display: none;">
													
													@foreach($product_color_mm as $color)
														<option value="{{ $color }}">{{ $color}}</option>	
													@endforeach
												</select>
												@else 
												<select id="color" class="form-control unicase-form-control selectpicker" style="display: none;">
													
													@foreach($product_color_en as $color)
														<option value="{{ $color }}">{{ ucwords($color)}}</option>	
													@endforeach
												</select>
												@endif
											@endif			
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											@if ($product->product_size_en == NULL)
											@else
												<label class="info-title control-label">@if(session()->get('language') == 'myanmar') ဆိုဒ် @else Size @endif <span></span></label>
												@if(session()->get('language') == 'myanmar') 
												<select id="size" class="form-control unicase-form-control selectpicker" style="display: none;">
													
													@foreach($product_size_mm as $size)
														<option value="{{ $size }}">{{ $size }}</option>	
													@endforeach
												</select>
												@else 
												<select id="size" class="form-control unicase-form-control selectpicker" style="display: none;">
													
													@foreach($product_size_en as $size)
														<option value="{{ $size }}">{{ ucwords($size) }}</option>	
													@endforeach
												</select>
												@endif	
											@endif
																					
										</div>
									</div>
								</div><!-- /.row -->
								<!-- Product Color and Size :END -->
							</div><!-- /.price-container -->

							<div class="quantity-container info-container">
								<div class="row">									
									<div class="col-sm-2">
										<span class="label">@if(session()->get('language') == 'myanmar') အရေအတွက် @else Qty : @endif</span>
									</div>									
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								                <!-- <div class="arrows">
								                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
								                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								                </div> -->
								                <input type="number" id="qty" value="1" min="1">
							              </div>
							            </div>
									</div>

									<div class="col-sm-7">
										<input type="hidden" id="product_id" value="{{$product->id}}" min="1">
										<button type="submit" class="btn btn-primary mb-2" onclick="addToCart()"><i class="fa fa-shopping-cart inner-right-vs"></i>ADD TO CART</button>
									</div>
									
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
            </div>
				
			<div class="product-tabs inner-bottom-xs  wow fadeInUp">
				<div class="row">
					<div class="col-sm-3">
						<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
							<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
							<li><a data-toggle="tab" href="#review">REVIEW</a></li>
							<li><a data-toggle="tab" href="#tags">TAGS</a></li>
						</ul><!-- /.nav-tabs #product-tabs -->
					</div>
					<div class="col-sm-9">

						<div class="tab-content">
							
							<div id="description" class="tab-pane in active">
								<div class="product-tab">
									<p class="text">@if(session()->get('language') == 'myanmar') {!!$product->long_descp_mm!!} @else {!!$product->long_descp_en!!} @endif </p>
								</div>	
							</div><!-- /.tab-pane -->

							<div id="review" class="tab-pane">
								
								<div class="fb-comments" data-href="{{Request::url()}}" data-width="" data-numposts="5"></div>								
						
							</div><!-- /.tab-pane -->

							<div id="tags" class="tab-pane">
								<div class="product-tag">
									
									<h4 class="title">Product Tags</h4>
									<form role="form" class="form-inline form-cnt">
										<div class="form-container">
								
											<div class="form-group">
												<label for="exampleInputTag">Add Your Tags: </label>
												<input type="email" id="exampleInputTag" class="form-control txt">
												

											</div>

											<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
										</div><!-- /.form-container -->
									</form><!-- /.form-cnt -->

									<form role="form" class="form-inline form-cnt">
										<div class="form-group">
											<label>&nbsp;</label>
											<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
										</div>
									</form><!-- /.form-cnt -->

								</div><!-- /.product-tab -->
							</div><!-- /.tab-pane -->

						</div><!-- /.tab-content -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.product-tabs -->

			<!-- ============================================== RELATED PRODUCTS ============================================== -->
			<section class="section featured-product wow fadeInUp">
				<h3 class="section-title">related products</h3>
				<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
					@foreach($relatedProducts as $product)
					<div class="item item-carousel">
						<div class="products">							
							<div class="product">		
								<div class="product-image">
									<div class="image">
										<a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a>
									</div><!-- /.image -->
									@php
									$discount = (($product->selling_price - $product->discount_price)/$product->selling_price)*100;
									@endphp              
									<div>
										@if($product->discount_price == NULL)
										<div class="tag new"><span>new</span></div>
										@else
										<div class="tag hot">
											<span>{{round($discount)}}%</span>
										</div>                            
										@endif
									</div>             		   
								</div><!-- /.product-image -->									
					
								<div class="product-info text-left">
									<h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">@if(session()->get('language') == 'myanmar') {{$product->product_name_mm}} @else {{$product->product_name_en}} @endif</a></h3>
									<div class="rating rateit-small"></div>
									<div class="description"></div>
									@if($product->discount_price == NULL)
									<div class="product-price"> <span class="price"> ${{$product->selling_price}} </span></div>
									@else
									<div class="product-price"> <span class="price"> ${{$product->discount_price}} </span> <span class="price-before-discount">${{$product->selling_price}}</span> </div>
									@endif
									<!-- /.product-price --> 		
								</div><!-- /.product-info -->
								<div class="cart clearfix animate-effect">
									<div class="action">
										<ul class="list-unstyled">
											<li class="add-cart-button btn-group">
												<button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)">
													<i class="fa fa-shopping-cart"></i>													
												</button>
												<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
																		
											</li>
										
											<button type="button" class="btn btn-primary icon" title="Wishlist" 
                            				id="{{$product->id}}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>

											<li class="lnk">
												<a class="add-to-cart" href="detail.html" title="Compare">
													<i class="fa fa-signal"></i>
												</a>
											</li>
										</ul>
									</div><!-- /.action -->
								</div><!-- /.cart -->
							</div><!-- /.product -->
				
						</div><!-- /.products -->
					</div><!-- /.item -->
					@endforeach
				</div><!-- /.home-owl-carousel -->
			</section><!-- /.section -->
			<!-- ============================================== RELATED PRODUCTS : END ============================================== -->
			
		</div><!-- /.col -->
	</div><!-- /.row -->

	<!-- ==== ================== BRANDS CAROUSEL ============================================== -->
	@include('frontend.body.brands')
	<!-- ==== ================== BRANDS CAROUSEL :END ============================================== -->
	
</div><!-- /.container -->
<div id="fb-root"></div>

<!-- Facebook Comment -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=710873542424290&autoLogAppEvents=1" nonce="tDJdxlul"></script>

<!-- Product Share:: Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6130742bda16e9d7"></script>

@endsection