@php
$setting = App\Models\Setting::first();
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="{{asset('backend/images/favicon.ico')}}"> -->
    <link rel="icon" href="{{asset($setting->site_logo)}}" style="width:50px; height:50px;">

    <title>Honey Shop Admin - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">
  <!-- Tgas Input Script -->
  <script src="{{ asset('../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
  <!-- Toastr -->
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    
  <!-- SweetAlert -->
  <link type="text/css" rel="stylesheet" href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css">

  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
  <div class="wrapper">

    @include('admin.body.header')
    @include('admin.body.sidebar')

    <!-- dynamic main content -->
    <div class="content-wrapper">
      @yield('admin')
    </div>
    <!-- end main content -->
    @include('admin.body.footer')

  </div>
  <!-- ./wrapper -->
  	
  
  <!-- Vendor JS -->
  <script src="{{asset('backend/js/vendors.min.js')}}"></script>
  <script src="{{asset('../assets/icons/feather-icons/feather.min.js')}}"></script>	
  <script src="{{asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
  <script src="{{asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
  <script src="{{asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
  <script src="{{asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
  <!-- /// Tgas Input Script -->
  <script src="{{asset('../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
  <!-- // CK EDITOR  --> 
  <script src="{{asset('../assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
  <script src="{{asset('../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
  <script src="{{asset('backend/js/pages/editor.js') }}"></script>

  <!-- Sunny Admin App -->
  <script src="{{asset('backend/js/template.js')}}"></script>
  <script src="{{asset('backend/js/pages/dashboard.js')}}"></script>
  <script src="{{asset('backend/js/pages/data-table.js')}}"></script>
    
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

  <!-- SweetAlert -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script type="text/javascript">
    $(function(){
      $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link;
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        })
      });
    });
  </script>
</body>
</html>
