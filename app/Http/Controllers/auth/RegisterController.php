<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:255',
            'email' => 'required|email|min:4|max:255',
            'password' => 'required|min:4|max:255|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => bcrypt($request->password),
            'password' => Hash::make($request->password),
            'role'     => 3,
        ]);

        // return 'User Registered';

        // dd($request->all());
        // dd(request()->all());

        return redirect('login');


    }
}
