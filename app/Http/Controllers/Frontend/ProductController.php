<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\ProductDetails;
use App\Models\ProductCategory;
use App\Models\DressesDetails;
use App\Models\ProductSizes;


class ProductController extends Controller
{

    public function show($slug)
    {
        $product = ProductDetails::where('slug', $slug)->whereNull('deleted_at')->firstOrFail();
        $category = ProductCategory::find($product->category_id);
        $imageTitle = optional($category)->image_title ?? '';
    
        // Fetch gallery images
        $galleryImages = json_decode($product->gallery_images, true) ?? [];
    
        // Fetch all size data and structure it for the table
        $sizeCharts = ProductSizes::all()->whereNull('deleted_at')->groupBy('size'); 
    
        return view('frontend.product-detail', compact('product', 'category', 'galleryImages', 'sizeCharts'));
    }
    
    
    

    
     
}
