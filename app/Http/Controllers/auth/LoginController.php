<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

      
        if(!auth()->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            session()->flash('error', 'Credentials do not match!');
            return back();
        }
        else{
            auth()->attempt(['email' => $request->email, 'password' => $request->password], $request->remember);
            return redirect('admin');
        }

    }
}
