<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Mail\UserVerifyEmail;
use App\Models\User;
use App\Models\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
            'role'     => 2,
        ]);

        $verify = VerifyEmail::create([
            'user_id' => $user->id,
            'token' => str()->random(20),
        ]);

        Mail::to($user->email)->send(new UserVerifyEmail($verify->token));


        // return 'User Registered';

        // dd($request->all());
        // dd(request()->all());

        return redirect('login');


    }
}
