@extends('frontend.master')

@section('content')
@section('title')
@endsection
<div class="body-content outer-top-xs" id="top-banner-and-menu">
 <div class="container">
  <div class="row">
   <!-- ============================================== SIDEBAR ============================================== -->
   <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

    <!-- ================================== TOP NAVIGATION ================================== -->
    @include('frontend.common.vartical_menu')
    <!-- /.side-menu -->
    <!-- ================================== TOP NAVIGATION : END ================================== -->

    <!-- ============================================== HOT DEALS ============================================== -->
   
    <!-- ============================================== HOT DEALS: END ============================================== -->

    <!-- ============================================== SPECIAL OFFER ============================================== -->

    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
     <h3 class="section-title">Special Offer</h3>
     <div class="sidebar-widget-body outer-top-xs">
      <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
       @foreach ($special as $product)
         
        <div class="item">
        <div class="products special-product">
         <div class="product">
          <div class="product-micro">
           <div class="row product-micro-row">
            <div class="col col-xs-5">
             <div class="product-image">
              <div class="image"> <a href="{{url('product/details/'.$product->id)}}"> <img src="{{ $product->product_thumbnail}}" alt=""> </a> </div>
              <!-- /.image -->

             </div>
             <!-- /.product-image -->
            </div>
            <!-- /.col -->
            <div class="col col-xs-7">
             <div class="product-info">
              <h3 class="name"><a href="{{url('product/details/'.$product->id)}}">{{$product->product_name_en}}</a></h3>
              <div class="rating rateit-small"></div>
              <div class="product-price"> <span class="price"> </span>&#8358;{{$product->selling_price}} </div>
              <!-- /.product-price -->

             </div>
            </div>
            <!-- /.col -->
           </div>
           <!-- /.product-micro-row -->
          </div>
          <!-- /.product-micro -->

         </div>
         
       
        </div>
       </div>
       @endforeach
       
      </div>
     </div>
     <!-- /.sidebar-widget-body -->
    </div>
    <!-- /.sidebar-widget -->
    <!-- ============================================== SPECIAL OFFER : END ============================================== -->
    <!-- ============================================== PRODUCT TAGS ============================================== -->
    @include('frontend.common.product_tag')
    <!-- /.sidebar-widget -->
    <!-- ============================================== PRODUCT TAGS : END ============================================== -->
    <!-- ============================================== SPECIAL DEALS ============================================== -->

    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
     <h3 class="section-title">Special Deals</h3>
     <div class="sidebar-widget-body outer-top-xs">
      <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

       <div class="item">
        <div class="products special-product">

          @foreach ($special_deals as $product)
         <div class="product">
          <div class="product-micro">
           <div class="row product-micro-row">
            <div class="col col-xs-5">
             <div class="product-image">
              <div class="image"> <a href="#"> <img src="{{ $product->product_thumbnail}}" alt=""> </a> </div>
              <!-- /.image -->

             </div>
             <!-- /.product-image -->
            </div>
            <!-- /.col -->
            <div class="col col-xs-7">
             <div class="product-info">
              <h3 class="name"><a href="#">{{ $product->product_name_en}}</a></h3>
              <div class="rating rateit-small"></div>
              <div class="product-price"> <span class="price"> &#8358;{{$product->selling_price}} </span> </div>
              <!-- /.product-price -->

             </div>
            </div>
            <!-- /.col -->
           </div>
           <!-- /.product-micro-row -->
          </div>
          <!-- /.product-micro -->

         </div>
         @endforeach

        </div>
       </div>
      
      </div>
     </div>
     <!-- /.sidebar-widget-body -->
    </div>
    <!-- /.sidebar-widget -->
    <!-- ============================================== SPECIAL DEALS : END ============================================== -->
    <!-- ============================================== NEWSLETTER ============================================== -->
    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
     <h3 class="section-title">Newsletters</h3>
     <div class="sidebar-widget-body outer-top-xs">
      <p>Sign Up for Our Newsletter!</p>
      <form>
       <div class="form-group">
        <label class="sr-only" for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
       </div>
       <button class="btn btn-primary">Subscribe</button>
      </form>
     </div>
     <!-- /.sidebar-widget-body -->
    </div>
    <!-- /.sidebar-widget -->
    <!-- ============================================== NEWSLETTER: END ============================================== -->

    <!-- ============================================== Testimonials============================================== -->
    @include('frontend.common.testimonials')

    <!-- ============================================== Testimonials: END ============================================== -->

    <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image"> </div>
   </div>
   <!-- /.sidemenu-holder -->
   <!-- ============================================== SIDEBAR : END ============================================== -->

   <!-- ============================================== CONTENT ============================================== -->
   <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
    <!-- ==== SECTION – HERO ======== -->

    <div id="hero">
     <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
       @foreach ($sliders as $slider)
      
      <div class="item" style="background-image: url({{ asset($slider->slider_img)}});">
       <div class="container-fluid">
        <div class="text-left caption bg-color vertical-center">
         <div class="big-text fadeInDown-1"> {{$slider->title}} </div>
         <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{$slider->description}}</span> </div>
         <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product"
           class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
        </div>
        <!-- /.caption -->
       </div>
       <!-- /.container-fluid -->
      </div>
      @endforeach
      <!-- /.item -->
    </div>
     <!-- /.owl-carousel -->
    </div>

    <!-- ========================================= SECTION – HERO : END ========================================= -->

    <!-- ============================================== INFO BOXES ============================================== -->
    <div class="info-boxes wow fadeInUp">
     <div class="info-boxes-inner">
      <div class="row">
       <div class="col-md-6 col-sm-4 col-lg-4">
        <div class="info-box">
         <div class="row">
          <div class="col-xs-12">
           <h4 class="info-box-heading green">money back</h4>
          </div>
         </div>
         <h6 class="text">30 Days Money Back Guarantee</h6>
        </div>
       </div>
       <!-- .col -->

       <div class="hidden-md col-sm-4 col-lg-4">
        <div class="info-box">
         <div class="row">
          <div class="col-xs-12">
           <h4 class="info-box-heading green">free shipping</h4>
          </div>
         </div>
         <h6 class="text">Shipping on orders over $99</h6>
        </div>
       </div>
       <!-- .col -->

       <div class="col-md-6 col-sm-4 col-lg-4">
        <div class="info-box">
         <div class="row">
          <div class="col-xs-12">
           <h4 class="info-box-heading green">Special Sale</h4>
          </div>
         </div>
         <h6 class="text">Extra $5 off on all items </h6>
        </div>
       </div>
       <!-- .col -->
      </div>
      <!-- /.row -->
     </div>
     <!-- /.info-boxes-inner -->

    </div>
    <!-- /.info-boxes -->
    <!-- ==================== INFO BOXES : END ============== -->
    <!-- ============================================== SCROLL TABS ====================== -->
    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
     <div class="clearfix more-info-tab ">
      <h3 class="new-product-title pull-left">New Products</h3>
      <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
       <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>

        @foreach ($categories as $category)
       <li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">{{ ucwords($category->category_name_en)}}</a></li>
       @endforeach

       {{-- <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>

       <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> --}}
      </ul>
      <!-- /.nav-tabs -->
     </div>
     <div class="tab-content outer-top-xs">
      <div class="tab-pane in active" id="all">
       <div class="product-slider">
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

          @foreach ($products as $product)
         <div class="item item-carousel">
          <div class="products">
           <div class="product">
            <div class="product-image">
             <div class="image"> <a href="{{ url('product/details/'.$product->id) }}"><img src="{{ asset($product->product_thumbnail)}}" alt=""></a> </div>
             <!-- /.image -->
             @php
             $discount = ($product->discount_price/$product->selling_price) * 100;
            @endphp

              @if($product->discount_price == NULL)
              <div class="tag new"><span>new</span></div>
          
            @else
            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
            @endif
            </div>
            <div class="text-left product-info">
             <h3 class="name"><a href="{{ url('product/details/'.$product->id) }}">{{$product->product_name_en}}</a></h3>
             <div class="rating rateit-small"></div>
             <div class="description"></div>
             @if($product->discount_price == NULL)
              <div class="product-price"> <span class="price">&#8358; {{$product->selling_price}} </span> </div>
              @else
              <div class="product-price"> <span class="price"> &#8358; {{$product->selling_price - $product->discount_price}}</span> <span class="price-before-discount">
                &#8358;{{$product->selling_price}}</span> </div>
              @endif
            </div>
            <!-- /.product-info -->
            <div class="clearfix cart animate-effect">
             <div class="action">
              <ul class="list-unstyled">
               <li class="add-cart-button btn-group">
                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i
                  class="fa fa-shopping-cart"></i> </button>
                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
               </li>
               <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html"
                 title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
               <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i
                  class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
         @endforeach <!-- end product foreach-->
       </div>
        <!-- /.home-owl-carousel -->
       </div>
       <!-- /.product-slider -->
      </div>
      <!-- /.tab-pane -->

      @foreach ($categories as $category)
      <div class="tab-pane" id="category{{ $category->id }}">
        <div class="product-slider">
         <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
          @php
            $catwiseProduct = App\Models\Product::where('category_id', $category->id)->orderBy('id', 'DESC')->get();
          @endphp
           @forelse ($catwiseProduct as $product)
          <div class="item item-carousel">
           <div class="products">
            <div class="product">
             <div class="product-image">
              <div class="image"> <a href="{{ url('product/details/'.$product->id) }}"><img src="{{ asset($product->product_thumbnail)}}" alt=""></a> </div>
              <!-- /.image -->
              @php
               $discount = ($product->discount_price/$product->selling_price) * 100;
              @endphp

                @if($product->discount_price == NULL)
                <div class="tag new"><span>new</span></div>
            
              @else
              <div class="tag hot"><span>{{ round($discount) }}%</span></div>
              @endif
             </div>
             <!-- /.product-image -->
 
             <div class="text-left product-info">
              <h3 class="name"><a href="{{ url('product/details/'.$product->id) }}">{{$product->product_name_en}}</a></h3>
              <div class="rating rateit-small"></div>
              <div class="description"></div>
              @if($product->discount_price == NULL)
              <div class="product-price"> <span class="price">&#8358; {{$product->selling_price}} </span> </div>
              @else
              <div class="product-price"> <span class="price"> &#8358; {{$product->selling_price - $product->discount_price}}</span> <span class="price-before-discount">
                &#8358;{{$product->selling_price}}</span> </div>
              @endif

              
              <!-- /.product-price -->
 
             </div>
             <!-- /.product-info -->
             <div class="clearfix cart animate-effect">
              <div class="action">
               <ul class="list-unstyled">
                <li class="add-cart-button btn-group">
                 <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i
                   class="fa fa-shopping-cart"></i> </button>
                 <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                </li>
                <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html"
                  title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i
                   class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
          @empty
          <h5 class="text-danger">No product found</h5>
          <!-- /.item -->
          @endforelse <!-- end product foreach-->
        </div>
         <!-- /.home-owl-carousel -->
        </div>
        <!-- /.product-slider -->
       </div>
       @endforeach <!-- /. end category foreach -->
      <!-- /.tab-pane -->


     </div>
     <!-- /.tab-content -->
    </div>
    <!-- /.scroll-tabs -->
    <!-- ============================================== SCROLL TABS : END ============================================== -->
    <!-- ============================================== WIDE PRODUCTS ============================================== -->
    <div class="wide-banners wow fadeInUp outer-bottom-xs">
     <div class="row">
      <div class="col-md-7 col-sm-7">
       <div class="wide-banner cnt-strip">
        <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner1.jpg')}}" alt=""> </div>
       </div>
       <!-- /.wide-banner -->
      </div>
      <!-- /.col -->
      <div class="col-md-5 col-sm-5">
       <div class="wide-banner cnt-strip">
        <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner2.jpg')}}" alt=""> </div>
       </div>
       <!-- /.wide-banner -->
      </div>
      <!-- /.col -->
     </div>
     <!-- /.row -->
    </div>
    <!-- /.wide-banners -->

    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
    <!-- ============================================== FEATURED PRODUCTS ===================== -->
    
    <section class="section featured-product wow fadeInUp">
     <h3 class="section-title">Featured products</h3>
     <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
       @foreach ($feature as $product)
     
       <div class="item item-carousel">
        <div class="products">
         <div class="product">
          <div class="product-image">
           <div class="image"> <a href="{{ url('product/details/'.$product->id) }}"><img src="{{ asset($product->product_thumbnail)}}" alt=""></a> </div>
           <!-- /.image -->
           @php
            $discount = ($product->discount_price/$product->selling_price) * 100;
           @endphp

             @if($product->discount_price == NULL)
             <div class="tag new"><span>new</span></div>
         
           @else
           <div class="tag hot"><span>{{ round($discount) }}%</span></div>
           @endif
          </div>
          <!-- /.product-image -->

          <div class="text-left product-info">
           <h3 class="name"><a href="{{ url('product/details/'.$product->id) }}">{{$product->product_name_en}}</a></h3>
           <div class="rating rateit-small"></div>
           <div class="description"></div>
           @if($product->discount_price == NULL)
           <div class="product-price"> <span class="price">&#8358; {{$product->selling_price}} </span> </div>
           @else
           <div class="product-price"> <span class="price"> &#8358; {{$product->selling_price - $product->discount_price}}</span> 
            <span class="price-before-discount">
             &#8358;{{$product->selling_price}}</span> </div>
           @endif

           
           <!-- /.product-price -->

          </div>
          <!-- /.product-info -->
          <div class="clearfix cart animate-effect">
           <div class="action">
            <ul class="list-unstyled">
             <li class="add-cart-button btn-group">
              <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal"
               data-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"> <i
                class="fa fa-shopping-cart"></i> </button>
              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
             </li>

              <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{$product->id}}" onclick="addToWishlist(this.id)"> <i
               class="fa fa-heart"></i> </button>
           
             <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i
                class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
      @endforeach
      <!-- /.item -->

     </div>
     <!-- /.home-owl-carousel -->
    </section>
    <!-- /.section -->
    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

    <!-- Skip product first--->
    <section class="section featured-product wow fadeInUp">
      <h3 class="section-title">{{$skip_category_first->category_name_en}}</h3>
      <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
        @foreach ($skip_product_first as $product)
      
        <div class="item item-carousel">
         <div class="products">
          <div class="product">
           <div class="product-image">
            <div class="image"> <a href="{{ url('product/details/'.$product->id) }}"><img src="{{ asset($product->product_thumbnail)}}" alt=""></a> </div>
            <!-- /.image -->
            @php
             $discount = ($product->discount_price/$product->selling_price) * 100;
            @endphp
 
              @if($product->discount_price == NULL)
              <div class="tag new"><span>new</span></div>
          
            @else
            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
            @endif
           </div>
           <!-- /.product-image -->
 
           <div class="text-left product-info">
            <h3 class="name"><a href="{{ url('product/details/'.$product->id) }}">{{$product->product_name_en}}</a></h3>
            <div class="rating rateit-small"></div>
            <div class="description"></div>
            @if($product->discount_price == NULL)
            <div class="product-price"> <span class="price">&#8358; {{$product->selling_price}} </span> </div>
            @else
            <div class="product-price"> <span class="price"> &#8358; {{$product->selling_price - $product->discount_price}}</span> <span class="price-before-discount">
              &#8358;{{$product->selling_price}}</span> </div>
            @endif
 
            
            <!-- /.product-price -->
 
           </div>
           <!-- /.product-info -->
           <div class="clearfix cart animate-effect">
            <div class="action">
             <ul class="list-unstyled">
              <li class="add-cart-button btn-group">
               <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i
                 class="fa fa-shopping-cart"></i> </button>
               <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
              </li>
              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html"
                title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i
                 class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
       @endforeach
       <!-- /.item -->
 
      </div>
      <!-- /.home-owl-carousel -->
     </section>
    <!-- End Skip product-->

    <!-- Skip product second--->
    <section class="section featured-product wow fadeInUp">
      <h3 class="section-title">{{$skip_category_second->category_name_en}}</h3>
      <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
        @foreach ($skip_product_second as $product)
      
        <div class="item item-carousel">
         <div class="products">
          <div class="product">
           <div class="product-image">
            <div class="image"> <a href="{{ url('product/details/'.$product->id) }}"><img src="{{ asset($product->product_thumbnail)}}" alt=""></a> </div>
            <!-- /.image -->
            @php
             $discount = ($product->discount_price/$product->selling_price) * 100;
            @endphp
 
              @if($product->discount_price == NULL)
              <div class="tag new"><span>new</span></div>
          
            @else
            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
            @endif
           </div>
           <!-- /.product-image -->
 
           <div class="text-left product-info">
            <h3 class="name"><a href="{{ url('product/details/'.$product->id) }}">{{$product->product_name_en}}</a></h3>
            <div class="rating rateit-small"></div>
            <div class="description"></div>
            @if($product->discount_price == NULL)
            <div class="product-price"> <span class="price">&#8358; {{$product->selling_price}} </span> </div>
            @else
            <div class="product-price"> <span class="price"> &#8358; {{$product->selling_price - $product->discount_price}}</span> <span class="price-before-discount">
              &#8358;{{$product->selling_price}}</span> </div>
            @endif
 
            
            <!-- /.product-price -->
 
           </div>
           <!-- /.product-info -->
           <div class="clearfix cart animate-effect">
            <div class="action">
             <ul class="list-unstyled">
              <li class="add-cart-button btn-group">
               <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i
                 class="fa fa-shopping-cart"></i> </button>
               <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
              </li>
              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html"
                title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i
                 class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
       @endforeach
       <!-- /.item -->
 
      </div>
      <!-- /.home-owl-carousel -->
     </section>
    <!-- End second Skip product-->
    <!-- ============================================== WIDE PRODUCTS ============================================== -->
    <div class="wide-banners wow fadeInUp outer-bottom-xs">
     <div class="row">
      <div class="col-md-12">
       <div class="wide-banner cnt-strip">
        <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner.jpg')}}" alt=""> </div>
        <div class="strip strip-text">
         <div class="strip-inner">
          <h2 class="text-right">New Mens Fashion<br>
           <span class="shopping-needs">Save up to 40% off</span>
          </h2>
         </div>
        </div>
        <div class="new-label">
         <div class="text">NEW</div>
        </div>
        <!-- /.new-label -->
       </div>
       <!-- /.wide-banner -->
      </div>
      <!-- /.col -->

     </div>
     <!-- /.row -->
    </div>
    <!-- /.wide-banners -->
    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->

    <!-- Brand skin product-->
 <!-- Skip product first--->
 <section class="section featured-product wow fadeInUp">
  <h3 class="section-title">{{$skip_brand_second->brand_name_en}}</h3>
  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
    @foreach ($skip_product_second as $product)
  
    <div class="item item-carousel">
     <div class="products">
      <div class="product">
       <div class="product-image">
        <div class="image"> <a href="{{ url('product/details/'.$product->id) }}"><img src="{{ asset($product->product_thumbnail)}}" alt=""></a> </div>
        <!-- /.image -->
        @php
         $discount = ($product->discount_price/$product->selling_price) * 100;
        @endphp

          @if($product->discount_price == NULL)
          <div class="tag new"><span>new</span></div>
      
        @else
        <div class="tag hot"><span>{{ round($discount) }}%</span></div>
        @endif
       </div>
       <!-- /.product-image -->

       <div class="text-left product-info">
        <h3 class="name"><a href="{{ url('product/details/'.$product->id) }}">{{$product->product_name_en}}</a></h3>
        <div class="rating rateit-small"></div>
        <div class="description"></div>
        @if($product->discount_price == NULL)
        <div class="product-price"> <span class="price">&#8358; {{$product->selling_price}} </span> </div>
        @else
        <div class="product-price"> <span class="price"> &#8358; {{$product->selling_price - $product->discount_price}}</span> <span class="price-before-discount">
          &#8358;{{$product->selling_price}}</span> </div>
        @endif

        
        <!-- /.product-price -->

       </div>
       <!-- /.product-info -->
       <div class="clearfix cart animate-effect">
        <div class="action">
         <ul class="list-unstyled">
          <li class="add-cart-button btn-group">
           <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i
             class="fa fa-shopping-cart"></i> </button>
           <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
          </li>
          <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html"
            title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
          <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i
             class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
   @endforeach
   <!-- /.item -->

  </div>
  <!-- /.home-owl-carousel -->
 </section>
