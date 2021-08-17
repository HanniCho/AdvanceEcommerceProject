<div id="brands-carousel" class="logo-slider wow fadeInUp">
  <div class="logo-slider-inner">
    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
      @php
      $brands = App\Models\Brand::orderBy('brand_name_en','ASC')->get();
      @endphp
      @foreach($brands as $brand)
      <div class="item"> <a href="#" class="image"> <img data-echo="{{asset($brand->brand_image)}}" src="{{asset($brand->brand_image)}}" style="width: 166px; height: 110px;" alt=""> </a> </div>
      @endforeach
      <!--/.item-->
    </div>
    <!-- /.owl-carousel #logo-slider --> 
  </div>
  <!-- /.logo-slider-inner -->       
</div>