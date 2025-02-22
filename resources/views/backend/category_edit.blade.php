
@extends('admin.admin_master')
@section('admin')


	  <div class="container-full">
			<!-- Main content -->
		<section class="content">
		  <div class="row">
			    

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Brands</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="{{ route('category.update',$category->id)}}" method="post">
       @csrf
       <input type="hidden" name="id" value="{{ $category->id}}">
        <div class="form-group">
          <h5>Category Name English <span class="text-danger">*</span></h5>
          <div class="controls">
          <input type="text" name="category_en"  class="form-control" value="{{$category->category_name_en}}">
          @error('category_en')
             <span class="text-danger">{{ $message }}</span> 
          @enderror
           </div>
         </div>
         <div class="form-group">
            <h5>Category Name Hindi <span class="text-danger">*</span></h5>
            <div class="controls">
            <input type="text" name="category_hin"  class="form-control" value="{{$category->category_name_hin}}">
            @error('category_hin')
             <span class="text-danger">{{ $message }}</span> 
            @enderror
            </div>
          </div>
          <div class="form-group">
           <h5>Category Icon <span class="text-danger">*</span></h5>
           <div class="controls">
           <input type="text" name="caterogy_icon" class="form-control" value="{{$category->caterogy_icon}}">
           @error('category_icon')
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