@extends('frontend.master')

@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Forget Password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="mb-3 row">
				<!-- Sign-in -->
                <div class="col-md-3 col-sm-3 sign-in">
                 </div>			
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Reset Password</h4>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" id="email" name="email" >
                            </div>
                            <div class="form-group">
                                <label class="info-title">Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" id="password" name="password">
                            </div>
                            <br>
                            
                            <div class="form-group">
                                <label class="info-title">Confirm Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation" name="password_confirmation" >
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
                        </form>					
                    </div>
                    <br>
                    <br>
                    <div class="col-md-3 col-sm-3 sign-in">
                    </div>	
                    </div><!-- /.sigin-in-->
                    @include('frontend.body.brand')
    </div><!-- /.container -->
</div><!-- /.body-content -->
@endsection
