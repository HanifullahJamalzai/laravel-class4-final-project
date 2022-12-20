<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $catFirst = Post::orderBy('created_at', 'desc')->where('category_id', 1)->limit(7)->get();
        // dd($catFirst);
        $catSecond = Post::orderBy('created_at', 'desc')->where('category_id', 2)->limit(7)->get();
        // n^2+1
        return view('landing.index', compact('sliders', 'catFirst'));
    }

    public function contact()
    {

        return view('landing.contact');
    }

    public function about()
    {   
 

        return view('landing.contact');
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
