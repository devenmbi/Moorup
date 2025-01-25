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
use App\Models\MasterCollections;


class ProductDetailsController extends Controller
{

    public function index()
    {
        $productDetails = ProductDetails::leftJoin('users', 'product_details.created_by', '=', 'users.id')
                                ->leftJoin('master_collections', 'product_details.collection_id', '=', 'master_collections.id')
                                ->whereNull('product_details.deleted_by')
                                ->select(
                                    'product_details.*', 
                                    'users.name as creator_name', 
                                    'master_collections.collection_name'
                                )
                                ->get();
                                // dd($productDetails);
        return view('backend.products.product-details.index', compact('productDetails'));
    }

    public function create(Request $request)
    { 
        $categories = ProductCategory::whereNull('deleted_by')->get();
        $fabric_composition = FabricsComposition::whereNull('deleted_by')->get();
        $product_fabric = ProductFabrics::whereNull('deleted_by')->get();
        $collections = MasterCollections::whereNull('deleted_by')->get();
        return view('backend.products.product-details.create', compact('categories','fabric_composition','product_fabric','collections'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'style_code' => 'required|string|max:255',
            'look_name' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'collection_name' => 'required|exists:master_collections,id',
            'product_category' => 'required|exists:master_product_category,id',
            'fabric_composition' => 'required|exists:master_fabrics_composition,id',
            'product_fabric' => 'required|exists:master_product_fabrics,id',
            'product_price' => 'required|string|min:0',
            'description' => 'required',
            'thumbnail_image' => 'required|array',
            'thumbnail_image.*' => 'max:3072', 
            'gallery_image' => 'nullable|array',
            'gallery_image.*' => 'max:3072', 
        ], [
            'style_code.required' => 'The product style code is required.',
            'look_name.required' => 'The full look name is required.',
            'product_name.required' => 'The product name is required.',
            'collection_name.required' => 'The collection name is required.',
            'product_category.required' => 'The product category is required.',
            'fabric_composition.required' => 'The fabric composition is required.',
            'product_fabric.required' => 'The product fabric is required.',
            'product_price.required' => 'The product price is required.',
            'description.required' => 'The product description is required.',
            'thumbnail_image.required' => 'Please upload at least one thumbnail image.',
            'thumbnail_image.array' => 'The thumbnail image must be an array.',
            'thumbnail_image.*.max' => 'Each thumbnail image must be less than 3MB.',
            'gallery_image.*.max' => 'Each gallery image must be less than 3MB.',
        ]);

        $slug = Str::slug($request->product_name, '-');
        $product = new ProductDetails();

        $product->style_code = $request->style_code;
        $product->look_name = $request->look_name;
        $product->product_name = $request->product_name;
        $product->category_id = $request->product_category;
        $product->fabric_composition_id = $request->fabric_composition;
        $product->collection_id = $request->collection_name;
        $product->product_fabric_id = $request->product_fabric;
        $product->product_price = $request->product_price;
        $product->description = $request->description;
        $product->slug = $slug;
        $product->created_at = Carbon::now();
        $product->created_by = Auth::user()->id;
    
        // Handle thumbnail image upload
        if ($request->hasFile('thumbnail_image')) {
            $thumbnails = [];
            foreach ($request->file('thumbnail_image') as $image) {
                if ($image->isValid()) {
                    $extension = $image->getClientOriginalExtension();
                    $new_name = time() . rand(10, 999) . '.' . $extension;
                    $image->move(public_path('/murupp/product/thumbnails'), $new_name);
                    $image_path = "/murupp/product/thumbnails/" . $new_name;
                    $thumbnails[] = $new_name; 
                }
            }
            $product->thumbnail_image = json_encode($thumbnails); 
        }
    
        // Handle gallery image upload
        if ($request->hasFile('gallery_image')) {
            $galleryImages = [];
            foreach ($request->file('gallery_image') as $image) {
                if ($image->isValid()) {
                    $extension = $image->getClientOriginalExtension();
                    $new_name = time() . rand(10, 999) . '.' . $extension;
                    $image->move(public_path('/murupp/product/gallery'), $new_name);
                    $image_path = "/murupp/product/gallery/" . $new_name;
                    $galleryImages[] = $new_name; 
                }
            }
            $product->gallery_images = json_encode($galleryImages); 
        }
    
        $product->save();

        return redirect()->route('product-details.index')->with('message', 'Product has been successfully added!');
    }
    

