
@extends('admin.admin_master')
@section('admin')


	  <div class="container-full">
			<!-- Main content -->
		<section class="content">
		  <div class="row">
			    

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Slider</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="{{ route('slider.update')}}" method="post" enctype="multipart/form-data">
       @csrf
       <input type="hidden" name="id" value="{{ $slider->id}}">
       <input type="hidden" name="old_image" value="{{ $slider->slider_img}}">
        <div class="form-group">
          <h5>Title<span class="text-danger">*</span></h5>
          <div class="controls">
          <input type="text" name="title"  class="form-control" value="{{$slider->title}}">
         </div>
         </div>
         <div class="form-group">
            <h5>Description</h5>
            <div class="controls">
            <input type="text" name="description"  class="form-control" value="{{$slider->description}}">
        </div>
          </div>
          <div class="form-group">
           <h5>Slider Image <span class="text-danger">*</span></h5>
           <div class="controls">
           <input type="file" name="slider_img" class="form-control">
           @error('slider_img')
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
          
			
			<!-- /.col -->
  
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  

@endsection