
@extends('admin.admin_master')
@section('admin')


	  <div class="container-full">
			<!-- Main content -->
		<section class="content">
		  <div class="row">
			    

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit State</h3>
				</div>
				<!-- /.box-header -->
               
				<div class="box-body">
					<form action="{{ route('state.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <h5>Division Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="division_id" class="form-control"  >
                                    <option value="" selected="" disabled="">Select Division</option>
                                    @foreach($divisions as $division)
                                    <option value="{{ $division->id}}" >{{ $division->division_name }}</option>	
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
                                <select name="district_id" class="form-control"  >
                                    <option value="" selected="" disabled="">Select Division</option>
                                   
                                </select>
                                @error('district_id') 
                             <span class="text-danger">{{ $message }}</span>
                             @enderror 
                             </div>
                         </div>
                        
                            <div class="form-group">
                            <h5>State Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="text" name="state_name"  class="form-control" value="{{$states->state_name}}">
                            @error('state_name')
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
          
			
			
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
    <script src="{{ asset('js/jquery.js') }}"></script>

<script>
    $(document).ready(function(){
        console.log("here");
    });
   
    $('select[name="division_id"]').on('change', function(){
      
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{ url('/shipping/getdivision/ajax') }}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="district_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="district_id"]').append(`<option value="${value.id}">${value.district_name}</option>`);
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
</script>
@endsection