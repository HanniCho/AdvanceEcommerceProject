<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
    <div class="more-info-tab clearfix ">
        <h3 class="new-product-title pull-left">New Arrivals</h3>
        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">@if(session()->get('language') == 'myanmar') အားလုံး @else All @endif</a></li>
            @foreach($categories as $category)
            <li><a data-transition-type="backSlide" href="#category{{$category->id}}" data-toggle="tab">@if(session()->get('language') == 'myanmar') {{$category->category_name_mm}} @else {{$category->category_name_en}} @endif</a></li>
            @endforeach
        </ul>
        <!-- /.nav-tabs --> 
    </div>
    <div class="tab-content outer-top-xs">
        <div class="tab-pane in active" id="all">
            <div class="product-slider">
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                @foreach($products as $product)
                <div class="item item-carousel">
                <div class="products">
                    <div class="product">
                    <div class="product-image">
                        <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                        <!-- /.image -->
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
                    </div>
                    <!-- /.product-image -->
                    
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
                        
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                        <div class="action">
                        <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" type="button" title="Add Cart" 
                                data-toggle="modal" data-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                            </li>
                        
                            <button type="button" class="btn btn-primary icon" title="Wishlist" 
                            id="{{$product->id}}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
                            
                            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                        </ul>
                        </div>
                        <!-- /.action --> 
                    </div>
                    <!-- /.cart --> 
                    </div>
                    <!-- /.product --> 
                    
                </div>
                <!-- /.products --> 
                </div>
                <!-- /.item -->  
                @endforeach                    
            </div>
            <!-- /.home-owl-carousel --> 
            </div>
            <!-- /.product-slider --> 
        </div>
        <!-- /.tab-pane -->

        @foreach($categories as $category)
        <div class="tab-pane" id="category{{$category->id}}">
            <div class="product-slider">
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
            @php
            $catwiseProduct = App\Models\Product::where('category_id',$category->id)->orderBy('id','ASC')->get();                
            @endphp  
            @foreach($catwiseProduct as $product)
                <div class="item item-carousel">
                <div class="products">
                    <div class="product">
                    <div class="product-image">
                        <div class="image"> <a href="{{url('product/details/',$product->id)}}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                        <!-- /.image -->   
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
                    </div>
                    <!-- /.product-image -->
                    
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
                        
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                        <div class="action">
                        <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" type="button" title="Add Cart" 
                                data-toggle="modal" data-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                            </li>
                            
                            <button type="button" class="btn btn-primary icon" title="Wishlist" 
                            id="{{$product->id}}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>

                            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                        </ul>
                        </div>
                        <!-- /.action --> 
                    </div>
                    <!-- /.cart --> 
                    </div>
                    <!-- /.product --> 
                    
                </div>
                <!-- /.products --> 
                </div>
                <!-- /.item -->  
                @endforeach                    
            </div>
            <!-- /.home-owl-carousel --> 
            </div>
            <!-- /.product-slider --> 
        </div>
        <!-- /.tab-pane -->
        @endforeach

    </div>
    <!-- /.tab-content --> 
</div>
<!-- /.scroll-tabs --> 