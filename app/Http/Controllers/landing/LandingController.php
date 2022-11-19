<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }

    public function contact()
    {
        return view('landing.contact');
    }

    public function about()
    {
        return view('landing.about');
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
