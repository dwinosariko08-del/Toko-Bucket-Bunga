<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Setting;

class ProductController extends Controller
{
   public function index()
{
    $products = Product::latest()->get();
    $setting  = Setting::first();

    return view('catalog', compact('products','setting'));
}

    public function show($id)
    {
        $product = Product::findOrFail($id);
          $setting = Setting::first();
        return view('detail', compact('product','setting'));
    }
}

