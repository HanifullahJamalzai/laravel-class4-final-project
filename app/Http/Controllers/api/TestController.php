<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $sliders = Slider::all();
        $catFirst = Post::orderBy('created_at', 'desc')->where('category_id', 1)->with('category')->limit(7)->get();
        // dd($catFirst);
        $catSecond = Post::orderBy('created_at', 'desc')->where('category_id', 2)->with('category')->limit(7)->get();
        // n^2+1
        return response()->json(
            [
                'sliders' => $sliders,
                'catFirst' => $catFirst,
                'catSecond' => $catSecond
            ]
        );
        
    }
}
