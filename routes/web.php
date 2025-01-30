<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Backend\UserDetailsController;
use App\Http\Controllers\Backend\UserPermissionsController;
use App\Http\Controllers\Backend\CollectionsController;
use App\Http\Controllers\Backend\ProductCategoryController;
use App\Http\Controllers\Backend\ProductFabricsController;
use App\Http\Controllers\Backend\FabricCompositionController;
use App\Http\Controllers\Backend\ProductSizesController;
use App\Http\Controllers\Backend\ProductPrintsController;
use App\Http\Controllers\Backend\ProductDetailsController;
use App\Http\Controllers\Backend\SEOController;
use App\Http\Controllers\Backend\Home\BannerDetailsController;
use App\Http\Controllers\Backend\Home\NewArrivalsController;
use App\Http\Controllers\Backend\Home\CollectionDetailsController;
use App\Http\Controllers\Backend\Home\ShopByCategoryController;
use App\Http\Controllers\Backend\Home\ProductPoliciesController;
use App\Http\Controllers\Backend\Home\TestimonialsController;
use App\Http\Controllers\Backend\Home\SocialMediaController;
use App\Http\Controllers\Backend\Home\FooterController;
use App\Http\Controllers\Backend\Category\DressesController;
use App\Http\Controllers\Backend\Category\TopsController;
use App\Http\Controllers\Backend\Category\BottomsController;
use App\Http\Controllers\Backend\Category\CoordsController;
use App\Http\Controllers\Backend\Category\JacketsController;


use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CategoryDetailsController;


// =========================================================================== Backend Routes

// Route::get('/', function () {
//     return view('frontend.index');
// });
  
// Authentication Routes
Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::get('/change-password', [LoginController::class, 'change_password'])->name('admin.changepassword');
Route::post('/update-password', [LoginController::class, 'updatePassword'])->name('admin.updatepassword');

Route::get('/register', [LoginController::class, 'register'])->name('admin.register');
Route::post('/register', [LoginController::class, 'authenticate_register'])->name('admin.register.authenticate');
    
// Admin Routes with Middleware
Route::group(['middleware' => ['auth:web', \App\Http\Middleware\PreventBackHistoryMiddleware::class]], function () {
        Route::get('/dashboard', function () {
            return view('backend.dashboard'); 
        })->name('admin.dashboard');
});

// ==== Manage User List in User Management
Route::resource('user-list', UserDetailsController::class);
Route::post('/update-status', [UserDetailsController::class, 'updateStatus'])->name('update.status');

// ==== Manage User Permissions in User Management
Route::resource('user-permissions', UserPermissionsController::class);

// ==== Manage Collections in Store Management
Route::resource('collections', CollectionsController::class);

// ==== Manage category in Store Management
Route::resource('product-category', ProductCategoryController::class);

// ==== Manage fabrics in Store Management
Route::resource('product-fabrics', ProductFabricsController::class);

// ==== Manage composition in Store Management
Route::resource('fabric-composition', FabricCompositionController::class);

// ==== Manage Sizes in Store Management
Route::resource('product-sizes', ProductSizesController::class);

// ==== Manage prints in Store Management
Route::resource('product-prints', ProductPrintsController::class);

// ==== Manage product details in Store Management
Route::resource('product-details', ProductDetailsController::class);



// ==== Manage Banner Details in Home
Route::resource('banner-details', BannerDetailsController::class);

// ==== Manage New Arrival in Home
Route::resource('new-arrivals', NewArrivalsController::class);

// ==== Manage Collection Details in Home
Route::resource('collection-details', CollectionDetailsController::class);

// ==== Manage Shop By Category in Home
Route::resource('shop-category', ShopByCategoryController::class);

// ==== Manage Product Policies in Home
Route::resource('product-policies', ProductPoliciesController::class);

// ==== Manage Testimonials in Home
Route::resource('testimonials', TestimonialsController::class);

// ==== Manage Social Media Details in Home
Route::resource('social-media', SocialMediaController::class);

// ==== Manage Footer in Home
Route::resource('footer', FooterController::class);



// ==== Manage Dresses in Category Page
Route::resource('dresses', DressesController::class);

// ==== Manage  Tops in Category Page
Route::resource('tops', TopsController::class);

// ==== Manage  Bottoms in Category Page
Route::resource('bottoms', BottomsController::class);

// ==== Manage  Co-ords in Category Page
Route::resource('co-ords', CoordsController::class);

// ==== Manage Blazers/Jackets in Category Page
Route::resource('jackets', JacketsController::class);


// ==== Manage Add SEO Tags in SEO
Route::resource('seo-tags', SEOController::class);


// ======================= Frontend
Route::group(['prefix'=> '', 'middleware'=>[\App\Http\Middleware\PreventBackHistoryMiddleware::class]],function(){

    // ==== Home
    Route::get('/', [HomeController::class, 'home'])->name('frontend.index');

    // ==== Category Pages
    Route::get('/category-dresses', [CategoryDetailsController::class, 'dresses'])->name('frontend.dresses');

    // ==== Category Pages
    Route::get('/category-tops', [CategoryDetailsController::class, 'tops'])->name('frontend.tops');

    // ==== Category Pages
    Route::get('/category-bottoms', [CategoryDetailsController::class, 'bottoms'])->name('frontend.bottoms');

    // ==== Category Pages
    Route::get('/category-co-ord-set', [CategoryDetailsController::class, 'coords'])->name('frontend.coords');

    // ==== Category Pages
    Route::get('/category-blazersjackets', [CategoryDetailsController::class, 'blazers'])->name('frontend.blazers');

    //===== Detailed Product Page
    Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');


    
});