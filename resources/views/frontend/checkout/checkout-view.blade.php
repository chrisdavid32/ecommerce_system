@extends('frontend.master')
<script src="{{ asset('js/jquery.js') }}"></script>

@section('content')

@section('title')
Checkout
@endsection
<div class="breadcrumb">
	<div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Checkout</a></li>
                    <li class='active'>My Cart</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
    <div class="panel panel-default checkout-step-01">
      
        <div id="collapseOne" class="panel-collapse collapse in">
    
            <!-- panel-body  -->
            <div class="panel-body">
                <h4 class="checkout-subtitle"><strong>Shipping Address</strong></h4>
                <div class="row">		
    
                    <!-- guest-login -->			
                    <div class="col-md-6 col-sm-6 already-registered-login">
                       
                        <form class="register-form" role="form">
                          <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Shipping Name <span>*</span></label>
                            <input type="text" class="form-control unicase-form-control text-input" name="shipping_name" id="exampleInputEmail1" placeholder="" value="{{auth()->user()->name}}" required>
                          </div>
                          <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Shipping Email <span>*</span></label>
                            <input type="email" class="form-control unicase-form-control text-input" name="shipping_email" id="exampleInputEmail1" placeholder="" value="{{auth()->user()->email}}" required>
                          </div>
                          <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Shipping Phone <span>*</span></label>
                            <input type="text" class="form-control unicase-form-control text-input" name="shipping_phone" id="exampleInputEmail1" placeholder="" value="{{auth()->user()->phone}}" required>
                          </div>
                          <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Post Code <span>*</span></label>
                            <input type="text" class="form-control unicase-form-control text-input" name="shipping_phone" id="exampleInputEmail1" placeholder="Post Code" required>
                          </div>
                    </div>	
                    <!-- guest-login -->
    
                    <!-- already-registered-login -->
                    <div class="col-md-6 col-sm-6 already-registered-login">
                            <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Division Select</label>
                            <div class="controls">
                             <select name="division_id" class="form-control" id="division_id"  required>
                              <option value="" selected="" disabled="" required>Select Division</option>
                             @foreach ($divisions as $division)
                              <option value="{{ $division->id}}">{{$division->division_name}}</option>   
                             @endforeach
                             </select>
                             @error('division_id') 
                             <span class="text-danger">{{ $message }}</span>
                             @enderror 
                             </div>
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">District Select</label>
                                <div class="controls">
                                 <select name="district_id" class="form-control" id="district_id" required >
                                  
                                 </select>
                                 @error('district_id') 
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror 
                                 </div>
                            </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">State Select</label>
                                    <div class="controls">
                                     <select name="state_id" class="form-control" required id="state_id">
                                      
                                     </select>
                                     @error('state_id') 
                                     <span class="text-danger">{{ $message }}</span>
                                     @enderror 
                                     </div>
                                </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Note <span>*</span></label>
                                <div class="controls">
                                <textarea name="note" id="" cols="40" rows="4"></textarea>
                                </div>
                            </div>
                          
                          <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                        </form>
                    </div>	
                    <!-- already-registered-login -->		
    
                </div>			
            </div>
            <!-- panel-body  -->
    
        </div><!-- row -->
    </div>
    <!-- checkout-step-01  -->
                              
                        </div><!-- /.checkout-steps -->
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
    <div class="checkout-progress-sidebar ">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                </div>
                <div class="">
                    <ul class="nav nav-checkout-progress list-unstyled">
                        @foreach ($carts as $item)
                        <li><strong>Image</strong>
                        <img src="{{ asset($item->options->image)}}" alt="" style="height: 50px; width:50px;"> 
                        </li> 

                        <li><strong>Qty:</strong>
                            {{$item->qty}} &nbsp;&nbsp;
                            
                            <strong>Color:</strong>
                            {{$item->options->color}} &nbsp;&nbsp;

                            <strong>Size:</strong>
                            {{$item->options->size}} &nbsp;&nbsp;
                        </li> 
                        @endforeach
                        <hr>
                        
                        @if(Session::has('coupon'))
                        <strong>SubTotal</strong>{{$cartTotal}} <hr>

                        <strong>Coupon Name:</strong>&nbsp;&nbsp;{{session()->get('coupon')['coupon_name']}} <hr>
                        @else
                        <strong>SubTotal:</strong>&nbsp;&nbsp;{{$cartTotal}} <hr>

                        <strong>Grand Total</strong>&nbsp;&nbsp;{{$cartTotal}} <hr>
                        
                        @endif
                       

                        <li><a href="#">Shipping Method</a></li>
                        <li><a href="#">Payment Method</a></li>
                    </ul>		
                </div>
            </div>
        </div>
    </div> 
    <!-- checkout-progress-sidebar -->				</div>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">
    
            <div class="logo-slider-inner">	
                <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    <div class="item m-t-15">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                        </a>	
                    </div><!--/.item-->
    
                    <div class="item m-t-10">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                        </a>	
                    </div><!--/.item-->
    
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
                        </a>	
                    </div><!--/.item-->
    
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                        </a>	
                    </div><!--/.item-->
    
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                        </a>	
                    </div><!--/.item-->
    
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
                        </a>	
                    </div><!--/.item-->
    
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                        </a>	
                    </div><!--/.item-->
    
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                        </a>	
                    </div><!--/.item-->
    
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                        </a>	
                    </div><!--/.item-->
    
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                        </a>	
                    </div><!--/.item-->
                </div><!-- /.owl-carousel #logo-slider -->
            </div><!-- /.logo-slider-inner -->
        
    </div><!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div><!-- /.body-content -->
    <script>
        
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            // console.log(division_id);
            if(division_id) {
                $.ajax({
                    url: "{{ url('/district/ajax') }}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                      $('select[name="state_id"]').html('');
                       var d =$('select[name="district_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="district_id"]').append(`<option value="${value.id}">${value.district_name}</option>`);
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });

        $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{ url('/state/ajax') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="state_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="state_id"]').append(`<option value="${value.id}">${value.state_name}</option>`);
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    </script>
    @endsection

   