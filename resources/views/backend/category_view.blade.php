
@extends('admin.admin_master')
@section('admin')


	  <div class="container-full">
			<!-- Main content -->
		<section class="content">
		  <div class="row">
			    

			<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="{{ route('category.store')}}" method="post" enctype="multipart/form-data">
       @csrf
        <div class="form-group">
          <h5>Category Name English <span class="text-danger">*</span></h5>
          <div class="controls">
          <input type="text" name="category_en"  class="form-control">
          @error('category_en')
             <span class="text-danger">{{ $message }}</span> 
          @enderror
           </div>
         </div>
         <div class="form-group">
            <h5>Category Name Hindi <span class="text-danger">*</span></h5>
            <div class="controls">
            <input type="text" name="category_hin"  class="form-control">
            @error('category_hin')
             <span class="text-danger">{{ $message }}</span> 
            @enderror
            </div>
          </div>
          <div class="form-group">
           <h5>Category Icon <span class="text-danger">*</span></h5>
           <div class="controls">
           <input type="text" name="caterogy_icon" class="form-control">
           @error('caterogy_icon')
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
				  <h3 class="box-title">Category List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
        <th>Image</th>
								<th>Category En</th>
								<th>Category Hin</th>
								<th>Action</th>
								</tr>
						</thead>
						<tbody>
       @foreach ($category as $item )
        
       
							<tr>
        <td> <span> <i class="{{$item->caterogy_icon}}"></i></span></td>
								<td>{{ $item->category_name_en}}</td>
								<td>{{ $item->category_name_hin}}</td>
								<td>
         <a href="{{ route('category.edit',$item->id)}}" class="btn btn-info">Edit</a>
         <a href="{{ route('category.delete',$item->id)}}" class="btn btn-danger" id="delete">Delete</a>
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