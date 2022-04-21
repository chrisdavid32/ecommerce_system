
@extends('admin.admin_master')
@section('admin')


	  <div class="container-full">
			<!-- Main content -->
		<section class="content">
		  <div class="row">
					
			<!-- /.col -->
   <div class="col-12
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Product List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
        <th>Image</th>
								<th>Product En</th>
								<th>Product Hin</th>
        <th>Quantity</th>
								<th>Action</th>
								</tr>
						</thead>
						<tbody>
       @foreach ($products as $item )
        
       
							<tr>
        <td><img src="{{asset($item->product_thumbnail)}}" style="width: 60px; height: 50px;"></td>
								<td>{{ $item->product_name_en}}</td>
								<td>{{ $item->product_name_hin}}</td>
        <td>{{ $item->product_qty}}</td>
        <td>
         <a href="{{route('product.edit',$item->id)}}" class="btn btn-info">Edit</a>
         <a href="" class="btn btn-danger" id="delete">Delete</a>
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