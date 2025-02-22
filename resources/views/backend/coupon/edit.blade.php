
@extends('admin.admin_master')
@section('admin')


	  <div class="container-full">
			<!-- Main content -->
		<section class="content">
		  <div class="row">
			    

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Coupon</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="{{ route('coupon.update', $coupons->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                            <h5>Coupon Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="text" name="coupon_name"  class="form-control" value="{{$coupons->coupon_name}}">
                            @error('coupon_name')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                            </div>
                            </div>
                            <div class="form-group">
                                <h5>Coupon Discount (%) <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="coupon_discount"  class="form-control" value="{{$coupons->coupon_discount}}">
                                @error('coupon_discount')
                                <span class="text-danger">{{ $message }}</span> 
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                            <h5>Coupon Validity Date <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="date" name="coupon_validity" class="form-control" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" value="{{$coupons->coupon_validity}}">
                            @error('coupon_validity')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                                </div>
                            </div>
                            
                                <div class="text-xs-right">
                                <input type="submit"  class="mb-5 pull- btn btn-rounded btn-primary" value="Update">
                                </div>
                            
                     </form>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
          
			

		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
@endsection