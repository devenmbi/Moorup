<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\DressesDetails;
use App\Models\ProductDetails;
use App\Models\TopsDetails;
use App\Models\BottomsDetails;
use App\Models\CoordsDetails;
use App\Models\JacketsDetails;

class CategoryDetailsController extends Controller
{

    // === Dresses
    public function dresses(Request $request)
    { 
        $banner = DressesDetails::whereNull('deleted_by')->latest()->first();

        $categoryId = DB::table('master_product_category')
        ->whereNull('deleted_by')
        ->where('category_name', 'Dresses')
        ->value('id');

        $products = ProductDetails::whereNull('deleted_by')->where('category_id', $categoryId)->get();

        return view('frontend.category.dresses', compact('banner','products'));
    }


    // === Tops
    public function tops(Request $request)
    { 
        $banner = TopsDetails::whereNull('deleted_by')->latest()->first(); 
        
        $categoryId = DB::table('master_product_category')
        ->whereNull('deleted_by')
        ->where('category_name', 'Tops')
        ->value('id');

        $products = ProductDetails::whereNull('deleted_by')->where('category_id', $categoryId)->get();

        return view('frontend.category.tops', compact('banner','products'));
    }

    // === Bottoms
    public function bottoms(Request $request)
    { 
        $banner = BottomsDetails::whereNull('deleted_by')->latest()->first(); 
        
        $categoryId = DB::table('master_product_category')
        ->whereNull('deleted_by')
        ->where('category_name', 'Bottoms')
        ->value('id');

        $products = ProductDetails::whereNull('deleted_by')->where('category_id', $categoryId)->get();

        return view('frontend.category.bottoms', compact('banner','products'));
    }


     // === Coords
    public function coords(Request $request)
    { 
        $banner = CoordsDetails::whereNull('deleted_by')->latest()->first(); 
        
        $categoryId = DB::table('master_product_category')
        ->whereNull('deleted_by')
        ->where('category_name', 'Co-ord Set')
        ->value('id');
    

        $products = ProductDetails::whereNull('deleted_by')->where('category_id', $categoryId)->get();

        return view('frontend.category.coords', compact('banner','products'));
    }


     // === blazers/jackets
     public function blazers(Request $request)
     { 
         $banner = JacketsDetails::whereNull('deleted_by')->latest()->first(); 
         
         $categoryId = DB::table('master_product_category')
         ->whereNull('deleted_by')
         ->where('category_name', 'Blazers/Jackets')
         ->value('id');
     
 
         $products = ProductDetails::whereNull('deleted_by')->where('category_id', $categoryId)->get();
 
         return view('frontend.category.jackets', compact('banner','products'));
     }
    
}