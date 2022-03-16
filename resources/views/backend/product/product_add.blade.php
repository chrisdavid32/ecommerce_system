@extends('admin.admin_master')
@section('admin')

	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Product</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form novalidate>
					  <div class="row">
						<div class="col-12">						
							
							<div class="form-group">
								<h5>Email Field <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
							</div>
						
							<div class="form-group">
								<h5>File Input Field <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="file" class="form-control" required> </div>
							</div>
						
							<div class="form-group">
								<h5>Basic Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="select" id="select" required class="form-control">
										<option value="">Select Your City</option>
										<option value="1">India</option>
										<option value="2">USA</option>
										<option value="3">UK</option>
										<option value="4">Canada</option>
										<option value="5">Dubai</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<h5>Textarea <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
								</div>
							</div>
						</div>
					  </div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<h5>Checkbox <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="checkbox" id="checkbox_1" required value="single">
										<label for="checkbox_1">Check this custom checkbox</label>
									</div>								
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<h5>Checkbox Group <span class="text-danger">*</span></h5>
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_2" required value="x">
											<label for="checkbox_2">I am unchecked Checkbox</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_3" value="y">
											<label for="checkbox_3">I am unchecked too</label>
										</fieldset>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<h5>Select Max 2 Checkbox<span class="text-danger">*</span></h5>
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_4" data-validation-maxchecked-maxchecked="2" data-validation-maxchecked-message="Don't be greedy!" required>
											<label for="checkbox_4">I am unchecked Checkbox</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_5">
											<label for="checkbox_5">I am unchecked too</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_6">
											<label for="checkbox_6">You can check me</label>
										</fieldset>
									</div> <small>Select any 2 options</small> </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<h5>Minimum 2 Checkbox selection<span class="text-danger">*</span></h5>
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_7" value="1" data-validation-minchecked-minchecked="2" data-validation-minchecked-message="Choose at least two" name="styled_min_checkbox" required>
											<label for="checkbox_7">I am unchecked Checkbox</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_8" value="2">
											<label for="checkbox_8">I am unchecked too</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_9" value="3">
											<label for="checkbox_9">You can check me</label>
										</fieldset>
									</div> <small>Select any 2 options</small> </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<h5>Radio Buttons <span class="text-danger">*</span></h5>
									<fieldset class="controls">
										<input name="group1" type="radio" id="radio_1" value="1" required>
										<label for="radio_1">Check Me</label>
									</fieldset>
									<fieldset>
										<input name="group1" type="radio" id="radio_2" value="2">
										<label for="radio_2">Or Me</label>									
									</fieldset>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<h5>Inline Radio Buttons <span class="text-danger">*</span></h5>
									<div class="controls">
										<fieldset>
											<input name="group2" type="radio" id="radio_3" value="Yes" required>
											<label for="radio_3">Check Me</label>
										</fieldset>
										<fieldset>
											<input name="group2" type="radio" id="radio_4" value="No">
											<label for="radio_4">Or Me</label>
										</fieldset>
									</div>
								</div>
							</div>
						</div>
						<div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">					 
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
		<!-- /.content -->
	  </div>

@endsection 