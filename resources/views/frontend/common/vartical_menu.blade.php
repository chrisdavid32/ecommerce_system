@php
    $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
@endphp
<div class="side-menu animate-dropdown outer-bottom-xs">
     <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
     <nav class="yamm megamenu-horizontal">
      <ul class="nav">
        @foreach ($categories as $category)

       <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
          class="icon {{ $category->caterogy_icon }}" aria-hidden="true"></i>&nbsp;&nbsp;{{ $category->category_name_en}}</a>
        <ul class="dropdown-menu mega-menu">
         <li class="yamm-content">
          <div class="row">
            @php
            $subcategories = App\Models\Subcategory::where('category_id', $category->id)->orderBy('subcategory_name_en', 'ASC')->get();
            @endphp
            @foreach ($subcategories as $sub)
           <div class="col-sm-12 col-md-3">
             <h2 class="title">
               {{ $sub->subcategory_name_en }}
             </h2>
             @php
              $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $sub->id)->orderBy('subsubcategory_name_en', 'ASC')->get();
            @endphp
            @foreach ($subsubcategories as $subsub)
            <ul class="links list-unstyled">
             <li><a href="#">{{$subsub->subsubcategory_name_en}}</a></li>
            </ul>
            @endforeach
           </div>
             @endforeach
           
          </div>
          <!-- /.row -->
         </li>
         <!-- /.yamm-content -->
        </ul>
        <!-- /.dropdown-menu -->
       </li>
       @endforeach
       <!-- /.menu-item -->

      
       <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
          class="icon fa fa-paper-plane"></i>Kids and Babies</a>
        <!-- /.dropdown-menu -->
       </li>
       <!-- /.menu-item -->

       <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
          class="icon fa fa-futbol-o"></i>Sports</a>
        <!-- ================================== MEGAMENU VERTICAL ================================== -->
        <!-- /.dropdown-menu -->
        <!-- ================================== MEGAMENU VERTICAL ================================== -->
       </li>
       <!-- /.menu-item -->

       <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
          class="icon fa fa-envira"></i>Home and Garden</a>
        <!-- /.dropdown-menu -->
       </li>
       <!-- /.menu-item -->

      </ul>
      <!-- /.nav -->
     </nav>
     <!-- /.megamenu-horizontal -->
    </div>