<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="{{asset('backend/images/favicon.ico')}}"> -->
    <link rel="icon" href="{{asset('backend/images/h-logo.png')}}" style="width:50px; height:50px;">

    <title>Hanni Shop Admin - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">

  <!-- Toastr -->
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

  @include('admin.body.header');
  @include('admin.body.sidebar');

  <!-- dynamic main content -->
  <div class="content-wrapper">
	  @yield('admin');
  </div>
  <!-- end main content -->
  @include('admin.body.footer');

</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->
	<script src="{{asset('backend/js/vendors.min.js')}}"></script>
  <script src="{{asset('../assets/icons/feather-icons/feather.min.js')}}"></script>	
	<script src="{{asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
	<script src="{{asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
	<script src="{{asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
	
	<!-- Sunny Admin App -->
	<script src="{{asset('backend/js/template.js')}}"></script>
	<script src="{{asset('backend/js/pages/dashboard.js')}}"></script>
	
  <!-- Toastr -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script>
    @if (Session::has('message')) {
      var type = "{{Session::get('alert-type','info')}}";
      switch (type) {
        case 'info':
          toastr.info("{{Session::get('message')}}");
          break;
        case 'success':
          toastr.success("{{Session::get('message')}}");
          break;
        case 'warning':
          toastr.warining("{{Session::get('message')}}");
          break;
        case 'error':
          toastr.error("{{Session::get('message')}}");
          break;      
        default:
          break;
      }
    }
    @endif
  </script>

</body>
</html>
