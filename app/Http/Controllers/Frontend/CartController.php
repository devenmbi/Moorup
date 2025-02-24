<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\ProductDetails;
use App\Models\Carts;


class CartController extends Controller
{

    public function add($id, Request $request)
    {
        $product = ProductDetails::find($id);
    
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        $userId = Auth::id();
        $quantityToAdd = $request->input('quantity');
        $selectedColor = $request->input('color1');
        $selectedPrint = $request->input('print_option');
        $selectedSize = $request->input('size');
        $productPrice = (float) str_replace(',', '', $request->input('product_price', '0'));
        $productImage = $request->input('product_image', null);
        $productImage = str_replace(url('/'), '', $productImage); 

        $totalPrice = $productPrice * $quantityToAdd;

        $existingCart = Carts::where('user_id', $userId)
                            ->where('product_id', $id)
                            ->where('colors', $selectedColor)
                            ->where('print', $selectedPrint)
                            ->where('size', $selectedSize)
                            ->first();
    
        if ($existingCart) {
            $existingCart->increment('quantity', $quantityToAdd);
            $existingCart->update([
                'product_total_price' => $existingCart->quantity * $productPrice,
                'product_image' => $productImage,
                'modified_at' => Carbon::now(),
                'modified_by' => $userId,
            ]);
        } else {
            // If product is not in cart, create a new entry with selected options
            Carts::create([
                'user_id' => $userId,
                'product_id' => $id,
                'quantity' => $quantityToAdd,
                'colors' => $selectedColor,
                'print' => $selectedPrint,
                'size' => $selectedSize,
                'product_image' => $productImage,
                'product_total_price' => $totalPrice,
                'payment_status' => 1,
                'inserted_at' => Carbon::now(),
                'inserted_by' => $userId,
            ]);
        }
    
        return redirect()->back()->with('message', 'Product added to Cart!');
    }
}