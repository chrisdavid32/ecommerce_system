<?php

use app\Models\User;
use App\Models\Slider;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AllUserController;
use App\Http\Controllers\user\StripeController;
use App\Http\Controllers\Backend\brandController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\categoryContoller;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\frontend\LanguageController;
use App\Http\Controllers\backend\subCategoryController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\User\CashController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'admin', 'Middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

// Route group protected by  
Route::middleware(['auth:admin'])->group(function(){
   
});
Route::middleware(['auth:sanctum,admin', 'verified'])->get('admin/dashboard', function () {

    return view('admin.index');
})->name('dashboard');


//Admin All Route
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');

Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile_edit');

Route::post('/admin/profile/store', [AdminProfileController::class, 'adminProfileStore'])->name('admin.profile_store');

Route::get('/admin/change/password', [AdminProfileController::class, 'adminChangePassword'])->name('change_password');

Route::post('/admin/update/password', [AdminProfileController::class, 'updatePassword'])->name('update_password');

Route::get('/user/logout', [IndexController::class, 'userLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'userProfile'])->name('user.profile');
Route::post('/update/user/profile', [IndexController::class, 'store'])->name('user.profile.store');
Route::get('/user/change/password', [IndexController::class, 'changePassword'])->name('change.password');
Route::post('/user/password/update', [IndexController::class, 'updatePassword'])->name('user.password.update');

//admid brand route
Route::prefix('brand')->group(function () {
    Route::get('/view', [brandController::class, 'brandView'])->name('all.brand');
    Route::post('/store', [brandController::class, 'brandStore'])->name('brand.store');
    Route::get('/edit/{id}', [brandController::class, 'brandEdit'])->name('brand.edit');
    Route::post('/update', [brandController::class, 'brandUpdate'])->name('brand.update');
    Route::get('/delete/{id}', [brandController::class, 'brandDelete'])->name('brand.delete');
});

//Admin Categories Route
Route::prefix('category')->group(function () {
    Route::get('/view', [categoryContoller::class, 'categoryView'])->name('all.category');
    Route::post('/store', [categoryContoller::class, 'categoryStore'])->name('category.store');
    Route::get('/edit/{id}', [categoryContoller::class, 'categoryEdit'])->name('category.edit');
    Route::post('/update', [categoryContoller::class, 'categoryUpdate'])->name('category.update');
    Route::get('/delete/{id}', [categoryContoller::class, 'categoryDelete'])->name('category.delete');


    // Admin SubCategory Route
    Route::get('/sub/view', [subCategoryController::class, 'subCategoryView'])->name('all.subCategory');
    Route::post('/sub/store', [subCategoryController::class, 'subCategoryStore'])->name('subcategory.store');
    Route::get('/sub/edit/{id}', [subCategoryController::class, 'subCategoryEdit'])->name('subcategory.edit');
    Route::post('/sub/update', [subCategoryController::class, 'subCategoryUpdate'])->name('subcategory.update');
    Route::get('/sub/delete/{id}', [subCategoryController::class, 'subCategoryDelete'])->name('subcategory.delete');

    // Admin Sub-SubCategory Route
    Route::get('/sub/sub/view', [subCategoryController::class, 'subsubCategoryView'])->name('all.subsubCategory');

    Route::get('/subcategory/ajax/{category_id}', [subCategoryController::class, 'getSubCategory']);
    Route::get('/subsubcategory/ajax/{subcategory_id}', [subCategoryController::class, 'getSubSubCategory']);
    Route::post('/sub/sub/store', [subCategoryController::class, 'subSubCategoryStore'])->name('subsubCategory.store');
    Route::get('sub/sub/edit/{id}', [subCategoryController::class, 'subSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('subsub/update/{id}', [subCategoryController::class, 'subsubUpdate'])->name('subsubCategory.update');
    Route::get('subsub/delete/{id}', [subCategoryController::class, 'subsubDelete'])->name('subsubcategory.delete');
});

//Product Route
Route::prefix('product')->group(function () {
    Route::get('/add', [ProductController::class, 'addProduct'])->name('add-product');
    Route::post('/store', [ProductController::class, 'storeProduct'])->name('store.product');
    Route::get('/manage', [ProductController::class, 'manageProduct'])->name('manage-product');
    Route::get('/edit/{id}', [ProductController::class, 'editProduct'])->name('product.edit');
    Route::post('/update', [ProductController::class, 'productUpdate'])->name('product.update');
    Route::post('/update/image', [ProductController::class, 'multiImageUpdate'])->name('update.image');
    Route::post('/update/thambnail', [ProductController::class, 'thambnailUpdate'])->name('update-product-thambnail');
    Route::get('/multiimg/delete/{id}', [ProductController::class, 'multiDelete'])->name('delete.multiimg');
    Route::get('/active/{id}', [ProductController::class, 'productActive'])->name('product.active');
    Route::get('/inactive/{id}', [ProductController::class, 'productInactive'])->name('product.inactive');
    Route::get('/delete/{id}', [ProductController::class, 'productDelete'])->name('product.delete');

});

//Slider route
Route::prefix('slider')->group(function () {
    Route::get('/view', [SliderController::class, 'sliderView'])->name('manage-slider');
    Route::post('/store', [SliderController::class, 'sliderStore'])->name('slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'sliderEdit'])->name('slider.edit');
    Route::post('/update', [SliderController::class, 'sliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'sliderDelete'])->name('slider.delete');
    Route::get('/inactive/{id}', [SliderController::class, 'slideInactive'])->name('slider.inactive');
    Route::get('/active/{id}', [SliderController::class, 'slideActive'])->name('slider.active');
});

Route::get('language/hindi', [LanguageController::class, 'hindi'])->name('hindi.language');
Route::get('language/english', [LanguageController::class, 'english'])->name('english.language');

//product details route
Route::get('/product/details/{id}', [IndexController::class, 'productDetails']);

Route::get('/product/tag/{tag}', [IndexController::class, 'tagProduct']);

//Subcategory wise data
Route::get('subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubcatWiseProduct']);

Route::get('subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'subSubcatWiseProduct']);

//product view modal
Route::get('/product/view/modal/{id}', [IndexController::class, 'productViewAjax']);
//Add to cart store
Route::post('/cart/data/store/{id}', [CartController::class, 'addToCart']);

Route::get('/product/mini/cart', [CartController::class, 'addMiniCart']);

Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'removeMiniCart']);

//Wishlist route group
Route::group(['prefix'=>'user', 'middleware' => ['user','auth'],'namespace'=>'user'], function(){
    Route::get('wishlist', [WishlistController::class, 'viewWishlist'])->name('wishlist');
    Route::get('/get-wishlist-product', [WishlistController::class, 'getWishlistProduct']);
    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'removeWishlist']);
    Route::post('/stripe/order', [StripeController::class, 'stripeOrder'])->name('stripe.order');
    Route::post('/cash/order', [CashController::class, 'cashOrder'])->name('cash.order');

    Route::get('/order-list', [AllUserController::class, 'orderList'])->name('order.list');
    Route::get('order-details/{order_id}', [AllUserController::class, 'orderDetails']);
    Route::get('/invoice/{order_id}', [AllUserController::class, 'invoice']);
});

Route::get('/user/mycart', [CartPageController::class, 'viewCart'])->name('mycart');
Route::get('/user/get-cart-product', [CartPageController::class, 'getCartProduct']);
Route::get('/user/cart-remove/{rowId}', [CartPageController::class, 'removeCartProduct']);
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'addToWishlist']);
Route::get('/cart-increment/{rowId}', [CartPageController::class, 'cartIncrement']);
Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'cartDecrement']);

