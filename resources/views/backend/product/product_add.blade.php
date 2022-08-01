@extends('admin.admin_master')
@section('admin')
<script src="{{ asset('js/jquery.js') }}"></script>

	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Product</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{ route('store.product')}}" method="POST" enctype="multipart/form-data">
            @csrf
					  <div class="row">
						<div class="col-12">
       <div class="row">
         <div class="col-md-4">
          <div class="form-group">
          <h5>Brand Select <span class="text-danger">*</span></h5>
          <div class="controls">
           <select name="brand_id" class="form-control"  >
            <option value="" selected="" disabled="">Select Brand</option>
            @foreach($brands as $brand)
            <option value="{{ $brand->id}}">{{ $brand->brand_name_en }}</option>	
            @endforeach
           </select>
           @error('brand_id') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
        <div class="col-md-4">
         <div class="form-group">
          <h5>Category Select <span class="text-danger">*</span></h5>
          <div class="controls">
           <select name="category_id" class="form-control"  >
            <option value="" selected="" disabled="">Select Category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id}}">{{ $category->category_name_en }}</option>	
            @endforeach
           </select>
           @error('category_id') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
          <h5>Subcategory Select <span class="text-danger">*</span></h5>
          <div class="controls">
           <select name="subcategory_id" class="form-control"  >
            <option value="" selected="" disabled="">Select Subcategory</option>
           
           </select>
           @error('subcategory_id') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
        
       </div>		<!--end fo first row -->				
							
        <div class="row">
        <div class="col-md-4">
         <div class="form-group">
          <h5>Sub_subcategory Select <span class="text-danger">*</span></h5>
          <div class="controls">
           <select name="subsubcategory_id" class="form-control"  >
            <option value="" selected="" disabled="">Select Sub_subcategory</option>
            
           </select>
           @error('subsubcategory_id') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <h5>Product Name En <span class="text-danger">*</span></h5>
          <div class="controls">
           <input type="text" name="product_name_en" class="form-control" required data-validation-required-message="This field is required">
           @error('product_name_en') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <h5>Product Name Hindi <span class="text-danger">*</span></h5>
          <div class="controls">
            <input type="text" name="product_name_hin" class="form-control" required data-validation-required-message="This field is required">
           @error('product_name_hin') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
       </div> <!-- end of second row -->
        <div class="row">
        <div class="col-md-4">
          <div class="form-group">
          <h5>Product Code <span class="text-danger">*</span></h5>
          <div class="controls">
           <input type="text" name="product_code" class="form-control">
           @error('product_code') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <h5>Product QTY <span class="text-danger">*</span></h5>
          <div class="controls">
           <input type="text" name="product_qty" class="form-control" >
           @error('product_qty') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <h5>Product Tag En <span class="text-danger">*</span></h5>
          <div class="controls">
            <input type="text" name="product_tags_en" class="form-control" value="" data-role="tagsinput">
           @error('product_tags_en') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
							</div><!-- End of third -->

							<div class="row">
        <div class="col-md-4">
          <div class="form-group">
          <h5>Product Tag Hindi <span class="text-danger">*</span></h5>
          <div class="controls">
            <input type="text" name="product_tags_hin" class="form-control" value="" data-role="tagsinput">
           @error('product_tags_hin') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <h5>Product Size En <span class="text-danger">*</span></h5>
          <div class="controls">
            <input type="text" name="product_size_en" class="form-control" value="" data-role="tagsinput">
           @error('product_size_en') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <h5>Product Size Hindi <span class="text-danger">*</span></h5>
          <div class="controls">
            <input type="text" name="product_size_hin" class="form-control" value="" data-role="tagsinput">
           @error('product_size_hin') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
							</div><!-- End of forth row -->

							<div class="row">
        <div class="col-md-4">
          <div class="form-group">
          <h5>Product Color English <span class="text-danger">*</span></h5>
          <div class="controls">
            <input type="text" name="product_color_en" class="form-control" value="" data-role="tagsinput">
           @error('product_color_en') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <h5>Product Color Hindi <span class="text-danger">*</span></h5>
          <div class="controls">
            <input type="text" name="product_color_hin" class="form-control" value="" data-role="tagsinput">
           @error('product_color_hin') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <h5>Product Seling Price <span class="text-danger">*</span></h5>
          <div class="controls">
           <input type="text" name="selling_price" class="form-control">
           @error('selling_price') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
							</div><!-- End of fifth row -->

							<div class="row">
        <div class="col-md-4">
          <div class="form-group">
          <h5>Product Discount Price <span class="text-danger">*</span></h5>
          <div class="controls">
            <input type="text" name="discount_price" class="form-control">
           @error('discount_price') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <h5>Product Thumbnail <span class="text-danger">*</span></h5>
          <div class="controls">
            <input type="file" name="product_thumbnail" class="form-control" onchange="mainThumbUrl(this)">
           @error('product_thumbnail') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           <img src="" alt="" id="mainthmb">
           </div>
            </div>
        </div>
                <div class="col-md-4">
          <div class="form-group">
          <h5>Multi Image <span class="text-danger">*</span></h5>
          <div class="controls">
           <input type="file" name="multi_img[]" class="form-control" id="multiImg" multiple="">
           @error('multi_img') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           <div class="row" id="preview_img"></div>
           </div>
            </div>
        </div>
							</div><!-- End of sixth row -->

							<div class="row">
        <div class="col-md-6">
          <div class="form-group">
          <h5>Short Description En <span class="text-danger">*</span></h5>
          <div class="controls">
									<textarea name="short_descp_en" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
           @error('short_descp_en') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
       
          <div class="col-md-6">
          <div class="form-group">
          <h5>Short Description Hindi <span class="text-danger">*</span></h5>
          <div class="controls">
									<textarea name="short_descp_hin" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
           @error('short_descp_hin') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
										</div>
        </div><!-- end of row eight -->
								  
								<div class="row">
        <div class="col-md-6">
          <div class="form-group">
          <h5>Long Description En <span class="text-danger">*</span></h5>
          <div class="controls">
								<textarea id="editor1" name="long_descp_en" rows="10" cols="80">
												Long Description Hindi
						</textarea>
           @error('long_descp_en') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
       
          <div class="col-md-6">
          <div class="form-group">
          <h5>Long Description Hindi <span class="text-danger">*</span></h5>
          <div class="controls">
								<textarea id="editor2" name="long_descp_hin" rows="10" cols="80">
												Long Description Hindi
						</textarea>
           @error('long_descp_hin') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>

							</div><!-- End of seventh row -->
							
					<hr>
					<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
											<label for="checkbox_2">Hot Deal</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_3" name="featured" value="1">
											<label for="checkbox_3">Featured</label>
										</fieldset>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_4" name="special_offer" value="1">
											<label for="checkbox_4">Special Offer</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_5" name="special_deals" value="1">
											<label for="checkbox_5">Special Deals</label>
										</fieldset>
									</div>
								</div>
							</div>
					</div>
						
					
						
						<div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">					 
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
<script>
  
   $(document).ready(function() {
		console.log("anot");					
        
    });
				$('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                      $('select[name="subsubcategory_id"]').html('');
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append(`<option value="${value.id}">${value.subcategory_name_en}</option>`);
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });

        $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{ url('/category/subsubcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append(`<option value="${value.id}">${value.subsubcategory_name_en}</option>`);
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
</script>
<script>
        function mainThumbUrl(input)
        {
          if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
             $('#mainthmb').attr('src', e.target.result).width(50).height(50);
            };
            reader.readAsDataURL(input.files[0]);
          }
        }

</script>
<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(40).height(40);
                       //create image element 
                      $('#preview_img').append(img); 
                      //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>
@endsection 