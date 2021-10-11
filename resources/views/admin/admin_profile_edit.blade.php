
@extends('admin.admin_master')
@section('admin')
<script src="{{ asset('js/jquery.js')}}"></script>
<div class="container-full">

		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
						<div class="box-header with-border">
								<h4 class="box-title">Admin Profile Edit</h4>
						</div>
			<!-- /.box-header -->
						<div class="box-body">

												<form action="{{ route('admin.profile_store')}}" method="post" enctype="multipart/form-data">
													@csrf
																<div class="row">
																					<div class="col-md-6" >
																					<div class="form-group">
																					<h5>Admin UserName <span class="text-danger">*</span></h5>
																					<div class="controls">
																					<input type="text" name="name" value="{{$editData->name}}" class="form-control" required="">
																						</div>
																				</div>
																				</div>
														<div class="col-md-6" >
																<div class="form-group">
																<h5>Admin email <span class="text-danger">*</span></h5>
																<div class="controls">
																<input type="email" name="email" value="{{$editData->email}}" class="form-control" required="">
															</div>
															</div>
															</div>
																</div>
															<div class="row">
																	<div class="col-md-6" >
															<div class="form-group">
															<h5>File Input Field <span class="text-danger">*</span></h5>
															<div class="controls">
																<input type="file" name="profile_photo_path" class="form-control" id="image" > 
															</div>
															</div>
																	</div>
																<div class="col-md-6" >	
																	<img id="showImage"	src="{{ (!empty($editData->profile_photo_path)) ? url('upload/admin_image/'.$editData->profile_photo_path) : url('upload/default.jpg')}}" style="width: 100px; height: 100px">
																</div>
															</div>
												
															<div class="row">
																<div class="col-md-10">
																	<div class="mt-3 row">
															<div class="text-xs-right">
														<input type="submit"  class="mb-5 btn btn-rounded btn-primary" value="Update">
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
			<script type="text/javascript">
$(document).ready(function(){
$('#image').change(function(e){
let reader = new FileReader();
reader.onload = function(e){
	$('#showImage').attr('src', e.target.result);
}
reader.readAsDataURL(e.target.files['0']);
});

});
  
</script>

   @endsection