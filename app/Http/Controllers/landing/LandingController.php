<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $sliders = Slider::all();
        $categories = Category::all();

        return view('landing.index', compact('setting', 'sliders', 'categories'));
    }

    public function contact()
    {
        $categories = Category::all();
        $setting = Setting::first();

        return view('landing.contact', compact('categories', 'setting'));
    }

    public function about()
    {   
        $categories = Category::all();
        $setting = Setting::first();

        return view('landing.contact', compact('categories', 'setting'));
    }

    public function post()
    {
        return view('landing.post');
    }

    public function posts()
    {
        return view('landing.posts');
    }

}
