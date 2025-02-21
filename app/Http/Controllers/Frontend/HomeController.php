<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\BannerDetails;
use App\Models\NewArrival;
use App\Models\CollectionDetail;
use App\Models\ShopCategory;
use App\Models\ProductPolicy;
use App\Models\Testimonial;
use App\Models\SocialMedia;
use App\Models\Footer;


class HomeController extends Controller
{

    // === Home
    public function home(Request $request)
    {
        $banners = BannerDetails::whereNull('deleted_at')->orderBy('created_at', 'asc')->get();
        $newArrivals = NewArrival::whereNull('new_arrivals.deleted_at')
                                ->leftJoin('product_details', 'product_details.id', '=', 'new_arrivals.product_name')
                                ->select(
                                    'new_arrivals.*', 
                                    'product_details.id as product_id', 
                                    'product_details.product_name', 
                                    'product_details.slug'
                                )
                                ->orderBy('new_arrivals.created_at', 'asc')
                                ->get();
    
        $collectionDetail = CollectionDetail::whereNull('deleted_at')->orderBy('created_at', 'asc')->first(); 
        $productPolicies = ProductPolicy::whereNull('deleted_at')->orderBy('created_at', 'asc')->get(); 
        $testimonials = Testimonial::whereNull('deleted_at')->orderBy('created_at', 'asc')->get(); 
        $socialMedia = SocialMedia::whereNull('deleted_at')->orderBy('created_at', 'asc')->first(); 

        $shopCategories = DB::table('home_shop_category')
                        ->whereNull('home_shop_category.deleted_at')
                        ->leftJoin('master_product_category', 'master_product_category.id', '=', 'home_shop_category.image_title')
                        ->select(
                            'home_shop_category.*',
                            'master_product_category.slug',
                            'master_product_category.category_name'
                        )
                        ->orderBy('home_shop_category.created_at', 'asc')
                        ->get();
    
        return view('frontend.index', compact('banners','newArrivals','collectionDetail','shopCategories','productPolicies','testimonials','socialMedia'));
    }
    
}