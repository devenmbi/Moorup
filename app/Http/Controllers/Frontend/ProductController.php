<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\ProductDetails;
use App\Models\ProductCategory;
use App\Models\DressesDetails;


class ProductController extends Controller
{

    public function show($slug)
    {
        $product = ProductDetails::where('slug', $slug)->whereNull('deleted_at')->firstOrFail();
        $category = ProductCategory::find($product->category_id);
        $imageTitle = optional($category)->image_title ?? '';

        return view('frontend.product-detail', compact('product', 'category'));
    }
    
     
}
