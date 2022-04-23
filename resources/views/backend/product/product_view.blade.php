
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
								<th>Product Price</th>
       						    <th>Quantity</th>
       						    <th>Discount</th>
       						    <th>Status</th>
								<th>Action</th>
								</tr>
						</thead>
							<tbody>
							@foreach ($products as $item )
							<tr>
								<td><img src="{{asset($item->product_thumbnail)}}" style="width: 60px; height: 50px;"></td>
								<td>{{ $item->product_name_en}}</td>
								<td>&#x20A6; {{ $item->selling_price}}</td>
								<td>{{ $item->product_qty}}</td>
								<td>
								@if($item->discount_price == NULL)
								<span class="badge badge-pill badge-danger">No Discount</span>
								@else
								@php
									$discount = ($item->discount_price/$item->selling_price) * 100;
								@endphp
								<span class="badge badge-pill badge-success"> {{ round($discount)}} %</span>
								@endif
								</td>
								<td>
									@if ($item->status == 1)
									<span class="badge badge-pill badge-success">Active</span>
									@else
										<span class="badge badge-pill badge-danger">Inactive</span>
									@endif
								</td>
								<td>
									<a href="" class="btn btn-primary" title="view Product"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
									<a href="{{route('product.edit',$item->id)}}" class="btn btn-info" title="Edit Product"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
									<a href="{{route('product.delete')}}" class="btn btn-danger" id="delete" title="product delete"><i class="fa fa-trash"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
									@if ($item->status == 1)
									<a href="{{ route('product.inactive',$item->id)}}" class="btn btn-danger" title="Inactive now"><i class="fa fa-arrow-down"></i></a>
									@else
									<a href="{{ route('product.active',$item->id)}}" class="btn btn-success" title="Active now"><i class="fa fa-arrow-up"></i></a>
									@endif
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