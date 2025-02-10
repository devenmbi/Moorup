<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\ProductDetails;


class ProductController extends Controller
{

     // === Product Details
     public function show(Request $request)
     {
         $details = ProductDetails::whereNull('deleted_at')->orderBy('created_at', 'asc')->get();
        
         return view('frontend.product-detail', compact('details'));
     }
     
}
