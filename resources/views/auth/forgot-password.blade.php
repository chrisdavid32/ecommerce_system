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
                        <h4 class="">Forget Password</h4>
                        <p class="">Get back password</p>
                        <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" id="email" name="email" >
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
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
