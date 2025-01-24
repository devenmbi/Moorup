<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;
use App\Models\User;
use App\Models\ProductDetails;
use App\Models\ProductCategory;
use App\Models\FabricsComposition;
use App\Models\ProductFabrics;


class ProductDetailsController extends Controller
{

    public function index()
    {
        return view('backend.products.product-details.index');
    }

    public function create(Request $request)
    { 
        $categories = ProductCategory::all();
        $fabric_composition = FabricsComposition::all();
        $product_fabric = ProductFabrics::all();
        return view('backend.products.product-details.create', compact('categories','fabric_composition','product_fabric'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'style_code' => 'required|string|max:255',
            'look_name' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'product_category' => 'required|exists:categories,id',
            'fabric_composition' => 'required|exists:fabric_compositions,id',
            'product_fabric' => 'required|exists:product_fabrics,id',
            'product_price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'thumbnail_image' => 'required|array',
            'thumbnail_image.*' => 'mimes:jpg,jpeg,png,webp|max:2048', 
            'gallery_image' => 'required|array', 
            'gallery_image.*' => 'mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'style_code.required' => 'The product style code is required.',
            'look_name.required' => 'The full look name is required.',
            'product_name.required' => 'The product name is required.',
            'product_category.required' => 'The product category is required.',
            'fabric_composition.required' => 'The fabric composition is required.',
            'product_fabric.required' => 'The product fabric is required.',
            'product_price.required' => 'The product price is required.',
            'product_price.numeric' => 'The product price must be a number.',
            'description.required' => 'The product description is required.',
            'thumbnail_image.required' => 'Please upload at least one thumbnail image.',
            'thumbnail_image.array' => 'The thumbnail image must be an array.',
            'thumbnail_image.*.mimes' => 'Only jpg, jpeg, png, and webp formats are allowed for thumbnail images.',
            'thumbnail_image.*.max' => 'Each thumbnail image must be less than 2MB.',
            'gallery_image.*.mimes' => 'Only jpg, jpeg, png, and webp formats are allowed for gallery images.',
            'gallery_image.*.max' => 'Each gallery image must be less than 2MB.',
        ]);

        $product = new ProductDetails();
        $product->style_code = $request->style_code;
        $product->look_name = $request->look_name;
        $product->product_name = $request->product_name;
        $product->category_id = $request->product_category;
        $product->fabric_composition_id = $request->fabric_composition;
        $product->product_fabric_id = $request->product_fabric;
        $product->product_price = $request->product_price;
        $product->description = $request->description;

        if ($request->hasFile('thumbnail_image')) {
            $thumbnails = [];
            foreach ($request->file('thumbnail_image') as $image) {
                if ($image->isValid()) {
                    $extension = $image->getClientOriginalExtension();
                    $new_name = time() . rand(10, 999) . '.' . $extension;
                    $image->move(public_path('/murupp/product/thumbnails'), $new_name);
                    $image_path = "/murupp/product/thumbnails/" . $new_name;
                    $thumbnails[] = $image_path; 
                }
            }
            $product->thumbnail_image = json_encode($thumbnails); 
        }

  
        $product->save();
        if ($request->hasFile('gallery_image')) {
            $galleryImages = [];
            foreach ($request->file('gallery_image') as $image) {
                if ($image->isValid()) {
                    $extension = $image->getClientOriginalExtension();
                    $new_name = time() . rand(10, 999) . '.' . $extension;
                    $image->move(public_path('/murupp/product/gallery'), $new_name);
                    $image_path = "/murupp/product/gallery/" . $new_name;
                    $galleryImages[] = $image_path; 
                }
            }
            $product->gallery_images = json_encode($galleryImages); 
        }
        return redirect()->route('product-details.index')->with('success', 'Product has been successfully added!.');
    }

}