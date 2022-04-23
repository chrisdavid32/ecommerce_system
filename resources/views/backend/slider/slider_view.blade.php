
@extends('admin.admin_master')
@section('admin')


	  <div class="container-full">
			<!-- Main content -->
		<section class="content">
		  <div class="row">
			    

			<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Slider</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="{{ route('slider.store')}}" method="post" enctype="multipart/form-data">
       @csrf
        <div class="form-group">
          <h5>Slider Title </h5>
          <div class="controls">
          <input type="text" name="title"  class="form-control">
         
           </div>
         </div>
         <div class="form-group">
            <h5>Description<span class="text-danger">*</span></h5>
            <div class="controls">
            <textarea name="description" cols="43" rows="4"></textarea>
            {{-- <input type="text" name="description"  class="form-control"> --}}
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
              <input type="submit"  class="mb-5 pull- btn btn-rounded btn-primary" value="Add New">
            </div>
           
        </form>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
          
			
			<!-- /.col -->
   <div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Slider List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Slider Image</th>
								<th>Title</th>
                                <th>Description</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
                            <tbody>
                                @foreach ($sliders as $item )
                                <tr>
                                    <td> <img src="{{asset($item->slider_img)}}" style="width: 70px; height:40px"></td>
                                    <td>{{ $item->title ? $item->title : 'No Title'}}</td>
                                    <td>{{ $item->description ? $item->description : 'No description'}}</td>
                                    <td>
									@if ($item->status == 1)
									<span class="badge badge-pill badge-success">Active</span>
									@else
										<span class="badge badge-pill badge-danger">Inactive</span>
									@endif
                                    </td>
                                    <td>
                                    <a href="{{ route('slider.edit',$item->id)}}" class="btn btn-info btn-sm" title="Edit Slider"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                                    {{-- <a href="{{ route('brand.delete',$item->id)}}" class="btn btn-danger" id="delete">Delete</a> --}}
                                    
                                    {{-- @if ($item->status == 1)
									<a href="{{ route('product.inactive',$item->id)}}" class="btn btn-danger" title="Inactive now"><i class="fa fa-arrow-down"></i></a>
									@else
									<a href="{{ route('product.active',$item->id)}}" class="btn btn-success" title="Active now"><i class="fa fa-arrow-up"></i></a>
									@endif --}}
                                </td>
                                </tr>
                                 @endforeach 
		                    </tbody>
					    </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
          
			</div>
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  

@endsection