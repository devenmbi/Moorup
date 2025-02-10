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
use App\Models\ProductFabrics;
use App\Models\FabricsComposition;


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
        $fabric = ProductFabrics::where('id', $product->product_fabric_id)->value('fabrics_name');
    
        // Fetch fabric composition from master_fabrics_composition
        $fabricComposition = FabricsComposition::where('id', $product->fabric_composition_id)->value('composition_name');
    
        // Fetch related products (same category but exclude current product)
        $relatedProducts = ProductDetails::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id) 
            ->whereNull('deleted_at')
            ->take(5) 
            ->get();
    
        return view('frontend.product-detail', compact(
            'product', 'category', 'galleryImages', 'sizeCharts', 'fabric', 'fabricComposition', 'relatedProducts'
        ));
    }
    
    
    

}
