<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\multiimg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Null_;

class IndexController extends Controller
{

    public function index()
    {
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $feature = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $hot_deals = Product::where('hot_deals', 1)->where('discount_price', '!=', Null)->orderBy('id', 'DESC')->limit(3)->get();
        $special = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $skip_category_first = Category::skip(0)->first();
        $skip_product_first = Product::where('status', 1)->where('category_id', $skip_category_first->id)->orderBy('id', 'DESC')->get();
        $skip_category_second = Category::skip(1)->first();
        $skip_product_second = Product::where('status', 1)->where('category_id', $skip_category_second->id)->orderBy('id', 'DESC')->get();

        //brand skip
        $skip_brand_second = Brand::skip(1)->first();
        $skip_product_second = Product::where('status', 1)->where('brand_id', $skip_brand_second->id)->orderBy('id', 'DESC')->get();

        return view('frontend.index', compact('categories', 'sliders', 'products', 'feature', 'hot_deals',
         'special', 'special_deals', 'skip_category_first', 'skip_product_first', 'skip_category_second', 'skip_product_second', 'skip_brand_second', 'skip_product_second'));
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function userProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function store(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        //$newName = $request->name;
        //dd($newName);
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            $ft = @unlink(public_path('upload/user_image/' . $data->profile_photo_path));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_image'), $fileName);
            $data['profile_photo_path'] = $fileName;
        }
        $data->save();
        $notification = array(
            'message' => 'User profile updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function changePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        $hashPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'Password updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('user.logout')->with($notification);
        } else {
            return redirect()->back();
        }
    }

    public function productDetails($id)
    {
        $product = Product::findOrFail($id);
        $size =   $product->product_size_en;
        $product_size = explode(',', $size);
        $color = $product->product_color_en;
        $product_color = explode(',', $color);
        $discount = $product->selling_price - $product->discount_price;
        $multimg = multiimg::where('product_id', $id)->get();
        
        return view('frontend.product.product_details', compact('product', 'discount', 'multimg', 'product_size', 'product_color'));
    }

//     public function productNew()
//     {
      
//         return view('frontend.product.newproduct');
//     }

    public function tagProduct($tag)
    {
        $products = Product::where('status', 1)->where('product_tags_en', $tag)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
              
        return view('frontend.tags.tag_view', compact('products', 'categories'));
    }

    public function SubcatWiseProduct($subcat_id, $slug)
    {
        $products = Product::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('frontend.product.subcategory_view', compact('products', 'categories'));
    }

    public function subSubcatWiseProduct($subsubcat_id, $slug)
    {
        $products = Product::where('status', 1)->where('subsubcategory_id', $subsubcat_id)->orderBy('id', 'DESC')->paginate(6);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('frontend.product.subsubcategory_view', compact('products', 'categories'));
    }
}