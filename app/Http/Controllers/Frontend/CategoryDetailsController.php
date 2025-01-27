<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\DressesDetails;
use App\Models\ProductDetails;


class CategoryDetailsController extends Controller
{

    // === Home
    public function index(Request $request)
    { 
        $banner = DressesDetails::latest()->first(); 
        
        $categoryId = DB::table('master_product_category')
        ->where('category_name', 'Dresses')
        ->value('id');

        $products = ProductDetails::where('category_id', $categoryId)->get();

        return view('frontend.category.dresses', compact('banner','products'));
    }
    
}