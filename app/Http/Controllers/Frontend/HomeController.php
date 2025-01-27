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
        $newArrivals = NewArrival::whereNull('deleted_at')->orderBy('created_at', 'asc')->get(); 
        $collectionDetail = CollectionDetail::whereNull('deleted_at')->orderBy('created_at', 'asc')->first(); 
        $shopCategories = ShopCategory::whereNull('deleted_at')->orderBy('created_at', 'asc')->get();
        $productPolicies = ProductPolicy::whereNull('deleted_at')->orderBy('created_at', 'asc')->get(); 
        $testimonials = Testimonial::whereNull('deleted_at')->orderBy('created_at', 'asc')->get(); 
        $socialMedia = SocialMedia::whereNull('deleted_at')->orderBy('created_at', 'asc')->first(); 

        return view('frontend.index', compact('banners','newArrivals','collectionDetail','shopCategories','productPolicies','testimonials','socialMedia'));
    }
    
}