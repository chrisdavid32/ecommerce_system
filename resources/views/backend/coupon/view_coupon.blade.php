
@extends('admin.admin_master')
@section('admin')


	  <div class="container-full">
			<!-- Main content -->
		<section class="content">
		  <div class="row">
			    

			<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Coupon</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                            <h5>Coupon Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="text" name="coupon_name"  class="form-control">
                            @error('coupon_name')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                            </div>
                            </div>
                            <div class="form-group">
                                <h5>Coupon Discount (%) <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="coupon_discount"  class="form-control">
                                @error('coupon_discount')
                                <span class="text-danger">{{ $message }}</span> 
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                            <h5>Coupon Validity Date <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="date" name="coupon_validity" class="form-control">
                            @error('coupon_validity')
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
				  <h3 class="box-title">Coupon List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                        <th>Image</th>
								<th>Coupon Name</th>
								<th>Coupon Discount</th>
                                <th>Coupon Validity</th>
                                <th>Status</th>
								<th>Action</th>
								</tr>
						</thead>
						<tbody>
                        @foreach ($coupons as $item )
                        <tr>
                            <td>{{$item->coupon_name}}</td>
                            <td>{{ $item->coupon_discount}}%</td>
                            <td>{{ $item->coupon_validity}}</td>
                            <td>
								@if ($item->status == 1)
									<span class="badge badge-pill badge-success">Active</span>
									@else
										<span class="badge badge-pill badge-danger">Inactive</span>
								@endif
                            </td>
                            <td>
                            {{-- <a href="{{ route('category.edit',$item->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{ route('category.delete',$item->id)}}" class="btn btn-danger" id="delete">Delete</a> --}}
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