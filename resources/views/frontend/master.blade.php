<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">
<link href="{{ asset('frontend/assets/css/lightbox.css') }}" rel="stylesheet">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
 	<link rel="stylesheet" href="{{ asset ('backend/css/toastr.less') }}">
	<link rel="stylesheet" href="{{ asset ('backend/css/toastr.scss') }}">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
<script src="{{ asset ('backend/js/toastr.js') }}"></script>

  <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info')}}"
    switch(type){
      case 'info':
        toastr.info("{{Session::get('message')}}");
      break;

      case 'success':
       toastr.success("{{Session::get('message')}}");
      break;
      
       case 'warning':
       toastr.warning("{{Session::get('message')}}");
      break;

      case 'error':
       toastr.error("{{Session::get('message')}}");
      break;
    }
    @endif
  </script>

  <!-- Add to Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img src=" " id="pimage" class="card-img-top" style="height: 200px"; width="200px" alt="..." >
              
            </div>
          </div>

          <div class="col-md-4">
            
            <ul class="list-group">
              <li class="list-group-item">Product Price: <strong class="text-success">&#8358;<span id="discount"></span></strong> &nbsp;&nbsp;&nbsp;&nbsp; &#8358;<del class="text-danger" id="pprice"></del></li>
              <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
              <li class="list-group-item">Category:<strong id="pcategory"></strong></li>
              <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
              <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" style="background-color: green; color:#fff" id="available"></span>
                <span class="badge badge-pill badge-danger" style="background-color: red; color:#fff" id="stockout"></span>
            </ul>
          </div>

          <div class="col-md-4">
            <div class="form-group" id="colorarea">
              <label for="exampleFormControlSelect1">Select Color</label>
              <select class="form-control" id="exampleFormControlSelect1" name="color">
              </select>
            </div>
            <div class="form-group" id="sizearea">
              <label for="exampleFormControlSelect1">Select Size</label>
              <select class="form-control" id="exampleFormControlSelect1" name="size">
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Quantity</label>
             <input type="number" class="form-control" name="quantity" id="quantity" value="1" min="1">
            </div>
          </div>
          <div class="col-md-12">
          <button type="submit" class="btn btn-primary mb-2 pull-right">Add to Cart</button>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>
<script>
  $.ajaxsetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  })

  // view product with modal
  function productView(id){
    // console.log(id);
    $.ajax({
      type: 'GET',
      url: '/product/view/modal/'+id,
      dataType: 'json',
      success:function(data){
        // console.log(data);
        $('#pname').text(data.product.product_name_en);
        $('#price').text(data.product.selling_price);
        $('#pcode').text(data.product.product_code);
        $('#pcategory').text(data.product.category.category_name_en);
        $('#pbrand').text(data.product.brand.brand_name_en);
        $('#pimage').attr('src', '/'+data.product.product_thumbnail);

        //product discount
        if(data.product.discount_price == null){
          $('#pprice').text('');
          $('#discount').text('');
          $('#pprice').text(data.product.selling_price);
        }else{
          let discount = data.product.selling_price - data.product.discount_price
          $('#pprice').text(data.product.selling_price);
          $('#discount').text(discount);
        }

        //stock option

        if(data.product.product_qty > 0){
          $('#stockout').text('')
          $('#available').text('');
          $('#available').text('Available');
        }else{
          $('#stockout').text('')
          $('#available').text('');
          $('#stockout').text('Stock-Out')
        }
        
        $('select[name="color"]').empty();
        $.each(data.color, function(key, value){
        // console.log(value);
        $('select[name=color]').append(`<option value="${value}">${value}</option>`);
        if(data.color == ""){
          $('#colorarea').hide();
        }else{
          $('#colorarea').show();
        }
      });

      $('select[name="size"]').empty();
        $.each(data.size, function(key, value){
        // console.log(value);
        $('select[name=size]').append(`<option value="${value}">${value}</option>`);
        if(data.size == ""){
          $('#sizearea').hide();

        }else{
          $('#sizearea').show();
        }
      });
      }
     
    })
  }
</script>

</body>
</html>