<!-- End Skip product-->
    <!-- End Brand Skin product-->
    <!-- ============================================== BEST SELLER ============================================== -->

    <div class="best-deal wow fadeInUp outer-bottom-xs">
     <h3 class="section-title">Best seller</h3>
     <div class="sidebar-widget-body outer-top-xs">
      <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
       <div class="item">
        <div class="products best-product">
         <div class="product">
          <div class="product-micro">
           <div class="row product-micro-row">
            <div class="col col-xs-5">
             <div class="product-image">
              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p20.jpg')}}" alt=""> </a> </div>
              <!-- /.image -->

             </div>
             <!-- /.product-image -->
            </div>
            <!-- /.col -->
            <div class="col2 col-xs-7">
             <div class="product-info">
              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
              <div class="rating rateit-small"></div>
              <div class="product-price"> <span class="price"> $450.99 </span> </div>
              <!-- /.product-price -->

             </div>
            </div>
            <!-- /.col -->
           </div>
           <!-- /.product-micro-row -->
          </div>
          <!-- /.product-micro -->

         </div>
         <div class="product">
          <div class="product-micro">
           <div class="row product-micro-row">
            <div class="col col-xs-5">
             <div class="product-image">
              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p21.jpg')}}" alt=""> </a> </div>
              <!-- /.image -->

             </div>
             <!-- /.product-image -->
            </div>
            <!-- /.col -->
            <div class="col2 col-xs-7">
             <div class="product-info">
              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
              <div class="rating rateit-small"></div>
              <div class="product-price"> <span class="price"> $450.99 </span> </div>
              <!-- /.product-price -->

             </div>
            </div>
            <!-- /.col -->
           </div>
           <!-- /.product-micro-row -->
          </div>
          <!-- /.product-micro -->

         </div>
        </div>
       </div>
       <div class="item">
        <div class="products best-product">
         <div class="product">
          <div class="product-micro">
           <div class="row product-micro-row">
            <div class="col col-xs-5">
             <div class="product-image">
              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p22.jpg')}}" alt=""> </a> </div>
              <!-- /.image -->

             </div>
             <!-- /.product-image -->
            </div>
            <!-- /.col -->
            <div class="col2 col-xs-7">
             <div class="product-info">
              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
              <div class="rating rateit-small"></div>
              <div class="product-price"> <span class="price"> $450.99 </span> </div>
              <!-- /.product-price -->

             </div>
            </div>
            <!-- /.col -->
           </div>
           <!-- /.product-micro-row -->
          </div>
          <!-- /.product-micro -->

         </div>
         <div class="product">
          <div class="product-micro">
           <div class="row product-micro-row">
            <div class="col col-xs-5">
             <div class="product-image">
              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p23.jpg')}}" alt=""> </a> </div>
              <!-- /.image -->

             </div>
             <!-- /.product-image -->
            </div>
            <!-- /.col -->
            <div class="col2 col-xs-7">
             <div class="product-info">
              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
              <div class="rating rateit-small"></div>
              <div class="product-price"> <span class="price"> $450.99 </span> </div>
              <!-- /.product-price -->

             </div>
            </div>
            <!-- /.col -->
           </div>
           <!-- /.product-micro-row -->
          </div>
          <!-- /.product-micro -->

         </div>
        </div>
       </div>
       <div class="item">
        <div class="products best-product">
         <div class="product">
          <div class="product-micro">
           <div class="row product-micro-row">
            <div class="col col-xs-5">
             <div class="product-image">
              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p24.jpg')}}" alt=""> </a> </div>
              <!-- /.image -->

             </div>
             <!-- /.product-image -->
            </div>
            <!-- /.col -->
            <div class="col2 col-xs-7">
             <div class="product-info">
              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
              <div class="rating rateit-small"></div>
              <div class="product-price"> <span class="price"> $450.99 </span> </div>
              <!-- /.product-price -->

             </div>
            </div>
            <!-- /.col -->
           </div>
           <!-- /.product-micro-row -->
          </div>
          <!-- /.product-micro -->

         </div>
         <div class="product">
          <div class="product-micro">
           <div class="row product-micro-row">
            <div class="col col-xs-5">
             <div class="product-image">
              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p25.jpg')}}" alt=""> </a> </div>
              <!-- /.image -->

             </div>
             <!-- /.product-image -->
            </div>
            <!-- /.col -->
            <div class="col2 col-xs-7">
             <div class="product-info">
              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
              <div class="rating rateit-small"></div>
              <div class="product-price"> <span class="price"> $450.99 </span> </div>
              <!-- /.product-price -->

             </div>
            </div>
            <!-- /.col -->
           </div>
           <!-- /.product-micro-row -->
          </div>
          <!-- /.product-micro -->

         </div>
        </div>
       </div>
       <div class="item">
        <div class="products best-product">
         <div class="product">
          <div class="product-micro">
           <div class="row product-micro-row">
            <div class="col col-xs-5">
             <div class="product-image">
              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p26.jpg')}}" alt=""> </a> </div>
              <!-- /.image -->

             </div>
             <!-- /.product-image -->
            </div>
            <!-- /.col -->
            <div class="col2 col-xs-7">
             <div class="product-info">
              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
              <div class="rating rateit-small"></div>
              <div class="product-price"> <span class="price"> $450.99 </span> </div>
              <!-- /.product-price -->

             </div>
            </div>
            <!-- /.col -->
           </div>
           <!-- /.product-micro-row -->
          </div>
          <!-- /.product-micro -->

         </div>
         <div class="product">
          <div class="product-micro">
           <div class="row product-micro-row">
            <div class="col col-xs-5">
             <div class="product-image">
              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p27.jpg')}}" alt=""> </a> </div>
              <!-- /.image -->

             </div>
             <!-- /.product-image -->
            </div>
            <!-- /.col -->
            <div class="col2 col-xs-7">
             <div class="product-info">
              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
              <div class="rating rateit-small"></div>
              <div class="product-price"> <span class="price"> $450.99 </span> </div>
              <!-- /.product-price -->

             </div>
            </div>
            <!-- /.col -->
           </div>
           <!-- /.product-micro-row -->
          </div>
          <!-- /.product-micro -->

         </div>
        </div>
       </div>
      </div>
     </div>
     <!-- /.sidebar-widget-body -->
    </div>
    <!-- /.sidebar-widget -->
    <!-- ============================================== BEST SELLER : END ============================================== -->

    <!-- ============================================== BLOG SLIDER ============================================== -->
    <section class="section latest-blog outer-bottom-vs wow fadeInUp">
     <h3 class="section-title">latest form blog</h3>
     <div class="blog-slider-container outer-top-xs">
      <div class="owl-carousel blog-slider custom-carousel">
       <div class="item">
        <div class="blog-post">
         <div class="blog-post-image">
          <div class="image"> <a href="blog.html"><img src="{{ asset('frontend/assets/images/blog-post/post1.jpg')}}" alt=""></a> </div>
         </div>
         <!-- /.blog-post-image -->

         <div class="text-left blog-post-info">
          <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>
          <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
          <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
           voluptatem.</p>
          <a href="#" class="lnk btn btn-primary">Read more</a>
         </div>
         <!-- /.blog-post-info -->

        </div>
        <!-- /.blog-post -->
       </div>
       <!-- /.item -->

       <div class="item">
        <div class="blog-post">
         <div class="blog-post-image">
          <div class="image"> <a href="blog.html"><img src="{{ asset('frontend/assets/images/blog-post/post2.jpg')}}" alt=""></a> </div>
         </div>
         <!-- /.blog-post-image -->

         <div class="text-left blog-post-info">
          <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
          <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
          <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
           voluptatem.</p>
          <a href="#" class="lnk btn btn-primary">Read more</a>
         </div>
         <!-- /.blog-post-info -->

        </div>
        <!-- /.blog-post -->
       </div>
       <!-- /.item -->

       <!-- /.item -->

       <div class="item">
        <div class="blog-post">
         <div class="blog-post-image">
          <div class="image"> <a href="blog.html"><img src="{{ asset('frontend/assets/images/blog-post/post1.jpg')}}" alt=""></a> </div>
         </div>
         <!-- /.blog-post-image -->

         <div class="text-left blog-post-info">
          <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
          <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
          <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
          <a href="#" class="lnk btn btn-primary">Read more</a>
         </div>
         <!-- /.blog-post-info -->

        </div>
        <!-- /.blog-post -->
       </div>
       <!-- /.item -->

       <div class="item">
        <div class="blog-post">
         <div class="blog-post-image">
          <div class="image"> <a href="blog.html"><img src="{{ asset('frontend/assets/images/blog-post/post2.jpg')}}" alt=""></a> </div>
         </div>
         <!-- /.blog-post-image -->

         <div class="text-left blog-post-info">
          <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
          <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
          <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
          <a href="#" class="lnk btn btn-primary">Read more</a>
         </div>
         <!-- /.blog-post-info -->

        </div>
        <!-- /.blog-post -->
       </div>
       <!-- /.item -->

       <div class="item">
        <div class="blog-post">
         <div class="blog-post-image">
          <div class="image"> <a href="blog.html"><img src="{{ asset('frontend/assets/images/blog-post/post1.jpg')}}" alt=""></a> </div>
         </div>
         <!-- /.blog-post-image -->

         <div class="text-left blog-post-info">
          <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
          <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
          <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
          <a href="#" class="lnk btn btn-primary">Read more</a>
         </div>
         <!-- /.blog-post-info -->

        </div>
        <!-- /.blog-post -->
       </div>
       <!-- /.item -->

      </div>
      <!-- /.owl-carousel -->
     </div>
     <!-- /.blog-slider-container -->
    </section>
    <!-- /.section -->
    <!-- ============================================== BLOG SLIDER : END ============================================== -->

    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
    <section class="section wow fadeInUp new-arriavls">
     <h3 class="section-title">New Arrivals</h3>
     <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
      <div class="item item-carousel">
       <div class="products">
        <div class="product">
         <div class="product-image">
          <div class="image"> <a href="detail.html"><img src="{{ asset('frontend/assets/images/products/p19.jpg')}}" alt=""></a> </div>
          <!-- /.image -->

          <div class="tag new"><span>new</span></div>
         </div>
         <!-- /.product-image -->

         <div class="text-left product-info">
          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
          <div class="rating rateit-small"></div>
          <div class="description"></div>
          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$
            800</span> </div>
          <!-- /.product-price -->

         </div>
         <!-- /.product-info -->
         <div class="clearfix cart animate-effect">
          <div class="action">
           <ul class="list-unstyled">
            <li class="add-cart-button btn-group">
             <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
               class="fa fa-shopping-cart"></i> </button>
             <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
            </li>
            <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i
               class="icon fa fa-heart"></i> </a> </li>
            <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"
               aria-hidden="true"></i> </a> </li>
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

      <div class="item item-carousel">
       <div class="products">
        <div class="product">
         <div class="product-image">
          <div class="image"> <a href="detail.html"><img src="{{ asset('frontend/assets/images/products/p28.jpg')}}" alt=""></a> </div>
          <!-- /.image -->

          <div class="tag new"><span>new</span></div>
         </div>
         <!-- /.product-image -->

         <div class="text-left product-info">
          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
          <div class="rating rateit-small"></div>
          <div class="description"></div>
          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$
            800</span> </div>
          <!-- /.product-price -->

         </div>
         <!-- /.product-info -->
         <div class="clearfix cart animate-effect">
          <div class="action">
           <ul class="list-unstyled">
            <li class="add-cart-button btn-group">
             <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
               class="fa fa-shopping-cart"></i> </button>
             <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
            </li>
            <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i
               class="icon fa fa-heart"></i> </a> </li>
            <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"
               aria-hidden="true"></i> </a> </li>
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

      <div class="item item-carousel">
       <div class="products">
        <div class="product">
         <div class="product-image">
          <div class="image"> <a href="detail.html"><img src="{{ asset('frontend/assets/images/products/p30.jpg')}}" alt=""></a> </div>
          <!-- /.image -->

          <div class="tag hot"><span>hot</span></div>
         </div>
         <!-- /.product-image -->

         <div class="text-left product-info">
          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
          <div class="rating rateit-small"></div>
          <div class="description"></div>
          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$
            800</span> </div>
          <!-- /.product-price -->

         </div>
         <!-- /.product-info -->
         <div class="clearfix cart animate-effect">
          <div class="action">
           <ul class="list-unstyled">
            <li class="add-cart-button btn-group">
             <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
               class="fa fa-shopping-cart"></i> </button>
             <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
            </li>
            <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i
               class="icon fa fa-heart"></i> </a> </li>
            <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"
               aria-hidden="true"></i> </a> </li>
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

      <div class="item item-carousel">
       <div class="products">
        <div class="product">
         <div class="product-image">
          <div class="image"> <a href="detail.html"><img src="{{ asset('frontend/assets/images/products/p1.jpg')}}" alt=""></a> </div>
          <!-- /.image -->

          <div class="tag hot"><span>hot</span></div>
         </div>
         <!-- /.product-image -->

         <div class="text-left product-info">
          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
          <div class="rating rateit-small"></div>
          <div class="description"></div>
          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$
            800</span> </div>
          <!-- /.product-price -->

         </div>
         <!-- /.product-info -->
         <div class="clearfix cart animate-effect">
          <div class="action">
           <ul class="list-unstyled">
            <li class="add-cart-button btn-group">
             <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
               class="fa fa-shopping-cart"></i> </button>
             <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
            </li>
            <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i
               class="icon fa fa-heart"></i> </a> </li>
            <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"
               aria-hidden="true"></i> </a> </li>
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

      <div class="item item-carousel">
       <div class="products">
        <div class="product">
         <div class="product-image">
          <div class="image"> <a href="detail.html"><img src="{{ asset('frontend/assets/images/products/p2.jpg')}}" alt=""></a> </div>
          <!-- /.image -->

          <div class="tag sale"><span>sale</span></div>
         </div>
         <!-- /.product-image -->

         <div class="text-left product-info">
          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
          <div class="rating rateit-small"></div>
          <div class="description"></div>
          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$
            800</span> </div>
          <!-- /.product-price -->

         </div>
         <!-- /.product-info -->
         <div class="clearfix cart animate-effect">
          <div class="action">
           <ul class="list-unstyled">
            <li class="add-cart-button btn-group">
             <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
               class="fa fa-shopping-cart"></i> </button>
             <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
            </li>
            <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i
               class="icon fa fa-heart"></i> </a> </li>
            <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"
               aria-hidden="true"></i> </a> </li>
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

      <div class="item item-carousel">
       <div class="products">
        <div class="product">
         <div class="product-image">
          <div class="image"> <a href="detail.html"><img src="{{ asset('frontend/assets/images/products/p3.jpg')}}" alt=""></a> </div>
          <!-- /.image -->

          <div class="tag sale"><span>sale</span></div>
         </div>
         <!-- /.product-image -->

         <div class="text-left product-info">
          <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
          <div class="rating rateit-small"></div>
          <div class="description"></div>
          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$
            800</span> </div>
          <!-- /.product-price -->

         </div>
         <!-- /.product-info -->
         <div class="clearfix cart animate-effect">
          <div class="action">
           <ul class="list-unstyled">
            <li class="add-cart-button btn-group">
             <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
               class="fa fa-shopping-cart"></i> </button>
             <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
            </li>
            <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i
               class="icon fa fa-heart"></i> </a> </li>
            <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"
               aria-hidden="true"></i> </a> </li>
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
     </div>
     <!-- /.home-owl-carousel -->
    </section>
    <!-- /.section -->
    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

   </div>
   <!-- /.homebanner-holder -->
   <!-- ============================================== CONTENT : END ============================================== -->
  </div>
  <!-- /.row -->
  <!-- ============================================== BRANDS CAROUSEL ============================================== -->
 @include('frontend.body.brand')
  <!-- /.logo-slider -->
  <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
 </div>
 <!-- /.container -->
</div>

@endsection