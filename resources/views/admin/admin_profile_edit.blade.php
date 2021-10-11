
@extends('admin.admin_master')
@section('admin')
<div class="container-full">

		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
						<div class="box-header with-border">
								<h4 class="box-title">Admin Profile Edit</h4>
						</div>
			<!-- /.box-header -->
						<div class="box-body">
								<div class="row">
										<div class="col">
												<form novalidate="">
																<div class="row">
																					<div class="col-md-6" >
																					<div class="form-group">
																					<h5>Admin UserName <span class="text-danger">*</span></h5>
																					<div class="controls">
																					<input type="text" name="name" class="form-control" required="">
																						</div>
																				</div>
																				</div>
														<div class="col-md-6" >
																<div class="form-group">
																<h5>Admin email <span class="text-danger">*</span></h5>
																<div class="controls">
																<input type="email" name="email" class="form-control" required="">
															</div>
															</div>
															</div>
															<div class="form-group">
															<h5>File Input Field <span class="text-danger">*</span></h5>
															<div class="controls">
																<input type="file" name="file" class="form-control" required=""> <div class="help-block">

																</div>
														</div>

														<div class="row mt-3">
															<div class="col-md-6" >
														<div class="text-xs-right">
														<input type="submit"  class="mb-5 btn btn-rounded btn-primary" value="Update">
													</div>
													</div>
													</div>
												</form>

										</div>
							<!-- /.col -->
								</div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
	  </div>

   @endsection