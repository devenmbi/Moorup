<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Permission;
use App\Models\UsersPermission;
use App\Models\ShopCategory;


class ShopByCategoryController extends Controller
{

    public function index()
    {
        $category = ShopCategory::leftJoin('users', 'home_shop_category.created_by', '=', 'users.id')
                                        ->whereNull('home_shop_category.deleted_by')
                                        ->select('home_shop_category.*', 'users.name as creator_name')
                                        ->get();
        return view('backend.home-page.shop-category.index', compact('category'));
    }

    public function create(Request $request)
    { 
        return view('backend.home-page.shop-category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'nullable|string|max:255',
            'image_title' => 'required|string|max:255',
            'product_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:3072',
        ], [
            'image_title.required' => 'The image title is required.',
            'product_image.required' => 'The image is required.',
            'product_image.image' => 'The file must be a valid image.',
            'product_image.mimes' => 'Only .jpg, .jpeg, .png, .webp formats are allowed.',
            'product_image.max' => 'The image size must not exceed 3MB.',
        ]);

        $imageName = null;
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/murupp/home/shop_categories'), $imageName); 
        }

        $shopCategory = new ShopCategory();
        $shopCategory->heading = $request->input('heading');
        $shopCategory->image_title = $request->input('image_title');
        $shopCategory->product_image = $imageName;
        $shopCategory->created_at = Carbon::now();
        $shopCategory->created_by = Auth::user()->id; 
        $shopCategory->save();

        return redirect()->route('shop-category.index')->with('message', 'Shop category successfully added!');
    }

    public function edit($id)
    {
        $category = ShopCategory::findOrFail($id);
        return view('backend.home-page.shop-category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = ShopCategory::findOrFail($id);

        $request->validate([
            'heading' => 'nullable|string|max:255',
            'image_title' => 'required|string|max:255',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
        ], [
            'image_title.required' => 'The image title is required.',
            'product_image.required' => 'The image is required.',
            'product_image.image' => 'The file must be a valid image.',
            'product_image.mimes' => 'Only .jpg, .jpeg, .png, .webp formats are allowed.',
            'product_image.max' => 'The image size must not exceed 3MB.',
        ]); 

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/murupp/home/shop_categories'), $imageName);

            $category->product_image = $imageName;
        }
        $category->heading = $request->input('heading');
        $category->image_title = $request->input('image_title');
        $category->modified_at = Carbon::now();
        $category->modified_by = Auth::user()->id; 
        $category->save();

        return redirect()->route('shop-category.index')->with('message', 'Category successfully updated!');
    }


    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = ShopCategory::findOrFail($id);
            $industries->update($data);

            return redirect()->route('shop-category.index')->with('message', 'Category deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }


}