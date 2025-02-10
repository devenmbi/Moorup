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
        $sizeCharts = ProductSizes::whereNull('deleted_at')->get()->groupBy('size');
    
        // Fetch fabric name from master_product_fabrics
        $fabric = DB::table('master_product_fabrics')
                    ->where('id', $product->product_fabric_id)
                    ->value('fabrics_name');
    
        // Fetch fabric composition from master_fabrics_composition
        $fabricComposition = DB::table('master_fabrics_composition')
                               ->where('id', $product->fabric_composition_id)
                               ->value('composition_name');
    
        return view('frontend.product-detail', compact('product', 'category', 'galleryImages', 'sizeCharts', 'fabric', 'fabricComposition'));
    }
    
    
    
    

    
     
}
