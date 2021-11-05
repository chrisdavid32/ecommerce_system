
@extends('admin.admin_master')
@section('admin')
<script src="{{ asset('js/jquery.js')}}"></script>
<div class="container-full">

		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
						<div class="box-header with-border">
								<h4 class="box-title">Admin Change Password</h4>
						</div>
			<!-- /.box-header -->
						<div class="box-body">

										<form action="{{ route('update_password')}}" method="post">
													@csrf
																<div class="row">
																					<div class="col-md-6" >
																					<div class="form-group">
																					<h5>Current Password <span class="text-danger">*</span></h5>
																					<div class="controls">
																					<input type="password" id="current_password" name="oldpassword"  class="form-control" required="">
																						</div>
																				</div>
																				</div>

                    	<div class="col-md-6" >
																					<div class="form-group">
																					<h5>New Password <span class="text-danger">*</span></h5>
																					<div class="controls">
																					<input type="password" id="password" name="password"  class="form-control" required="">
																						</div>
																				</div>
																				</div>

                    	<div class="col-md-6" >
																					<div class="form-group">
																					<h5>Comfirm Password <span class="text-danger">*</span></h5>
																					<div class="controls">
																					<input type="password" id="password_confirmation" name="password_confirmation"  class="form-control" required="">
																						</div>
																				</div>
																				</div>
													
																</div>
                	<div class="row">
                  <div class="col-md-10">
                    <div class="mt-3 row">
                       <div class="text-xs-right">
                         <input type="submit"  class="mb-5 pull-right btn btn-rounded btn-primary" value="Update">
                        </div>
                    </div>
                  </div>
          </form>

									
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
				</div>
		</div>
		</section>
	  
	</div>
	@endsection