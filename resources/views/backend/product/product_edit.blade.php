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
			  <h4 class="box-title">Edit Product</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{ route('product.update')}}" method="POST" >
            @csrf
            <input type="hidden" name="id" value="{{$products->id}}">
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
            <option value="{{ $brand->id}}" {{$brand->id == $products->brand_id ? 'selected' : '' }}>{{ $brand->brand_name_en }}</option>	
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
            <option value="{{ $category->id}}" {{$category->id == $products->category_id ? 'selected' : ''}}>{{ $category->category_name_en }}</option>	
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
           @foreach($subcategory as $sub)
            <option value="{{ $sub->id}}" {{$sub->id == $products->subcategory_id ? 'selected' : ''}}>{{ $sub->subcategory_name_en }}</option>	
            @endforeach
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
            @foreach($subsubcategory as $subsub)
            <option value="{{ $subsub->id}}" {{$subsub->id == $products->subsubcategory_id ? 'selected' : ''}}>{{ $subsub->subsubcategory_name_en }}</option>	
            @endforeach
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
           <input type="text" name="product_name_en" class="form-control" value ="{{ $products->product_name_en}}" required data-validation-required-message="This field is required">
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
            <input type="text" name="product_name_hin" value ="{{ $products->product_name_hin}}" class="form-control" required data-validation-required-message="This field is required">
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
           <input type="text" name="product_code" value ="{{ $products->product_code}}" class="form-control">
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
           <input type="text" name="product_qty" value ="{{ $products->product_qty}}" class="form-control" >
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
            <input type="text" name="product_tags_en" class="form-control" value="{{ $products->product_tags_en }}" data-role="tagsinput">
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
            <input type="text" name="product_tags_hin" class="form-control" value="{{ $products->product_tags_hin }}" data-role="tagsinput">
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
            <input type="text" name="product_size_en" value="{{ $products->product_size_en}}" class="form-control" data-role="tagsinput">
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
            <input type="text" name="product_size_hin" value="{{ $products->product_size_hin}}" class="form-control" value="" data-role="tagsinput">
           @error('product_size_hin') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
							</div><!-- End of forth row -->

					<div class="row">
        <div class="col-md-6">
          <div class="form-group">
          <h5>Product Color English <span class="text-danger">*</span></h5>
          <div class="controls">
            <input type="text" name="product_color_en" class="form-control" value="{{ $products->product_color_en}}" data-role="tagsinput">
           @error('product_color_en') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
          <h5>Product Color Hindi <span class="text-danger">*</span></h5>
          <div class="controls">
            <input type="text" name="product_color_hin" class="form-control" value="{{ $products->product_color_hin}}" data-role="tagsinput">
           @error('product_color_hin') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
        
							</div><!-- End of fifth row -->

        <div class="row">
          <div class="col-md-6">
          <div class="form-group">
          <h5>Product Seling Price <span class="text-danger">*</span></h5>
          <div class="controls">
           <input type="text" name="selling_price" value="{{ $products->selling_price}}" class="form-control">
           @error('selling_price') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
          <h5>Product Discount Price <span class="text-danger">*</span></h5>
          <div class="controls">
            <input type="text" name="discount_price" value="{{ $products->discount_price ?  $products->discount_price : ''}}" class="form-control">
           @error('discount_price') 
           <span class="text-danger">{{ $message }}</span>
           @enderror 
           </div>
            </div>
        </div>
        
							</div><!-- End of sixth row -->

							<div class="row">
        <div class="col-md-6">
          <div class="form-group">
          <h5>Short Description En <span class="text-danger">*</span></h5>
          <div class="controls">
									<textarea name="short_descp_en" id="textarea" class="form-control" required placeholder="Textarea text">
                    {!! $products->short_descp_en !!}
                  </textarea>
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
									<textarea name="short_descp_hin" id="textarea" class="form-control" required placeholder="Textarea text">
                    {!! $products->short_descp_hin !!}
                  </textarea>
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
												{!! $products->long_descp_en !!}
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
												{!! $products->long_descp_hin !!}
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
											<input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{$products->hot_deals == 1 ? 'checked' : ''}}>
											<label for="checkbox_2">Hot Deal</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_3" name="featured" value="1" {{$products->featured == 1 ? 'checked' : ''}}>
											<label for="checkbox_3">Featured</label>
										</fieldset>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{$products->special_offer == 1 ? 'checked' : ''}}>
											<label for="checkbox_4">Special Offer</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{$products->special_deals == 1 ? 'checked' : ''}}>
											<label for="checkbox_5">Special Deals</label>
										</fieldset>
									</div>
								</div>
							</div>
					</div>
						
					
						
						<div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">					 
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

    <!-- Multi Image part -->
    <section>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
					<h4 class="box-title">Multi image <strong>update</strong></h4>
				  </div>
          <form action="{{ route('update.image')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row row-sm">
              @foreach ($multiimage as $multimg )
               <div class="col-md-3">
                <div class="card">
                  <img src="{{asset($multimg->photo_name)}}" class="card-img-top" style="height: 150; width: 130px">
                  <div class="card-body">
                    <a href="{{route('delete.multiimg', $multimg->id)}}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                    <p class="card-text">
                      <div class="form-group">
                        <label class="form-control-label">Change Image<span class="text-danger">*</span></label> 
                        <input type="file" class="form-control" name="multi_img[ {{ $multimg->id }} ]" >   
                      </div>
                      
                    </p>
                  </div>
                </div>
              </div> 
              @endforeach
              
            </div>
            	
						<div class="text-xs-right">
	            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">					 
						</div>
            <br>
          </form>
				</div>
			  </div>
        </div>

      </div>
    </section>

     <!-- Single Image thumbnail part-->
     <section>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
					<h4 class="box-title">Image Thumbnail <strong>update</strong></h4>
				  </div>
          <form action="{{ route('update-product-thambnail')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $products->id}}">
            <input type="hidden" name="old_img" value="{{ $products->product_thumbnail	}}">
            <div class="row row-sm">
             
               <div class="col-md-3">
                <div class="card">
                  <img src="{{asset($products->product_thumbnail)}}" class="card-img-top" style="height: 150; width: 130px">
                 
                    <p class="card-text">
                      <div class="form-group">
                        <label class="form-control-label">Change Image<span class="text-danger">*</span></label> 
                        <input type="file" name="product_thumbnail" class="form-control" onchange="mainThumbUrl(this)">
                        <img src="" alt="" id="mainthmb">  
                      </div>
                      
                    </p>
                  </div>
                </div>
              </div>
              
            </div>
            	
						<div class="text-xs-right">
	            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">					 
						</div>
            <br>
          </form>
				</div>
			  </div>
        </div>

      </div>
    </section>

   
	  </div>
<script>
  
   $(document).ready(function() {
							
        
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