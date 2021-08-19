<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">

<!-- Add to Cart Modal -->
<meta name="csrf-token" content="{{csrf_token()}}">

<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<link rel="icon" href="{{asset('backend/images/honey-logo.png')}}" style="width:50px; height:50px;">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<!-- Toastr -->
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<!-- SweetAlert -->
<link type="text/css" rel="stylesheet" href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css">

</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header');

<!-- ============================================== MAIN CONTENT ============================================================= -->

@yield('main_content');

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer');

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/echo.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/scripts.js')}}"></script>
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
  
  <!-- add to cart  modal-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><strong id="pname"></strong></h5>
          <button type="button" id="closeModel" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                <img src="" id="pimage" class="card-img-top" alt="" style="width:200px; height: 200px;">
                
              </div>
            </div>
            <!-- end col-md-4 -->
            <div class="col-md-4">
              <ul class="list-group">
                <li class="list-group-item">Product Price: 
                  <strong  class="text-danger">$<span id="pprice"></span></strong>
                  $<del id="oldprice"></del>
                </li>
                <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
                <li class="list-group-item">Stock :
                  <span class="badge badge-pill badge-success" id="available" style="background:green; color:white;"></span>
                  <span class="badge badge-pill badge-danger" id="stockout" style="background:red; color:white;"></span>
                </li>
              </ul>
            </div>
            <!-- end col-md-4 -->
            <div class="col-md-4">
              <div class="form-group" id="colorarea">
                <label for="color">@if(session()->get('language') == 'myanmar') အရောင် @else Color @endif</label>
                <select class="form-control" name="color" id="color">                  
                </select>
              </div>
              <!-- end form-group -->
              <div class="form-group" id="sizearea">
                <label for="size">@if(session()->get('language') == 'myanmar') ဆိုဒ် @else Size @endif</label>
                <select class="form-control" name="size" id="size">
                </select>
              </div>
              <!-- end form-group -->
              <div class="form-group">
                <label for="qty">@if(session()->get('language') == 'myanmar') အရေအတွက် @else Qty : @endif</label>
                <input type="number" class="form-control" id="qty" value="1" min="1">
              </div>
              <input type="hidden" id="product_id">
              <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()"><i class="fa fa-shopping-cart inner-right-vs"></i>ADD TO CART</button>

              <!-- end form-group -->
            </div>
            <!-- end col-md-4 -->
          </div>
          <!-- end row -->
        </div>
        <!-- end modal-body -->        
    </div>
  </div>
  <!-- end add to cart  modal-->
  <!-- Product View with Model -->
  <script type="text/javascript">
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN':$('meta[name = "csrf-token"]').attr('content')
      }
    });
    
    function productView(id){
      // alert(id);

      $.ajax({
        url: "{{  url('/product/view/modal') }}/" + id,
        type:"GET",
        dataType:"json",
        success: function (data) {
          // console.log(data);
          $('#pname').text(data.product.product_name_en);   
          $('#pcode').text(data.product.product_code);          
          $('#pcategory').text(data.product.category.category_name_en);
          $('#pbrand').text(data.product.brand.brand_name_en);
          $('#pimage').attr('src','/' + data.product.product_thumbnail);

          // Need for add to cart
          $('#product_id').val(id);
          $('#qty').val(1);

          //Product Price
          if (data.product.discount_price == null) {
            $('#pprice').text('');
            $('#oldprice').text('');
            $('#pprice').text(data.product.selling_price);
            
          } else {
            $('#pprice').text(data.product.discount_price);
            $('#oldprice').text(data.product.selling_price);
          }
          //End Product Price

          //Stock
          if(data.product.product_qty > 0){
            $('#available').text('');
            $('#stockout').text('');
            $('#available').text('Available');

          }else{
            $('#available').text('');
            $('#stockout').text('');
            $('#stockout').text('Out of Stock');

          }

          // Color
          $('select[name = "color"]').empty();
          $.each(data.color,function (key, value) {
            $('select[name = "color"]').append('<option value="' + value +'">' + value + '</option>');
            if (data.color == "") {
              $('#colorarea').hide();
            } else {
              $('#colorarea').show();
            }
          });

          // Size
          $('select[name = "size"]').empty();
          $.each(data.size,function (key, value) {
            $('select[name = "size"]').append('<option value="' + value +'">' + value + '</option>');
            if (data.size == "") {
              $('#sizearea').hide();
            } else {
              $('#sizearea').show();
            }
          });

        },
      });

    }
    
  </script>
  <!-- End Product View with Model -->
  <!-- Start Add to Cart   -->
  <script type="text/javascript">
    function addToCart() {
      var id = $('#product_id').val();
      var product_name = $('#pname').text();
      var color = $('#color option:selected').text();
      var size = $('#size option:selected').text();
      var quantity = $('#qty').val();

      $.ajax({
        url: "/cart/data/store/" + id,
        type:"POST",
        dataType:"json",
        data: {
          product_name:product_name, color:color, size:size, quantity:quantity
        },
        success:function (data) {
          miniCart();
          $('#closeModel').click();
          // console.log(data);
          //Start sweet alert
          const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          icon: 'success',
                          showConfirmButton: false,
                          timer: 3000,
                        });
          if ($.isEmptyObject(data.error)) {
            Toast.fire({
              type:'success',
              title:data.success,
            });
          } else {
            Toast.fire({
              type:'error',
              title:data.error,
            });
          }
          //End sweet alert
        },
      });

    }  
  </script>
  <!-- End Add to Cart -->

  <!-- Start MiniCart   -->
  <script type="text/javascript">
    function miniCart() {      
      $.ajax({
        url: "/product/mini/card/",
        type:"GET",
        dataType:"json",
        success:function (data) {          
          // console.log(data);

          $('#cartQty').text(data.cartQty);
          //$('#cartTotal').text(data.cartTotal);
          $('span[id="cartTotal"]').text(data.cartTotal);
          //$('span([id = "cartTotal"])').text(data.cartTotal);

          var miniCart = "";
          $.each(data.carts,function (key, value) {
            miniCart += `<div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="${value.options.image}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                      <div class="price">$${value.price} (${value.qty})</div>
                    </div>
                    <div class="col-xs-1 action"> 
                      <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> 
                      </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>`;
          });
          $('#miniCart').html(miniCart);
          
        },
      });
    }  
    miniCart();

    function miniCartRemove(rowId) {
      $.ajax({
        url: "/minicard/product-remove/" + rowId,
        type:"GET",
        dataType:"json",
        success:function (data) {
          miniCart();
          // Start Message 
          const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                      });
          if ($.isEmptyObject(data.error)) {
              Toast.fire({
                  type: 'success',
                  title: data.success
              })
          }else{
              Toast.fire({
                  type: 'error',
                  title: data.error
              })
          }
            // End Message 

        },
      });
    }
  </script>
  <!-- End MiniCart -->
</body>
</html>