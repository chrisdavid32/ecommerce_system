
@extends('admin.admin_master')
@section('admin')


	  <div class="container-full">
			<!-- Main content -->
		<section class="content">
		  <div class="row">
			    

			<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Brands</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="{{ route('brand.store')}}" method="post" enctype="multipart/form-data">
       @csrf
        <div class="form-group">
          <h5>Brand Name English <span class="text-danger">*</span></h5>
          <div class="controls">
          <input type="text" name="brand_en"  class="form-control">
          @error('brand_en')
             <span class="text-danger">{{ $message }}</span> 
          @enderror
           </div>
         </div>
         <div class="form-group">
            <h5>Brand Name Hindi <span class="text-danger">*</span></h5>
            <div class="controls">
            <input type="text" name="brand_hin"  class="form-control">
            @error('brand_hin')
             <span class="text-danger">{{ $message }}</span> 
            @enderror
            </div>
          </div>
          <div class="form-group">
           <h5>Brand Image <span class="text-danger">*</span></h5>
           <div class="controls">
           <input type="file" name="brand_image" class="form-control">
           @error('brand_image')
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
   <div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Brands List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Brand En</th>
								<th>Brand Hin</th>
								<th>Image</th>
								<th>Action</th>
								</tr>
						</thead>
						<tbody>
       @foreach ($brands as $item )
        
       
							<tr>
								<td>{{ $item->brand_name_en}}</td>
								<td>{{ $item->brand_name_hin}}</td>
								<td> <img src="{{asset($item->brand_image)}}" style="width: 70px; height:40px"></td>
								<td>
         <a href="{{ route('brand.edit',$item->id)}}" class="btn btn-info">Edit</a>
         <a href="{{ route('brand.delete',$item->id)}}" class="btn btn-danger" id="delete">Delete</a>
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