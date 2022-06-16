<?php

use app\Models\User;
use App\Models\Slider;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\brandController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\categoryContoller;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\frontend\LanguageController;
use App\Http\Controllers\backend\subCategoryController;
use App\Http\Controllers\Backend\AdminProfileController;

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




Route::get('/', [IndexController::class, 'index']);




Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');