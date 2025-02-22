<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\multiimg;
use App\Models\Subcategory;
use App\Models\SubSubCategory;
use Image;

class ProductController extends Controller
{
    public function addProduct()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands'));
    }

    public function storeProduct(Request $request)
    {
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('product/product_thumbnail/' . $name_gen);
        $save_url = 'product/product_thumbnail/' . $name_gen;

        $productId = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => (strtolower(str_replace(' ', '-', $request->product_name_en))),
            'product_slug_hin' => (strtolower(str_replace(' ', '-', $request->product_name_hin))),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
            'product_thumbnail' => $save_url
        ]);

        //multi image upload create
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('product/multi_image/' . $make_name);
            $save_nameUrl = 'product/multi_image/' . $make_name;
            multiimg::insert([
                'product_id' => $productId,
                'photo_name' => $save_nameUrl

            ]);
        }
        $notification = [
            'message' => 'Product added Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('manage-product')->with($notification);
    }

    public function manageProduct()
    {
        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }

    public function editProduct($id)
    {
        $multiimage = multiimg::where('product_id', $id)->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = Subcategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('categories', 'brands', 'subcategory', 'subsubcategory', 'products', 'multiimage'));
    }

    public function productUpdate(Request $request)
    {
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => (strtolower(str_replace(' ', '-', $request->product_name_en))),
            'product_slug_hin' => (strtolower(str_replace(' ', '-', $request->product_name_hin))),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        $notification = [
            'message' => 'Product updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('manage-product')->with($notification);
    }
    public function multiImageUpdate(Request $request)
    {
        $imgs = $request->multi_img;
        foreach ($imgs as $id => $img) {
            $img_del = multiimg::findOrfail($id);
            unlink($img_del->photo_name);
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('product/multi_image/' . $make_name);
            $save_nameUrl = 'product/multi_image/' . $make_name;
            multiimg::where('id', $id)->update([
                'photo_name' => $save_nameUrl,
            ]);
        }
        $notification = [
            'message' => 'Product Image updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function thambnailUpdate(Request $request)
    {
        $pro_id = $request->id;
        $old_img =  $request->old_img;
        unlink($old_img);
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('product/product_thumbnail/' . $name_gen);
        $save_url = 'product/product_thumbnail/' . $name_gen;
        Product::findOrFail($pro_id)->update([
            'product_thumbnail' => $save_url
        ]);
        $notification = [
            'message' => 'Product Image updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
    
     public function multiDelete($id)
     {
         $oldimg =  multiimg::findOrFail($id);
         unlink($oldimg->photo_name);
         $oldimg->delete();
         $notification = [
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
     }

     public function productActive($id)
     {
        Product::findOrFail($id)->update([
            'status' => 1
        ]);
        $notification = [
            'message' => 'Product now Active',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification); 
     }

     public function productInactive($id)
     {
         Product::findOrFail($id)->update([
             'status' => 0
         ]);
         $notification = [
            'message' => 'Product now Inactive',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification); 
     }

     public function productDelete($id)
     {
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        $product->delete();
        $image = multiimg::where('product_id', $id)->get();
        foreach ($image as $img) {
            unlink($img->photo_name);
            $img->delete();
        }
        
        $notification = [
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification); 
     }
}