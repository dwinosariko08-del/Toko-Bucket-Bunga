<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\Setting;
use App\Models\About;

class HomeController extends Controller
{
    public function index()
    {
        $products     = Product::latest()->get();
        $galleries    = Gallery::latest()->get();
        $testimonials = Testimonial::latest()->take(6)->get();
        $setting      = Setting::first();
          $about        = About::first();

        return view('home', compact(
            'products',
            'galleries',
            'testimonials',
             'setting',
               'about'
        ));
    }
}
