
@extends('admin.admin_master')
@section('admin')


	  <div class="container-full">
			<!-- Main content -->
		<section class="content">
		  <div class="row">
			    

			<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add SubCategory</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="{{ route('subcategory.store')}}" method="post">
       @csrf
        <div class="form-group">
          <h5>Category<span class="text-danger">*</span></h5>
          <div class="controls">
         <select name="category_id" class="form-control">
          <option value="" selected="" disabled="">Select Category</option>
          @foreach ($categories as $category)
           <option value="{{ $category->id}}">{{$category->category_name_en}}</option>
          @endforeach
         </select>
           </div>
            @error('category_id')
             <span class="text-danger">{{ $message }}</span> 
            @enderror
         </div>
         <div class="form-group">
            <h5>Subcategory Name En <span class="text-danger">*</span></h5>
            <div class="controls">
            <input type="text" name="subcategory_name_en"  class="form-control">
            @error('subcategory_name_en')
             <span class="text-danger">{{ $message }}</span> 
            @enderror
            </div>
          </div>
          <div class="form-group">
           <h5>Subcategory Hindi <span class="text-danger">*</span></h5>
           <div class="controls">
           <input type="text" name="subcategory_name_hin" class="form-control">
           @error('subcategory_name_hin')
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
				  <h3 class="box-title">Subcategory List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
        <th>Category</th>
								<th>Subategory En</th>
								<th>Subcategory Hin</th>
								<th>Action</th>
								</tr>
						</thead>
						<tbody>
       @foreach ($subcategory as $item )
        
       
							<tr>
        <td>{{$item->category_id}}</td>
								<td>{{ $item->subcategory_name_en}}</td>
								<td>{{ $item->subcategory_name_hin}}</td>
								<td>
         <a href="" class="btn btn-info">Edit</a>
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