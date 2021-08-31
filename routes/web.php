<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\NewsLetterController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\SEOController;
use App\Http\Controllers\Backend\ReportController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CurrencyController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\NewsLetterSubscriptionController;

use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CashController;


use App\Models\User;
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

Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});
//Admin Routes
Route::middleware(['auth:admin'])->group(function(){
    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
    
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/change/password', [AdminProfileController::class, 'AdminUpdateChangedPassword'])->name('admin.update.change.password');

});
// Admin Brands
Route::prefix('brand')->group(function(){
	Route::get('/all', [BrandController::class, 'DisplayBrands'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/update/{id}', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');

});
// Admin Categories
Route::prefix('category')->group(function(){
	Route::get('/all', [CategoryController::class, 'DisplayCategories'])->name('all.category');    
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
    
});
// Admin SubCategories
Route::prefix('category')->group(function(){
	Route::get('/sub/all', [SubCategoryController::class, 'DisplaySubCategories'])->name('all.subcategory'); 
    Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/sub/update/{id}', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');
});
// Admin SubSubCategories
Route::prefix('category')->group(function(){
	Route::get('/sub/sub/all', [SubCategoryController::class, 'DisplaySubSubCategories'])->name('all.subsubcategory'); 
	Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']); 
    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);

    Route::post('/sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
    Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('/sub/sub/update/{id}', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
    Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
});

// Admin Products
Route::prefix('product')->group(function(){
	Route::get('/add', [ProductController::class, 'AddProduct'])->name('add.product');
    Route::post('/store', [ProductController::class, 'ProductStore'])->name('product.store'); 
    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage.product'); 
    Route::get('/edit/{id}', [ProductController::class, 'ProductEdit'])->name('product.edit');
    Route::post('/update', [ProductController::class, 'ProductUpdate'])->name('product.update');
    Route::post('/update/image', [ProductController::class, 'MultiImageUpdate'])->name('product.update.image');
    Route::post('/update/thumbnail', [ProductController::class, 'ThumbnailImageUpdate'])->name('product.update.thumbnail');
    Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');

    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');

    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
});
// Admin Sliders
Route::prefix('slider')->group(function(){
    Route::get('/all', [SliderController::class, 'ManageSlider'])->name('all.slider'); 
    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store'); 
    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
    Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');

    Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
    Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');

});
// Admin Cupons
Route::prefix('coupon')->group(function(){
    Route::get('/manage/coupon', [CouponController::class, 'ManageCoupon'])->name('manage.coupon'); 
    Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store'); 
    Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
    Route::post('/update', [CouponController::class, 'CouponUpdate'])->name('coupon.update');
    Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');
});

// Admin Shipping 
Route::prefix('shipping')->group(function(){

    // Admin Shipping Division
    Route::get('/manage/division', [ShippingAreaController::class, 'DivisionView'])->name('manage.division'); 
    Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store'); 
    Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');
    Route::post('/division/update', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');
    Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');

    // Admin Shipping District
    Route::get('/manage/district', [ShippingAreaController::class, 'DistrictView'])->name('manage.district'); 
    Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store'); 
    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');
    Route::post('/district/update', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');
    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');
    
    // Admin Shipping State
    Route::get('/manage/state', [ShippingAreaController::class, 'StateView'])->name('manage.state'); 
    Route::post('/state/store', [ShippingAreaController::class, 'StateStore'])->name('state.store'); 
    Route::get('/state/edit/{id}', [ShippingAreaController::class, 'StateEdit'])->name('state.edit');
    Route::post('/state/update', [ShippingAreaController::class, 'StateUpdate'])->name('state.update');
    Route::get('/state/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state.delete');
	
    Route::get('/district/ajax/{division_id}', [ShippingAreaController::class, 'GetDistrict']);     
});
// Admin NewsLetters
Route::prefix('newsletter')->group(function(){
	Route::get('/all', [NewsLetterController::class, 'DisplayNewsLetter'])->name('all.newsletter');
    Route::get('/delete/{id}', [NewsLetterController::class, 'NewsLetterDelete'])->name('newsletter.delete');
    Route::post('/store', [NewsLetterSubscriptionController::class, 'NewsLetterStore'])->name('newsletter.store');
});
// Admin Orders
Route::prefix('order')->group(function(){
	Route::get('/pending', [OrderController::class, 'DisplayPendingOrder'])->name('all.pendingorder');
    Route::get('/payment-accept', [OrderController::class, 'DisplayPaymentedOrder'])->name('all.paymentedorder');
    Route::get('/cancel', [OrderController::class, 'DisplayCancelOrder'])->name('all.cancelorder');
    Route::get('/process/delivery', [OrderController::class, 'DisplayProcessDeliveryOrder'])->name('all.process.delivery');
    Route::get('/success/delivery', [OrderController::class, 'DisplayDeliverySuccessOrder'])->name('all.success.delivery');

    Route::get('/details/{order_id}', [OrderController::class, 'OrderDetails'])->name('view.orderdetails');

	Route::get('/payment-accept/{order_id}', [OrderController::class, 'PaymentAccept'])->name('payment.accept');
	Route::get('/cancel-order/{order_id}', [OrderController::class, 'CancelOrder'])->name('cancel.order');
    Route::get('/process-delivery/{order_id}', [OrderController::class, 'DeliveryProcess'])->name('process.delivery');
    Route::get('/delivery-success/{order_id}', [OrderController::class, 'DeliverySuccess'])->name('success.delivery');

});
// Admin SEO Settings
Route::prefix('SEO')->group(function(){
    Route::get('/edit', [SEOController::class, 'SEOEdit'])->name('seo.edit');
    Route::post('/update', [SEOController::class, 'SEOUpdate'])->name('seo.update');
});
// Admin ReportsRoutes
Route::prefix('report')->group(function(){
    Route::get('/today-order', [ReportController::class, 'TodayOrder'])->name('today.order');
    Route::get('/today-delivery', [ReportController::class, 'TodayDelivery'])->name('today.delivery');
    Route::get('/this-month-order', [ReportController::class, 'ThisMonth'])->name('this.month');
    Route::get('/search', [ReportController::class, 'SearchReport'])->name('search.report');

    Route::post('/search-by-year', [ReportController::class, 'SearchByYear'])->name('search.by.year');

});
//Frontend All Routes//
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

//User Routes
Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('user.change.password');
Route::post('/update/change/password', [IndexController::class, 'UserUpdateChangedPassword'])->name('update.change.password');

//Multi Language Routes
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');
Route::get('/language/myanmar', [LanguageController::class, 'Myanmar'])->name('myanmar.language');

//Multi Language Routes
Route::get('/currency/usd', [CurrencyController::class, 'USD'])->name('usd.currency');
Route::get('/currency/kyat', [CurrencyController::class, 'KYAT'])->name('kyat.currency');

//Product Detail Routes
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);

//Product Tags Routes
Route::get('/product/tags/{tag}', [IndexController::class, 'TagWiseProduct']);

//Subcategory Wise Routes
Route::get('/subcategory/product/{subcategory_id}/{slug}', [IndexController::class, 'SubCategoryWiseProduct']);

//SubSubcategory Wise Routes
Route::get('/subsubcategory/product/{subsubcategory_id}/{slug}', [IndexController::class, 'SubSubCategoryWiseProduct']);

//Product view modal with Ajax Routes
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

//Add to Cart Routes
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

//Mini Cart Get Data Routes
Route::get('/product/mini/card/', [CartController::class, 'AddMiniCart']);

//Add to Cart Routes
Route::get('/minicard/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

//Add to Wishlist Routes
Route::post('/add-to-wishlist/{product_id}', [WishlistController::class, 'AddToWishlist']);

//Wishlist, Cart, Checkout in Header section(Can only access after login)
Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){
    Route::get('/wishlist', [WishlistController::class, 'DisplayWishlists'])->name('wishlist');
    Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
    Route::get('/wishlist/product-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);

    Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');
    Route::get('/get-cart-product', [CartPageController::class, 'GetCartProduct']);
    Route::get('/card/product-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);
    Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);
    Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);

    //Checkout Route
    Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

    //Stripe Payment Route
    Route::post('/payment/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');

    //Cash on Delivery Payment Route
    Route::post('/payment/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');

    //User Order Routes
    Route::get('/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');
    Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);

    //Order Tracking Route
    Route::get('/track/order-view', [AllUserController::class, 'TrackOrderView'])->name('track.order');
    Route::post('/order/tracking', [AllUserController::class, 'OrderTracking'])->name('order.tracking');

});
//Coupon Routes
Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

//Checkout Routes for binding Division, District, State
Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'GetDistrict']); 
Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'GetState']); 
Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.info.store');