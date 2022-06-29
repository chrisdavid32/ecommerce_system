
@extends('admin.admin_master')
@section('admin')


	  <div class="container-full">
			<!-- Main content -->
		<section class="content">
		  <div class="row">
			    

			<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Division</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="{{route('district.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <h5>Division Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="division_id" class="form-control"  >
                                    <option value="" selected="" disabled="">Select Division</option>
                                    @foreach($divisions as $division)
                                    <option value="{{ $division->id}}">{{ $division->division_name }}</option>	
                                    @endforeach
                                </select>
                                @error('division_id') 
                             <span class="text-danger">{{ $message }}</span>
                             @enderror 
                             </div>
                                 </div>
                        
                            <div class="form-group">
                            <h5>District Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="text" name="district_name"  class="form-control">
                            @error('district_name')
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
				  <h3 class="box-title">Division List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Division Name</th>
                                <th>District Name</th>
								<th>Action</th>
								</tr>
						</thead>
						<tbody>
                        @foreach ($district as $item )
                        <tr>
                            <td>{{$item->division->division_name}}</td>
                            <td>{{$item->district_name}}</td>
                            <td width="40%">
                            <a href="{{ route('district.edit',$item->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('district.delete',$item->id)}}" class="btn btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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