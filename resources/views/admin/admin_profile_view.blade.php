
@extends('admin.admin_master')
@section('admin')
<div class="container-full">

		<!-- Main content -->
		<section class="content">
			<div class="row">
				

    <div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-black">
					  <h3 class="widget-user-username mb-3">{{ucwords($adminData->name)}}</h3>
       <a href= "{{ route('admin.profile_edit')}}" style="float: right;" class="btn btn-rounded btn-primary mb-5">Edit Profile</a>
					  <h6 class="widget-user-desc">{{$adminData->email}}</h6>
					</div>
					<div class="widget-user-image">
					  <img class="rounded-circle" src="{{ (!empty($adminData->profile_photo_path)) ? url('upload/admin_image/'.$adminData->profile_photo_path) : url('upload/default.jpg')}}" alt="User Avatar">
					</div>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">12K</h5>
							<span class="description-text">FOLLOWERS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 br-1 bl-1">
						  <div class="description-block">
							<h5 class="description-header">550</h5>
							<span class="description-text">FOLLOWERS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">158</h5>
							<span class="description-text">TWEETS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
				  </div>
			</div>
		</section>
		<!-- /.content -->
	  </div>

   @endsection