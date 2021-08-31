@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		  <div class="user-profile">
			  <div class="ulogo">
				  <a href="{{url('admin/dashboard')}}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('backend/images/honey-logo.png')}}" style="width:60px; height:60px;" alt="Logo">
						  <h3><i><b>H</b>oney <b>S</b>hop</i></h3>
					 </div>
				  </a>
			  </div>
      </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  		  
		    <li class="{{($route == 'dashboard')? 'active':''}}">
          <a href="{{url('admin/dashboard')}}">
          <i data-feather="pie-chart"></i>
			    <span>Dashboard</span>
          </a>
        </li>  
       		
        <li class="treeview {{($prefix == '/brand')? 'active':''}}">
          <a href="#">
            <i data-feather="sun"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all.brand')? 'active':''}}"><a href="{{route('all.brand')}}"><i class="ti-more"></i>All Brands</a></li>
          </ul>
        </li>
        
        <li class="treeview {{($prefix == '/category')? 'active':''}}">
          <a href="#">
            <i data-feather="list"></i>
            <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all.category')? 'active':''}}"><a href="{{route('all.category')}}">
              <i class="ti-more"></i>All Categories</a>
            </li>
            <li class="{{($route == 'all.subcategory')? 'active':''}}"><a href="{{route('all.subcategory')}}">
              <i class="ti-more"></i>All SubCategories</a>
            </li>
            <li class="{{($route == 'all.subsubcategory')? 'active':''}}"><a href="{{route('all.subsubcategory')}}">
              <i class="ti-more"></i>All Sub->SubCategories</a>
            </li>
          </ul>
        </li>
		  
        <li class="treeview {{($prefix == '/product')? 'active':''}}">
          <a href="#">
            <i data-feather="umbrella"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'add.product')? 'active':''}}"><a href="{{route('add.product')}}">
              <i class="ti-more"></i>Add Product</a>
            </li>
            <li class="{{($route == 'manage.product')? 'active':''}}"><a href="{{route('manage.product')}}">
              <i class="ti-more"></i>Manage Product</a>
            </li>
          </ul>
        </li>

        <li class="treeview {{($prefix == '/slilder')? 'active':''}}">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Sliders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all.slider')? 'active':''}}"><a href="{{route('all.slider')}}">
              <i class="ti-more"></i>Manage Slider</a>
            </li>
          </ul>
        </li>

        <li class="treeview {{($prefix == '/coupon')? 'active':''}}">
          <a href="#">
            <i data-feather="gift"></i>
            <span>Coupons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'manage.coupon')? 'active':''}}"><a href="{{route('manage.coupon')}}">
              <i class="ti-more"></i>Manage Coupon</a>
            </li>
          </ul>
        </li>

        <li class="treeview {{($prefix == '/shipping')? 'active':''}}">
          <a href="#">
            <i data-feather="map-pin"></i>
            <span>Shipping Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'manage.division')? 'active':''}}"><a href="{{route('manage.division')}}">
              <i class="ti-more"></i>Ship Division</a>
            </li>
            <li class="{{($route == 'manage.district')? 'active':''}}"><a href="{{route('manage.district')}}">
              <i class="ti-more"></i>Ship District</a>
            </li>
            <li class="{{($route == 'manage.state')? 'active':''}}"><a href="{{route('manage.state')}}">
              <i class="ti-more"></i>Ship State</a>
            </li>
          </ul>
        </li>
		 
        <li class="header nav-small-cap">Others</li>		
        

        <li class="treeview {{($prefix == '/newsletter')? 'active':''}}">
          <a href="#">
            <i data-feather="sun"></i>
            <span>NewsLetters</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all.newsletter')? 'active':''}}"><a href="{{route('all.newsletter')}}"><i class="ti-more"></i>All NewsLetters</a></li>
          </ul>
        </li> 
       
        <li class="treeview {{($prefix == '/order')? 'active':''}}">
          <a href="#">
            <i data-feather="sun"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all.pendingorder')? 'active':''}}"><a href="{{route('all.pendingorder')}}"><i class="ti-more"></i>Pending Orders</a></li>
            <li class="{{($route == 'all.paymentedorder')? 'active':''}}"><a href="{{route('all.paymentedorder')}}"><i class="ti-more"></i>Payment Accept</a></li>
            <li class="{{($route == 'all.cancelorder')? 'active':''}}"><a href="{{route('all.cancelorder')}}"><i class="ti-more"></i>Cancel Orders</a></li>
            <li class="{{($route == 'all.process.delivery')? 'active':''}}"><a href="{{route('all.process.delivery')}}"><i class="ti-more"></i>Process Delivery</a></li>
            <li class="{{($route == 'all.success.delivery')? 'active':''}}"><a href="{{route('all.success.delivery')}}"><i class="ti-more"></i>Delivery Success</a></li>

          </ul>
        </li> 

        <li class="treeview {{($prefix == '/SEO')? 'active':''}}">
          <a href="#">
            <i data-feather="sun"></i>
            <span>SEO Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'seo.edit')? 'active':''}}"><a href="{{route('seo.edit')}}"><i class="ti-more"></i>Pending Orders</a></li>
          </ul>
        </li>
        
        <li class="treeview {{($prefix == '/report')? 'active':''}}">
          <a href="#">
            <i data-feather="sun"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'today.order')? 'active':''}}"><a href="{{route('today.order')}}"><i class="ti-more"></i>Today Orders</a></li>
            <li class="{{($route == 'today.delivery')? 'active':''}}"><a href="{{route('today.delivery')}}"><i class="ti-more"></i>Today Delivered Orders</a></li>
            <li class="{{($route == 'this.month')? 'active':''}}"><a href="{{route('this.month')}}"><i class="ti-more"></i>This Month Orders</a></li>
            <li class="{{($route == 'search.report')? 'active':''}}"><a href="{{route('search.report')}}"><i class="ti-more"></i>Search Report</a></li>

          </ul>
        </li>
       
      </ul>
    </section>
	
    <div class="sidebar-footer">     
      <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
      <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
      <a href="{{route('admin.logout')}}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
    
  </aside>