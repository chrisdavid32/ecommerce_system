@php
    $tags_name = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
@endphp

<!-- ============================================== PRODUCT TAGS ============================================== -->
<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">

        @foreach ($tags_name as $tag)
                 
     <div class="tag-list"> <a class="item" title="Phone" href="category.html">{{$tag->product_tags_en}}</a>
        @endforeach
           <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
   </div>
</div>
   <!-- /.sidebar-widget -->
   <!-- ============================================== PRODUCT TAGS : END ============================================== -->