//Coupons route
Route::prefix('coupons')->group(function () {
    Route::get('/view', [CouponController::class, 'couponView'])->name('manage-coupons');
    Route::post('/store', [CouponController::class, 'couponStore'])->name('coupon.store');
    Route::get('/edit/{id}', [CouponController::class, 'couponEdit'])->name('coupon.edit');
    Route::post('/update/{id}', [CouponController::class, 'couponUpdate'])->name('coupon.update');
    Route::get('/delete/{id}', [CouponController::class, 'couponDelete'])->name('coupon.delete');
    
});

//Shipping route
Route::prefix('shipping')->group(function () {
    Route::get('/view', [ShippingAreaController::class, 'divisionView'])->name('manage-division');
    Route::post('/store', [ShippingAreaController::class, 'divisionStore'])->name('division.store');
    Route::get('/edit/{id}', [ShippingAreaController::class, 'divisionEdit'])->name('division.edit');
    Route::post('/update/{id}', [ShippingAreaController::class, 'divisionUpdate'])->name('division.update');
    Route::get('/delete/{id}', [ShippingAreaController::class, 'divisionDelete'])->name('division.delete');

    //ship district route
    Route::get('/district/view', [ShippingAreaController::class, 'districtView'])->name('manage-district');
    Route::post('/district/store', [ShippingAreaController::class, 'districtStore'])->name('district.store');
    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'districtEdit'])->name('district.edit');
    Route::post('/district/update/{id}', [ShippingAreaController::class, 'districtUpdate'])->name('district.update');
    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'districtDelete'])->name('district.delete');

    //ship state route
    Route::get('/state/view', [ShippingAreaController::class, 'stateView'])->name('manage-state');
    Route::post('/state/store', [ShippingAreaController::class, 'stateStore'])->name('state.store');
    Route::get('/getdivision/ajax/{division_id}', [ShippingAreaController::class, 'getdivision']);
    Route::get('/state/edit/{id}', [ShippingAreaController::class, 'stateEdit'])->name('state.edit');
    Route::post('/district/update/{id}', [ShippingAreaController::class, 'districtUpdate'])->name('district.update');
    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'districtDelete'])->name('district.delete');

});

//coupon option 
Route::post('/coupon-apply', [CartController::class, 'applyCoupon']);
Route::get('/coupon-calculation', [CartController::class, 'couponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'couponRemove']);

//checkout route
Route::get('/checkout', [CartController::class, 'checkoutCreate'])->name('checkout');

Route::get('/district/ajax/{division_id}', [CartController::class, 'getDistrict']);

Route::get('/state/ajax/{district_id}', [CartController::class, 'getState']);

Route::post('checkout-store', [CartController::class, 'checkoutStore'])->name('checkout.store');






Route::get('/', [IndexController::class, 'index']);




Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');