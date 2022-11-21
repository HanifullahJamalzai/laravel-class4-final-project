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
            return 'Credentials are not Correct';
        }
        else{
            auth()->attempt(['email' => $request->email, 'password' => $request->password], $request->remember);
            return redirect('admin');
        }


        dd($request->all());
    }
}