    public function edit($id)
    {
        $product_details = ProductDetails::findOrFail($id);
        $categories = ProductCategory::whereNull('deleted_by')->get();
        $fabric_composition = FabricsComposition::whereNull('deleted_by')->get();
        $product_fabric = ProductFabrics::whereNull('deleted_by')->get();
        $collections = MasterCollections::whereNull('deleted_by')->get();
        // $thumbnails = json_decode($product_details->thumbnail_image, true);
        $galleryImages = json_decode($product_details->gallery_images, true);
        return view('backend.products.product-details.edit', compact('product_details','categories','fabric_composition','product_fabric','collections','galleryImages'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        // Validate the input
        $request->validate([
            'style_code' => 'required|string|max:255',
            'look_name' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'collection_name' => 'required|exists:master_collections,id',
            'product_category' => 'required|exists:master_product_category,id',
            'fabric_composition' => 'required|exists:master_fabrics_composition,id',
            'product_fabric' => 'required|exists:master_product_fabrics,id',
            'product_price' => 'required|string|min:0',
            'description' => 'required',
            'thumbnail_image' => 'nullable|array',
            'thumbnail_image.*' => 'max:3072',
            'gallery_image' => 'nullable|array',
            'gallery_image.*' => 'max:3072',
        ], [
            'style_code.required' => 'The product style code is required.',
            'look_name.required' => 'The full look name is required.',
            'product_name.required' => 'The product name is required.',
            'collection_name.required' => 'The collection name is required.',
            'product_category.required' => 'The product category is required.',
            'fabric_composition.required' => 'The fabric composition is required.',
            'product_fabric.required' => 'The product fabric is required.',
            'product_price.required' => 'The product price is required.',
            'description.required' => 'The product description is required.',
            'thumbnail_image.array' => 'The thumbnail image must be an array.',
            'thumbnail_image.*.max' => 'Each thumbnail image must be less than 3MB.',
            'gallery_image.*.max' => 'Each gallery image must be less than 3MB.',
        ]);
        
        // Find the existing product
        $product = ProductDetails::findOrFail($id);
    
        // Update product details
        $product->style_code = $request->style_code;
        $product->look_name = $request->look_name;
        $product->product_name = $request->product_name;
        $product->category_id = $request->product_category;
        $product->fabric_composition_id = $request->fabric_composition;
        $product->collection_id = $request->collection_name;
        $product->product_fabric_id = $request->product_fabric;
        $product->product_price = $request->product_price;
        $product->description = $request->description;
        $product->modified_at = Carbon::now();
        $product->modified_by = Auth::user()->id;
    
        // Handle existing thumbnail images
        $existingThumbnails = $request->input('existing_thumbnail_images', []);  // Retrieve the existing thumbnails from the request
        if ($request->hasFile('thumbnail_image')) {
            // Upload new thumbnails
            foreach ($request->file('thumbnail_image') as $image) {
                if ($image->isValid()) {
                    $extension = $image->getClientOriginalExtension();
                    $new_name = time() . rand(10, 999) . '.' . $extension;
                    $image->move(public_path('/murupp/product/thumbnails'), $new_name);
                    $existingThumbnails[] = $new_name;  // Append the new image to the existing ones
                }
            }
        }
    
        // Save updated thumbnail images
        $product->thumbnail_image = json_encode($existingThumbnails);
    
        // Handle existing gallery images
        $existingGalleryImages = $request->input('existing_gallery_images', []);  // Retrieve the existing gallery images from the request
        if ($request->hasFile('gallery_image')) {
            // Upload new gallery images
            foreach ($request->file('gallery_image') as $image) {
                if ($image->isValid()) {
                    $extension = $image->getClientOriginalExtension();
                    $new_name = time() . rand(10, 999) . '.' . $extension;
                    $image->move(public_path('/murupp/product/gallery'), $new_name);
                    $existingGalleryImages[] = $new_name;  // Append the new image to the existing ones
                }
            }
        }
    
        // Save updated gallery images
        $product->gallery_images = json_encode($existingGalleryImages);
    
        // Save the product details
        $product->save();
    
        // Redirect with success message
        return redirect()->route('product-details.index')->with('message', 'Product has been successfully updated!');
    }
    
    
    

}