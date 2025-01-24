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


class ProductDetailsController extends Controller
{

    public function index()
    {
        return view('backend.products.product-details.index');
    }

    public function create(Request $request)
    { 
        return view('backend.products.product-details.create');
    }
}