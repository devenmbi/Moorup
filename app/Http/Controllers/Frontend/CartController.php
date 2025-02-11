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
        $quantityToAdd = (int) $request->query('quantity', 1); 

        $existingCart = Carts::where('user_id', $userId)
                            ->where('product_id', $id)
                            ->first();

        if ($existingCart) {
            // If product exists in cart, increase the quantity
            $existingCart->increment('quantity', $quantityToAdd);
            $existingCart->update([
                'modified_at' => Carbon::now(),
                'modified_by' => $userId,
            ]);
        } else {
            // If product is not in cart, create a new entry with selected quantity
            Carts::create([
                'user_id' => $userId,
                'product_id' => $id,
                'quantity' => $quantityToAdd,
                'inserted_at' => Carbon::now(),
                'inserted_by' => $userId,
            ]);
        }

        return redirect()->back()->with('message', 'Product added to Cart!');
    }

}