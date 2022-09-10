@extends('frontend.master')
<script src="{{ asset('js/jquery.js') }}"></script>

@section('content')

@section('title')
Cash on Delivery
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
                   
                    <div class="col-md-6">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Shopping Amount</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                           
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
                    </div>

                    <div class="col-md-6">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Payment Method</h4>
                                    </div>
                                    <form action="{{route('cash.order')}}" method="post" id="payment-form">
                                        
                                        @csrf

                                        <div class="form-row">
                                            <img src="{{asset('payment/2.png')}}" width="50" height="30" alt="">

                                          <label for="">
                                            <input type="hidden" name="shipping_name" value="{{$data['shipping_name']}}">
                                            <input type="hidden" name="shipping_email" value="{{$data['shipping_email']}}">
                                            <input type="hidden" name="shipping_phone" value="{{$data['shipping_phone']}}">
                                            <input type="hidden" name="post_code" value="{{$data['post_code']}}">
                                            <input type="hidden" name="district_id" value="{{$data['district_id']}}">
                                            <input type="hidden" name="division_id" value="{{$data['division_id']}}">
                                            <input type="hidden" name="state_id" value="{{$data['state_id']}}">
                                            <input type="hidden" name="notes" value="{{$data['notes']}}">
                                         </label>  
                                        </div>
                                        

                                    
                                    <br>
                                    <button class="btn btn-primary">Comfirm payment</button>
                                    </form>	

                                </div>
                            </div>
                        </div> 
                    </div>
                   
                </form>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div><!-- /.body-content -->
    
  
    @endsection

   