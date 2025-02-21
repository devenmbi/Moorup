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
use App\Models\ProductSizes;

class CategoryDetailsController extends Controller
{


    public function category_details(Request $request, $slug)
    { 
        // Fetch category ID based on the slug from the URL
        $category = DB::table('master_product_category')
            ->whereNull('deleted_by')
            ->where('slug', $slug)
            ->first();
    
        if (!$category) {
            abort(404); 
        }
    
        // Fetch banner for the category
        $banner = DressesDetails::whereNull('deleted_by')->latest()->first();
    
        // Fetch products under the fetched category
        $products = ProductDetails::whereNull('deleted_by')
            ->where('category_id', $category->id)
            ->get();
    
        // Fetch price range for the category
        $priceRange = ProductDetails::whereNull('deleted_by')
            ->where('category_id', $category->id)
            ->selectRaw('MIN(CAST(REPLACE(product_price, ",", "") AS UNSIGNED)) as min_price, 
                         MAX(CAST(REPLACE(product_price, ",", "") AS UNSIGNED)) as max_price')
            ->first();
    
        // Get available sizes from master_product_size
        $sizes = ProductSizes::whereNull('deleted_by')->pluck('size');
    
        // Get stock availability count
        $inStockCount = ProductDetails::whereNull('deleted_by')
            ->where('category_id', $category->id)
            ->where('available_quantity', '>', 0)
            ->count();
    
        $outStockCount = ProductDetails::whereNull('deleted_by')
            ->where('category_id', $category->id)
            ->where('available_quantity', '=', 0)
            ->count();
    
        return view('frontend.category-details', compact(
            'category',
            'banner', 
            'products', 
            'priceRange', 
            'sizes', 
            'inStockCount', 
            'outStockCount'
        ));
    }
    



    // === Dresses
    public function dresses(Request $request)
    { 
        $banner = DressesDetails::whereNull('deleted_by')->latest()->first();

        $categoryId = DB::table('master_product_category')
        ->whereNull('deleted_by')
        ->where('category_name', 'Dresses')
        ->value('id');

        $products = ProductDetails::whereNull('deleted_by')->where('category_id', $categoryId)->get();


        // For FIlter Data fethcing

        $priceRange = ProductDetails::whereNull('deleted_by')
        ->where('category_id', $categoryId)
        ->selectRaw('MIN(CAST(REPLACE(product_price, ",", "") AS UNSIGNED)) as min_price, 
                     MAX(CAST(REPLACE(product_price, ",", "") AS UNSIGNED)) as max_price')
        ->first();

        // Get available sizes from master_product_size
        $sizes = ProductSizes::whereNull('deleted_by')->pluck('size');

        // Get stock availability count
        $inStockCount = ProductDetails::whereNull('deleted_by')
        ->where('category_id', $categoryId)
        ->where('available_quantity', '>', 0)
        ->count();

        $outStockCount = ProductDetails::whereNull('deleted_by')
        ->where('category_id', $categoryId)
        ->where('available_quantity', '=', 0)
        ->count();

        return view('frontend.category.dresses', compact(
        'banner', 
        'products', 
        'priceRange', 
        'sizes', 
        'inStockCount', 
        'outStockCount'
        ));
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


         // For FIlter Data fethcing

         $priceRange = ProductDetails::whereNull('deleted_by')
         ->where('category_id', $categoryId)
         ->selectRaw('MIN(CAST(REPLACE(product_price, ",", "") AS UNSIGNED)) as min_price, 
                      MAX(CAST(REPLACE(product_price, ",", "") AS UNSIGNED)) as max_price')
         ->first();
 
         // Get available sizes from master_product_size
         $sizes = ProductSizes::whereNull('deleted_by')->pluck('size');
 
         // Get stock availability count
         $inStockCount = ProductDetails::whereNull('deleted_by')
         ->where('category_id', $categoryId)
         ->where('available_quantity', '>', 0)
         ->count();
 
         $outStockCount = ProductDetails::whereNull('deleted_by')
         ->where('category_id', $categoryId)
         ->where('available_quantity', '=', 0)
         ->count();

        return view('frontend.category.tops', compact('banner','products','priceRange', 
        'sizes', 
        'inStockCount', 
        'outStockCount'));
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


        // For FIlter Data fethcing

        $priceRange = ProductDetails::whereNull('deleted_by')
        ->where('category_id', $categoryId)
        ->selectRaw('MIN(CAST(REPLACE(product_price, ",", "") AS UNSIGNED)) as min_price, 
                     MAX(CAST(REPLACE(product_price, ",", "") AS UNSIGNED)) as max_price')
        ->first();

        // Get available sizes from master_product_size
        $sizes = ProductSizes::whereNull('deleted_by')->pluck('size');

        // Get stock availability count
        $inStockCount = ProductDetails::whereNull('deleted_by')
        ->where('category_id', $categoryId)
        ->where('available_quantity', '>', 0)
        ->count();

        $outStockCount = ProductDetails::whereNull('deleted_by')
        ->where('category_id', $categoryId)
        ->where('available_quantity', '=', 0)
        ->count();

        return view('frontend.category.bottoms', compact('banner','products','priceRange', 
        'sizes', 
        'inStockCount', 
        'outStockCount'));
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


          // For FIlter Data fethcing

          $priceRange = ProductDetails::whereNull('deleted_by')
          ->where('category_id', $categoryId)
          ->selectRaw('MIN(CAST(REPLACE(product_price, ",", "") AS UNSIGNED)) as min_price, 
                       MAX(CAST(REPLACE(product_price, ",", "") AS UNSIGNED)) as max_price')
          ->first();
  
          // Get available sizes from master_product_size
          $sizes = ProductSizes::whereNull('deleted_by')->pluck('size');
  
          // Get stock availability count
          $inStockCount = ProductDetails::whereNull('deleted_by')
          ->where('category_id', $categoryId)
          ->where('available_quantity', '>', 0)
          ->count();
  
          $outStockCount = ProductDetails::whereNull('deleted_by')
          ->where('category_id', $categoryId)
          ->where('available_quantity', '=', 0)
          ->count();

        return view('frontend.category.coords', compact('banner','products','priceRange', 
        'sizes', 
        'inStockCount', 
        'outStockCount'));
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


            // For FIlter Data fethcing

            $priceRange = ProductDetails::whereNull('deleted_by')
            ->where('category_id', $categoryId)
            ->selectRaw('MIN(CAST(REPLACE(product_price, ",", "") AS UNSIGNED)) as min_price, 
                         MAX(CAST(REPLACE(product_price, ",", "") AS UNSIGNED)) as max_price')
            ->first();
    
            // Get available sizes from master_product_size
            $sizes = ProductSizes::whereNull('deleted_by')->pluck('size');
    
            // Get stock availability count
            $inStockCount = ProductDetails::whereNull('deleted_by')
            ->where('category_id', $categoryId)
            ->where('available_quantity', '>', 0)
            ->count();
    
            $outStockCount = ProductDetails::whereNull('deleted_by')
            ->where('category_id', $categoryId)
            ->where('available_quantity', '=', 0)
            ->count();
 
         return view('frontend.category.jackets', compact('banner','products','priceRange', 
         'sizes', 
         'inStockCount', 
         'outStockCount'));
     }
    
}